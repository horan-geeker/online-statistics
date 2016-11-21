<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/20/16
 * Time: 10:15 PM
 */
namespace Controllers;

use Models\File;

class ReadController extends Controller
{

    public function __construct()
    {
        if(isset($_GET['time'])){
            $this->inc();
        }
    }

    public function index()
    {

    }

    public function inc()
    {
        if (isset($_GET['time'], $_GET['id'])) {
            $file = File::find($_GET['id']);
            $file->inc('read_time', $_GET['time']);
            return true;
        }
        return false;
    }
}