<?php

// app/Helpers/info_helper.php
use CodeIgniter\CodeIgniter;

/**
 * Returns CodeIgniter's version.
 */
function dd1($arr): string
{
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
    return '';
}

function remove_extension_file ($filename) {
	// $var = "testfile.php"; 
	$var = $filename; 
  $explode = explode( '.', $var ); 
  array_pop( $explode); 
  $var = implode( '.', $explode ); 
  // var_dump( $var );
  	return $var;
}

function get_filename_similar ($destination) {
  // if ($delimiter === '') {
            $delimiter = '_';
        // }

        // while (is_file($destination)) {
            $info      = pathinfo($destination);
            $extension = isset($info['extension']) ? '.' . $info['extension'] : '';

            if (strpos($info['filename'], $delimiter) !== false) {
                $parts = explode($delimiter, $info['filename']);

                if (is_numeric(end($parts))) {
                    $i = end($parts);
                    array_pop($parts);
                    $parts[]     = $i;
                    $destination = $info['dirname'] . DIRECTORY_SEPARATOR . implode($delimiter, $parts) . $extension;
                } else {
                    $destination = $info['dirname'] . DIRECTORY_SEPARATOR . $info['filename'] . $extension;
                }
            } else {
                $destination = $info['dirname'] . DIRECTORY_SEPARATOR . $info['filename'] . $extension;
            }
        // }

        // $info      = pathinfo($destination);
        return  $destination;
        // return $info['dirname'];
}

function getInfoUser ($user_id) {
    $users = auth()->getProvider();
    $user = $users->findById($user_id)->toArray();
    return $user;
}

function getState ($state) {
    if ($state == 0) {
        return 'Ẩn';
    }
    if ($state == 1) {
        return 'Hiển thị';
    }
}

function check_variable ($var) {
    if (is_array($var)) {
        return 'là mảng';
    }

    if (is_numeric($var)) {
        return 'là số';
    }

    if (is_string($var)) {
        return 'là chuỗi';
    }

    if (is_bool($var)) {
        return 'là boolean';
    }

    if (is_object($var)) {
        return 'là đối tượng';
    }

    return 'không xác định';
}

function date_1 ($date) {
    return date('Y-m-d', strtotime($date));
}

function date_2 ($date_in) {
    $date = new DateTime($date_in);
    $date->modify('+10 day');
    return $date->format('Y-m-d');
    // echo "Ngày sau khi thay đổi: " . $date->format('Y-m-d'); // 2023-06-28

    // $interval = new DateInterval('P2D'); // Cộng thêm 2 ngày
    // date_add($date, $interval);
    // echo "Ngày sau khi cộng thêm 2 ngày: " . date_format($date, 'Y-m-d'); // 2023-06-30

    // $interval = new DateInterval('P2D'); // Trừ đi 2 ngày
    // date_sub($date, $interval);
    // echo "Ngày sau khi trừ đi 2 ngày: " . date_format($date, 'Y-m-d'); // 2023-06-28
}

function vi_to_en ($str){
 
    $unicode = array(
     
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
     
    'd'=>'đ',
     
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
     
    'i'=>'í|ì|ỉ|ĩ|ị',
     
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
     
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
     
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     
    'D'=>'Đ',
     
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
     
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
     
    );
     
    foreach($unicode as $nonUnicode=>$uni){
     
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
    }
    $str = str_replace(' ','-',$str);

    $str = strtolower($str);

    $str = preg_replace("/[^A-Za-z0-9\-]/", "",$str);
 
    return $str;

}