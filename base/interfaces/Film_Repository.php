<?php
interface Film_Repository{
  public function add_film($title, $year, $format, $stars);
  public function get_all();
  public function get_film_details($title);
  public function search_film_stars($star);
  public function search_film_title($title);
  public function remove_film($title);

}

 ?>
