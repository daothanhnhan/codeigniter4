<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class CategoryForProductCell extends Cell
{
    public $checkbox = '';
	public $productcat_id;

    public function getListCategory ($productcat_id) {
    	$productcat_id_arr = json_decode($productcat_id);
        if (empty($productcat_id)) {
            $productcat_id_arr = [];
        }

    	$level_1 = model('ProductCatModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();
    	$this->checkbox = '<div class="form-control" style="height: auto;">';

    	foreach ($level_1 as $item) {
    		$checked = '';
    		if (in_array($item['id'], $productcat_id_arr)) {
    			$checked = 'checked';
    		}
    		$this->checkbox .= '<div class="form-check">
	    		<input type="checkbox" name="productcat_id[]" value="'.$item['id'].'" '.$checked.'>
	    		<label class="form-check-label"> '.$item['title'].'</label>
            </div>
    		';
    		$this->level_child($item['id'], 0, $productcat_id_arr);
    	}

    	$this->checkbox .= '</div>';

    	return $this->checkbox;
    }

    public function level_child ($id, $level, $id_arr) {
    	$level++;
    	$tab = '';
    	for ($i=0; $i<$level; $i++) {
    		$tab .= '|--';
    	}
    	$level_next = model('ProductCatModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();

    	foreach ($level_next as $item) {
    		$checked = '';
    		if (in_array($item['id'], $id_arr)) {
    			$checked = 'checked';
    		}
    		$this->checkbox .= '<div class="form-check">'.$tab.'
    			<input type="checkbox" name="productcat_id[]" value="'.$item['id'].'" '.$checked.'>
    			<label class="form-check-label"> '.$item['title'].'</label>
            </div>
    		';
    		$this->level_child($item['id'], $level, $id_arr);
    	}
    }
}
