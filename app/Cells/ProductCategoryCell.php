<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class ProductCategoryCell extends Cell
{
    public $productcat_id;
    // public $select = '';

    public function getSelect($productcat_id): string
    {
        // biến được chuyền vào file view trước , và được khái bảo trong controller
        $level_1 = model('ProductCatModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();
        
        if ($productcat_id == 0) {
            $productcat['parent_id'] = 0;
        } else {
            $productcat = model('ProductCatModel')->where('id', $productcat_id)->first();
        }
        

        $this->select = '<option value="0">Cấp cha</option>';
        foreach ($level_1 as $option) {
            if ($option['id'] == $productcat_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$option['title'].'</option>';
                continue;
            }

            $selected = '';
            if ($option['id'] == $productcat['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$option['title'].'</option>';
        	$this->level_child($option['id'], 0, $productcat_id);
        }
        return $this->select;
    }

    public function level_child ($id, $level, $productcat_id) {
    	$level++;
    	$tab = '';
    	for ($i=0;$i<$level;$i++) {
    		$tab .= '|--';
    	}

        if ($productcat_id == 0) {
            $productcat['parent_id'] = 0;
        } else {
            $productcat = model('ProductCatModel')->where('id', $productcat_id)->first();
        }

    	$level_next = model('ProductCatModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();

    	foreach ($level_next as $option) {
            if ($option['id'] == $productcat_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$tab.' '.$option['title'].'</option>';
                continue;
            }
            
            $selected = '';
            if ($option['id'] == $productcat['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$tab.' '.$option['title'].'</option>';
        	$this->level_child($option['id'], $level, $productcat_id);
        }
    }
}
