<?php
class Model{

  public $repository;

  function __construct(){
    $this->repository = new SQLRepository();
  }

  protected function data_to_json($data){
    $arr = array();
    while($row = mysqli_fetch_assoc($data)){
      $arr[] = $row;
    }
    return json_encode($arr);
  }

}
 ?>
