<?php
class Controller_Add_Remove extends Controller{

  function __construct(){
    parent::__construct();
    $this->model = new Model_Add_Remove();
  }

  function action_index(){
    //echo "ADD or REMOVE";
    $this->view->generate('add_remove_view.php', 'template_view.php');
  }

  function action_add(){
    $this->view->printData($this->model->add_film());
  }

  function action_remove(){
    $this->view->printData($this->model->remove_film());
  }
}

 ?>
