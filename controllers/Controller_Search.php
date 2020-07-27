<?php
class Controller_Search extends Controller{

  function __construct(){
    parent::__construct();
    $this->model = new Model_Search();
  }

  function action_index(){
    $this->view->generate('search_view.php', 'template_view.php');
  }

  function action_details(){
    $title = htmlspecialchars($_REQUEST['title']);
    $this->view->printData($this->model->get_details($title));
  }

  function action_search(){
    $option = htmlspecialchars($_REQUEST['option']);
    $str = htmlspecialchars($_REQUEST['str']);
    if($option == "stars"){
      $this->view->printData($this->model->get_data_star($str));
    } elseif($option == "title"){
      $this->view->printData($this->model->get_data_title($str));
    }
  }
}

 ?>
