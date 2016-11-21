<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/20/16
 * Time: 12:49 PM
 */

ini_set('display_errors', 1);

error_reporting(E_ALL&~E_NOTICE);

define('DIR',dirname(__DIR__));
define('PUBLIC_DIR',__DIR__);
define('CONTROLLER_DIR',DIR.'/Controller');
define('MODEL_DIR',DIR.'/Models');
define('VIEW_DIR',DIR.'/Views');

require DIR."/autoload.php";

spl_autoload_register("Loader::autoload");


if(strpos($_SERVER['REQUEST_URI'],'download') !== false){
    return (new \Controllers\DownloadController())->index();
}

if(strpos($_SERVER['REQUEST_URI'],'read') !== false){
    return (new \Controllers\ReadController())->index();
}

if(strpos($_SERVER['REQUEST_URI'],'video') !== false){
    return (new \Controllers\VideoController())->index();
}

return (new \Controllers\IndexController())->index();
