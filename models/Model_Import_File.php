<?php
class Model_Import_File extends Model{
  //Подготовка данных к записи в бд, т.к в бд и файле разные названия
  function add_films($films){
    $temp = 0;
    foreach ($films as $film){
      $title = trim(str_replace("\n", "", $film["Title"]));
      $year = str_replace("\n", "", $film["Release Year"]);
      $format = str_replace("\n", "", $film["Format"]);
      $stars = str_replace("\n", "", $film["Stars"]);
      $temp += $this->repository->add_film($title, $year, $format, $stars);
    }
    return $temp;
  }

}


 ?>
