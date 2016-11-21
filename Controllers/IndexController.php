<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/21/16
 * Time: 12:13 AM
 */
namespace Controllers;

use Models\File;

class IndexController
{

    public function index()
    {
        $files = File::all();
        return \Views\View::view('show', ['files' => $files]);
    }
}