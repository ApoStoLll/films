<?php
class Model_Search extends Model{

  public function get_data_star($star){
    $res = $this->repository->search_film_stars($star);
    return $this->data_to_json($res);
  }

  public function get_data_title($title){
    $res = $this->repository->search_film_title($title);
    return $this->data_to_json($res);
  }

  public function get_details($title){
    $res = $this->repository->get_film_details($title);
    return $this->data_to_json($res);
  }
}

 ?>
