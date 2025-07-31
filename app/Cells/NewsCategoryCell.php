<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class NewsCategoryCell extends Cell
{
    public $newscat_id;
    // public $select = '';

    public function getSelect($newscat_id): string
    {
        // biến được chuyền vào file view trước , và được khái bảo trong controller
        $level_1 = model('NewsCatModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();
        
        if ($newscat_id == 0) {
            $newscat['parent_id'] = 0;
        } else {
            $newscat = model('NewsCatModel')->where('id', $newscat_id)->first();
        }
        

        $this->select = '<option value="0">Cấp cha</option>';
        foreach ($level_1 as $option) {
            if ($option['id'] == $newscat_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$option['title'].'</option>';
                continue;
            }

            $selected = '';
            if ($option['id'] == $newscat['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$option['title'].'</option>';
        	$this->level_child($option['id'], 0, $newscat_id);
        }
        return $this->select;
    }

    public function level_child ($id, $level, $newscat_id) {
    	$level++;
    	$tab = '';
    	for ($i=0;$i<$level;$i++) {
    		$tab .= '|--';
    	}

        if ($newscat_id == 0) {
            $newscat['parent_id'] = 0;
        } else {
            $newscat = model('NewsCatModel')->where('id', $newscat_id)->first();
        }

    	$level_next = model('NewsCatModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();

    	foreach ($level_next as $option) {
            if ($option['id'] == $newscat_id) {
                $this->select .= '<option value="'.$option['id'].'" disabled >'.$tab.' '.$option['title'].'</option>';
                continue;
            }
            
            $selected = '';
            if ($option['id'] == $newscat['parent_id']) {
                $selected = 'selected';
            }

        	$this->select .= '<option value="'.$option['id'].'" '.$selected.' >'.$tab.' '.$option['title'].'</option>';
        	$this->level_child($option['id'], $level, $newscat_id);
        }
    }
}
