<?php
class View{
  public function generate($content_view, $template_view, $data = null){
    #echo "View".$content_view.$templete_view;
    include ROOT."/views/".$template_view;
  }

  public function printData($data){
    echo $data;
  }
}
 ?>
