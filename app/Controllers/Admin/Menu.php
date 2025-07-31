<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Admin\Together;

class Menu extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];
    public $output_edit;

    public function index()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/menu/list', $data);
    }

    public function sort()
    {
        // $menus = model('MenuModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();
        // $data = [
        //     'menus' => $menus,
        // ];
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/menu/list_sort', $data);
    }

    public function sortAjax () {
        $menuModel = model('MenuModel');
        $request = \Config\Services::Request();
        // return 'tuan';
        if ($request->isAjax()) {
            $result = $request->getvar('name');
            // return json_encode($result);
            // return $result;

            $arr_1 = json_decode($result, true);//return $arr_1;
            // var_dump($arr);
            $count = count($arr_1);
            // var_dump($arr[0]);
            $d = 0;
            foreach ($arr_1 as $item) {
                $d++;
                $update = [
                    'sort' => $d,
                    'parent_id' => 0,
                ];
                $menuModel->update($item['id'], $update);

                if (array_key_exists('children', $item)) {
                    if (!empty($item['children'])) {
                        $this->sortAjax_child($item['children'], $item['id']);
                    }
                }
   
            }
            // return $result;
            return false;
        }
    }

    public function sortAjax_child ($arr, $parent_id) {
        $menuModel = model('MenuModel');
        $k = 0;
        foreach ($arr as $child) {
            $k++;
            $update = [
                'sort' => $k,
                'parent_id' => $parent_id,
            ];
            $menuModel->update($child['id'], $update);

            if (array_key_exists('children', $child)) {
                if (!empty($child['children'])) {
                    $this->sortAjax_child($child['children'], $child['id']);
                }
            }
        }
    }

    public function new () {
    	$menu_types = model('MenuTypeModel')->findAll();
    	// dd($menu_types);
    	$data = [
    		'menu_types' => $menu_types,
    	];
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/menu/new', $data);
    }

    public function create () {
    	if (isset($this->request->getPost()['state'])) {
            $state = 1;
        } else {
            $state = 0;
        }

        if (isset($this->request->getPost()['link'])) {
            $link = $this->request->getPost()['link'];
            $type_id = 0;
        } else {
            $link = '';
            $type_id = $this->request->getPost()['type_id'];
        }

        $data_insert = [
            'name' => $this->request->getPost()['name'],
            'type' => $this->request->getPost()['type'],
            'type_id' => $type_id,
            'link' => $link,
            'state' => $state,
            'parent_id' => $this->request->getPost()['parent_id'],
            'sort' => $this->request->getPost()['sort'],
        ];
        $menuModel = model('MenuModel');
        $menuModel->insert($data_insert);

        //------
        $menu_id = $menuModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/menu/edit/'.$menu_id);
    }

    public function edit ($id) {
    	$data = $this->get_menu_id($id);
        $data['menu_active'] = Together::check_url_menu();

    	return view('admin/menu/edit', $data);
    }

    public function update ($id) {
    	if (isset($this->request->getPost()['state'])) {
            $state = 1;
        } else {
            $state = 0;
        }

        if (isset($this->request->getPost()['link'])) {
            $link = $this->request->getPost()['link'];
            $type_id = 0;
        } else {
            $link = '';
            $type_id = $this->request->getPost()['type_id'];
        }

        $data_update = [
            'name' => $this->request->getPost()['name'],
            'type' => $this->request->getPost()['type'],
            'type_id' => $type_id,
            'link' => $link,
            'state' => $state,
            'parent_id' => $this->request->getPost()['parent_id'],
            'sort' => $this->request->getPost()['sort'],
        ];//dd($data_update);
        $menuModel = model('MenuModel');
        $menuModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);

        $data = $this->get_menu_id($id);
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/menu/edit', $data);
    }

    public function delete ($id) {
        $menuModel = model('MenuModel');

        $child = $menuModel->where('parent_id', $id)->findAll();
        if (empty($child)) {
        	$menuModel->delete($id);
        	return redirect()->to('admin/menus');
        } else {
        	$errors = ['Bạn phải xóa menu con trước'];
        	session()->setFlashdata('errors', $errors);
        	return redirect()->to('admin/menus');
        }
        
    }

    public function get_menu_id ($id) {
        $menuModel = model('MenuModel');
        $menu = $menuModel->find($id);

        $menuTypeModel = model('MenuTypeModel');
        $menu_types = $menuTypeModel->findAll();

        if ($menu['state'] == 0) {
            $state = false;
        } else {
            $state = true;
        }

        // $output_select = $this->getSelectType($menu['type']);
        $output_select = $this->getSelectType_edit($menu['type'], $menu['type_id'], $menu['link']);

        $checkbox = [
            'name'    => 'state',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $state,
            // 'style'   => 'margin:10px',
        ];

        $data = [
            'menu' => $menu,
            'menu_types' => $menu_types,
            'checkbox' => $checkbox,
            'output_select' => $output_select,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function getSelectType ($type) {
    	if ($type == 0) {
    		$output = '<label for="">Link</label>
                    <input type="text" name="link" value="" class="form-control">';
    	} else {
    		$menu_type = model('MenuTypeModel')->where('model', $type)->first();

    		// $type = ucfirst($type);
    		// $type = substr($type, 0, -1);
    		// $type = str_replace("_", "", $type);
    		// $model = $type.'Model';
    		// dd($model);
    		$types = model($type)->findAll();
            $parent_id_is = 0;
            if (!empty($types)) {
                if (array_key_exists('parent_id', $types[0])) {
                    $types = model($type)->where('parent_id', 0)->findAll();
                    $parent_id_is = 1;
                }
            }
    		// dd($types);

    		$output = '<label for="">'.$menu_type['name'].'</label>';
    		$output .= '<select name="type_id" class="form-control">';
    		foreach ($types as $item) {
    			if ($item['state'] == 0) {
    				continue;
    			}
    			
    			if (array_key_exists('title', $item)) {
    				$title = $item['title'];
    			} else {
    				$title = $item['name'];
    			}

    			$output .= '<option value="'.$item['id'].'">'.$title.'</option>';
                if ($parent_id_is == 1) {
                    $this->output_edit = '';
                    $output .= $this->model_has_parent($type, $item['id'], 0, 0);
                }
                
    		}
    		$output .= '</select>';
    	}

    	// $output = '<p>tuan</p>';

    	return $output;
    }

    public function getSelectType_edit ($type, $id, $link) {
        if ($type == 0) {
            $output = '<label for="">Link</label>
                    <input type="text" name="link" value="'.$link.'" class="form-control">';
        } else {
            $menu_type = model('MenuTypeModel')->where('model', $type)->first();

            $types = model($type)->findAll();
            $parent_id_is = 0;
            if (!empty($types)) {
                if (array_key_exists('parent_id', $types[0])) {
                    $types = model($type)->where('parent_id', 0)->findAll();
                    $parent_id_is = 1;
                }
            }
            // dd($types);

            $output = '<label for="">'.$menu_type['name'].'</label>';
            $output .= '<select name="type_id" class="form-control">';
            foreach ($types as $item) {
                if ($item['state'] == 0 && $type == 'MenuSpecialModel') {
                    continue;
                }
                
                if (array_key_exists('title', $item)) {
                    $title = $item['title'];
                } else {
                    $title = $item['name'];
                }

                $selected = '';
                if ($item['id'] == $id) {
                    $selected = 'selected';
                }

                $output .= '<option value="'.$item['id'].'" '.$selected.' >'.$title.'</option>';
                if ($parent_id_is == 1) {
                    $this->output_edit = '';
                    $output .= $this->model_has_parent($type, $item['id'], 0, $id);
                }
                
            }
            $output .= '</select>';
        }

        // $output = '<p>tuan</p>';

        return $output;
    }

    public function model_has_parent ($model, $parent_id, $level, $id) {
        $level++;
        $tab = '';
        for ($i=0; $i<$level; $i++) {
            $tab .= '|--';
        }
        // $row = [];
        $models = model($model)->where('parent_id', $parent_id)->findAll();
        foreach ($models as $item) {
            if ($item['state'] == 0 && $model == 'MenuSpecialModel') {
                    continue;
            }
            
            if (array_key_exists('title', $item)) {
                $title = $item['title'];
            } else {
                $title = $item['name'];
            }

            $selected = '';
            if ($item['id'] == $id) {
                $selected = 'selected';
            }
            $this->output_edit .= '<option value="'.$item['id'].'" '.$selected.' >'.$tab.$title.'</option>';
            $this->model_has_parent_child($model, $item['id'], $level, $id);
        }

        return $this->output_edit;
    }

    public function model_has_parent_child ($model, $parent_id, $level, $id) {
        $level++;
        $tab = '';
        for ($i=0; $i<$level; $i++) {
            $tab .= '|--';
        }
        // $row = [];
        $models = model($model)->where('parent_id', $parent_id)->findAll();
        foreach ($models as $item) {
            if ($item['state'] == 0 && $model == 'MenuSpecialModel') {
                    continue;
            }
            
            if (array_key_exists('title', $item)) {
                $title = $item['title'];
            } else {
                $title = $item['name'];
            }

            $selected = '';
            if ($item['id'] == $id) {
                $selected = 'selected';
            }
            $this->output_edit .= '<option value="'.$item['id'].'" '.$selected.' >'.$tab.$title.'</option>';
            $this->model_has_parent_child($model, $item['id'], $level, $id);
        }

    }
}
