<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class MenuListCell extends Cell
{
    public $stt = 0;
	public $tr = '';

    public function getTrTable () {
    	// biến được chuyền vào file view trước , và được khái bảo trong controller 
        $level_1 = model('MenuModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();

        $this->tr = '';
        $this->stt = 0;
        foreach ($level_1 as $item) {

        	$this->stt++;
        	$this->tr .= '<tr>';
        	$this->tr .= '<td>'.$this->stt.'</td>';
        	$this->tr .= '<td><a href="/admin/menu/edit/'. $item['id'] .'">'.esc($item['name']).'</a></td>';
        	$this->tr .= '<td>'.getState($item['state']).'</td>';
        	$this->tr .= '<td>
	                        <a href="/admin/menu/edit/'. $item['id'] .'">Edit</a> |
	                        <form action="/admin/menu/delete/'. $item['id'] .'" method="post" style="display: inline;">
	                          '. csrf_field() .'
	                          <input type="hidden" name="_method" value="DELETE">
	                          <button type="submit">Delete</button>
	                        </form>
	                      </td>';
        	$this->tr .= '</tr>';
        	
        	$this->level_child($item['id'], 0);
        }
        return $this->tr;
    }

    public function level_child ($id, $level) {
    	$level++;
    	$tab = '';
    	for ($i=0;$i<$level;$i++) {
    		$tab .= '|--';
    	}

    	$level_next = model('MenuModel')->where('parent_id', $id)->orderBy('sort', 'ASC')->findAll();

    	foreach ($level_next as $item) {
    		$this->stt++;
        	$this->tr .= '<tr>';
        	$this->tr .= '<td>'.$this->stt.'</td>';
        	$this->tr .= '<td><a href="/admin/menu/edit/'. $item['id'] .'">'.$tab.' '.esc($item['name']).'</a></td>';
        	$this->tr .= '<td>'.getState($item['state']).'</td>';
        	$this->tr .= '<td>
	                        <a href="/admin/menu/edit/'. $item['id'] .'">Edit</a> |
	                        <form action="/admin/menu/delete/'. $item['id'] .'" method="post" style="display: inline;">
	                          '. csrf_field() .'
	                          <input type="hidden" name="_method" value="DELETE">
	                          <button type="submit">Delete</button>
	                        </form>
	                      </td>';
        	$this->tr .= '</tr>';
        	
        	$this->level_child($item['id'], $level);
		}
    }
}
