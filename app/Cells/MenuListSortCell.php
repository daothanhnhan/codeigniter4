<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class MenuListSortCell extends Cell
{
    public $stt = 0;
	public $tr = '';

    public function getOlList () {
    	// biến được chuyền vào file view trước , và được khái bảo trong controller 
        $level_1 = model('MenuModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();

        $this->ol = '<ol class="dd-list">';
        $this->stt = 0;
        foreach ($level_1 as $item) {
        	$this->stt++;

        	$this->ol .= '<li class="dd-item dd3-item" data-id="'.$item['id'].'">';
        	$this->ol .= '<div class="dd-handle dd3-handle"></div>';
        	$this->ol .= '<div class="dd3-content">';
        	$this->ol .= '<a href="/admin/menu/edit/'.$item['id'].'">'.$item['name'].'</a>';
        	$this->ol .= '</div>';
        	$this->level_child($item['id']);
        	$this->ol .= '</li>';
        	
        }
        $this->ol .= '</ol>';

        return $this->ol;
    }

    public function level_child ($id) {

    	$level_next = model('MenuModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();
    	if (!empty($level_next)) {
    		$this->ol .= '<ol class="dd-list">';
	    	foreach ($level_next as $item) {
	    		$this->stt++;
	        	
	        	$this->ol .= '<li class="dd-item dd3-item" data-id="'.$item['id'].'">';
	        	$this->ol .= '<div class="dd-handle dd3-handle"></div>';
	        	$this->ol .= '<div class="dd3-content">';
	        	$this->ol .= '<a href="/admin/menu/edit/'.$item['id'].'">'.$item['name'].'</a>';
	        	$this->ol .= '</div>';
	        	$this->level_child($item['id']);
	        	$this->ol .= '</li>';
	        	
			}
			$this->ol .= '</ol>';
    	}
    	
    }
}
