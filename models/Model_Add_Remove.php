<?php
class Model_Add_Remove extends Model{

  public function add_film(){
    $title = htmlspecialchars($_REQUEST['title']);
    $year = htmlspecialchars($_REQUEST['year']);
    $format = htmlspecialchars($_REQUEST['format']);
    $stars = htmlspecialchars($_REQUEST['stars']);
    $add = $this->repository->add_film($title, $year, $format, $stars);
    return $add;
  }

  public function remove_film(){
    $title = htmlspecialchars($_REQUEST['title']);
    $remove = $this->repository->remove_film($title);
    return $remove;
  }
}
?>
