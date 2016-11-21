<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/20/16
 * Time: 10:15 PM
 */
namespace Controllers;

use Models\File;
use Views\View;

class VideoController{

    public function __construct()
    {
        $video = File::find($_GET['id']);
        View::view('video',['video'=>$video]);
    }
}