<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/21/16
 * Time: 12:13 AM
 */
namespace Controllers;

class IndexController{

    public function __construct()
    {
        $files = \Models\File::all();
        return \Views\View::view('show',$files);
    }
}