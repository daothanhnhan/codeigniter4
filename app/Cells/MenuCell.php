<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class MenuCell extends Cell
{
    public $menu_id;
    // public $select = '';

    public function getSelect($menu_id): string
    {
        // biến được chuyền vào file view trước , và được khái bảo trong controller
        $level_1 = model('MenuModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();
        
        if ($menu_id == 0) {
            $menu['parent_id'] = 0;
        } else {
            $menu = model('MenuModel')->where('id', $menu_id)->first();
        }
        

        $this->select = '<option value="0">Cấp cha</option>';
        foreach ($level_1 as $option) {
            if (array_key_exists('title', $option)) {
                $title = $option['title'];
            } else {
                $title = $option['name'];
            }

            if ($option['id'] == $menu_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$title.'</option>';
                continue;
            }

            $selected = '';
            if ($option['id'] == $menu['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$title.'</option>';
        	$this->level_child($option['id'], 0, $menu_id);
        }
        return $this->select;
    }

    public function level_child ($id, $level, $menu_id) {
    	$level++;
    	$tab = '';
    	for ($i=0;$i<$level;$i++) {
    		$tab .= '|--';
    	}

        if ($menu_id == 0) {
            $menu['parent_id'] = 0;
        } else {
            $menu = model('MenuModel')->where('id', $menu_id)->first();
        }

    	$level_next = model('MenuModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();

    	foreach ($level_next as $option) {
            if (array_key_exists('title', $option)) {
                $title = $option['title'];
            } else {
                $title = $option['name'];
            }
            
            if ($option['id'] == $menu_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$tab.' '.$title.'</option>';
                continue;
            }
            
            $selected = '';
            if ($option['id'] == $menu['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$tab.' '.$title.'</option>';
        	$this->level_child($option['id'], $level, $menu_id);
        }
    }
}
