<?php
class Controller_Show_Films extends Controller{
  function __construct(){
    parent::__construct();
    $this->model = new Model_Show_Films();
  }

  function action_index(){
    $data = $this->model->get_data();
    $this->view->printData($data);
  }

}

 ?>
