<?php 

class Functions {

  public static function dockingAnime($parent, $val, $newKey, $key = NULL, $direct = FALSE) {
    if($direct === TRUE) {
      foreach($parent as $i => $child) {
        $parent[$i][$newKey] = [];
        foreach($val as $item) {
          if($child['id'] === $item['anime_id']) {
            array_push($parent[$i][$newKey], $item);
            unset($item);
          } } } return $parent;
    }
    foreach($parent as $i => $child) {
      $parent[$i][$newKey] = [];
      foreach($val as $item) {
        if($child['id'] === $item['anime_id']) {
          array_push($parent[$i][$newKey], $item[$key]);
          unset($item);
        } } } return $parent; 
  }

  public static function filterAnime($datas, $items) {
    foreach($datas as $key => $value) {
      foreach($items as $item) {
        if($value['id'] === $item['id']) {
          unset($datas[$key]);
        } } } return $datas;
  }

}