<?php
class Model_Show_Films extends Model{
  public function get_data(){
    $res = $this->repository->get_all();
    $str = "";
    while($row = mysqli_fetch_assoc($res)){
      //print_r($row);
      $str .= "Title : ".$row['title']."
      </br> Year : ".$row['year']."
      </br> Format : ".$row['format']."
      </br> Stars : ".$row['stars']."</br> </br>";
    }
    return $str;
  }
}

 ?>
