<?php

class SQLRepository implements Film_Repository{

  public $link;

  function __construct(){
    $this->link = new mysqli('localhost', 'root', '1', 'films');
  }

  public function get_all(){
    $sql = "SELECT * FROM films";
    return $this->link->query($sql);
  }

  public function get_film_details($title){
    $sql = "SELECT * FROM films WHERE title='".$title."'";
    return $this->link->query($sql);
  }

  public function search_film_stars($star){
    $sql = "SELECT title FROM films WHERE stars LIKE '%".$star."%'";
    return $this->link->query($sql);
  }

  public function search_film_title($title){
    $sql = "SELECT title FROM films WHERE title LIKE '%".$title."%'";
    return $this->link->query($sql);
  }

  public function add_film($title, $year, $format, $stars){
    //$sql = 'INSERT INTO films SET title = '.$title.', year = '.$year.', format = '.$format.', stars = '.$stars.' ';
    $sql = "INSERT INTO films (title, year, format, stars)
        VALUES ('".$title."', '".$year."', '".$format."', '".$stars."')";
    return $this->query($sql);
  }

  public function remove_film($title){
    $sql = "DELETE FROM films WHERE title='".$title."'";
    return $this->query($sql);
  }

  private function query($sql){
    $result = $this->link->query($sql);
    if($result == false){
      echo "EROR".$this->link->error;
    } else return $result;
  }



}

 ?>
