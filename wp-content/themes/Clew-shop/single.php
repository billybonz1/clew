<?php
  $post = $wp_query->post;
 
  if (in_category('colaboration')) { //slug  категории
      include(TEMPLATEPATH.'/single-colaboration.php');
  }else if(in_category('news')){
    include(TEMPLATEPATH.'/single-news.php');
  }else if(in_category('news')){
    include(TEMPLATEPATH.'/single-news.php');
  }else if(in_category('proposition')){
    include(TEMPLATEPATH.'/single-proposition.php');
  } else {
      include(TEMPLATEPATH.'/single-default.php');
  }
?>