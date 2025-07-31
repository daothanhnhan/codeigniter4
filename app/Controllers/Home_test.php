<?php

namespace App\Controllers;

class Home_test extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index(): string
    {
        return view('welcome_message');
    }

    public function ajax() {
    	$request = \Config\Services::Request();
    	if ($request->isAjax()) {
    		$result = $request->getvar('name');
    		return json_encode($result);
    	} else {
    		return view('ajax');
    	}
    	
    }

    public function img() {
        return view('img');
    }

    public function imgMulti() {

        if (isset($this->request->getPost()['title'])) {
            $photos = $this->request->getFiles();
            // dd($_FILES['photos']);
            dd($photos);
        }
        return view('img_multi');
    }

    public function ckeditor() {
        return view('ckeditor');
    }

    public function array () {
        $arr = ['truong', 'quang', 'tuan'];
        var_dump(json_encode($arr));

        // remove array "quang"
        foreach ($arr as $k => $item) {
            if ($item == 'quang') {
                unset($arr[$k]);
            } 
        }

        echo '<br>';

        var_dump(json_encode($arr));

        $arr = array_values($arr);

        echo '<br>';

        var_dump(json_encode($arr));

        //   ["1","10","11","111"]
        //   -"1"----------------
        //   -----"10"-----------
        //   ----------"11"------
        //   ---------------"111"
    }

    public function nestable () {
        return view('nestable');
    }

    public function captcha () {
        return view('test/captcha');
    }

    public function captcha_input () {
        // dd($this->request->getPost());
        if(isset($_POST['submit'])){
             $name;
             $captcha;
             if(isset($_POST['name'])){
                $name = $_POST['name'];
             }
             if(isset($_POST['g-recaptcha-response'])){
                $captcha = $_POST['g-recaptcha-response'];
             }
             if(!$captcha){
                echo '<h2>Hay xac nhan CAPTCHA</h2>';
             }else{
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIzXYUAAAAAIxQZLJt7hsOmfWQZrTGWCpWwTaQ&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                // dd(json_decode($response));
                $response_2 = json_decode($response);

                if($response_2->success == false){
                   echo '<h2>SPAM!</h2>';
                }else{
                   echo '<h2>'.$name.' Khong phai robot :)</h2>';
                }
             }
          }
        return view('test/captcha');
    }
}
