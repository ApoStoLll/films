<?php
class Controller_Import_File extends Controller{
  function __construct(){
    parent::__construct();
    $this->model = new Model_Import_File();
  }

  function action_index(){
    $this->view->generate('import_file_view.php', 'template_view.php');
  }

  /* Страшная функция которая по сути формирует двумерный массив вида
  array (
    [0] => Array( [Title] = title [Year] = year) и т.д
  ) а потом отправляет его в бд через модель
  */
  function action_import(){
    $fileTmpPath = $_FILES['upload_file']['tmp_name'];
    $fp = fopen($fileTmpPath, 'r');
    $films = [];
    $i = 0;
    $j = 0;
    while(!feof($fp)){
      $str = htmlentities(fgets($fp));
      if(ctype_space($str)){
        continue;
      }
      if($j == 4){
        $j = 0;
        $i++;
      }
      $substr = explode(":", $str);
      if($substr[0] != ""){
        //var_dump($substr[0]);
        $films[$i][$substr[0]] = $substr[1];
      }
      $j++;
    }
     if($this->model->add_films($films) == 0){
      $this->view->printData("Failed");
    } else {
      $this->view->printData("Success");
    }
  }


}

 ?>
