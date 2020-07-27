<?php

class Route{
  static function start(){
    $controller_name = 'Main';
    $action_name = 'index';
    $routes = explode('/', $_SERVER['REQUEST_URI']);
    if(!empty($routes[3])){
      $controller_name = $routes[3];
    }
    if(!empty($routes[4])){
      $action_name = $routes[4];
    }
    $model_name = 'Model_'.$controller_name;
    $controller_name = 'Controller_'.$controller_name;
    $action_name = 'action_'.$action_name;

    Route::includeFile($model_name, '/models');
    if(!Route::includeFile($controller_name, '/controllers')){
      #Route::ErrorPage404();
    }
    $controller = new $controller_name;
    $action = $action_name;
    if(method_exists($controller, $action)){
      $controller->$action();
    } else {
      #Route::ErrorPage404();
    }


  }

  private function includeFile($file_name, $path){
    $file_name = $file_name.'.php';
    $file_path = ROOT.$path."/".$file_name;
    #echo "FILE_PATH".$file_path;
    if(file_exists($file_path)){
      include $file_path;
      return true;
    }
  }

  // function ErrorPage404(){
  //       $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
  //       header('HTTP/1.1 404 Not Found');
	// 	header("Status: 404 Not Found");
	// 	header('Location:'.$host.'404');
  // }
}
?>
