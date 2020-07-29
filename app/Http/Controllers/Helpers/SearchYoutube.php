<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Helpers\CacheClass;

class SearchYoutube {

  public function limpiar($cadena) {
    $cadena = str_replace('-', ' ', $cadena);
    $cadena = str_replace('_', '-', $cadena);
    $cadena = ucwords($cadena);
    return $cadena;
  }

  public function spam($cadena) {
    //$cadena = str_replace('(Video Oficial)', '', $cadena);
    //$cadena = str_replace('(Lyrics)', '', $cadena);
    //$cadena = str_replace('(Lyric Video)', '', $cadena);
    //$cadena = str_replace('Letra', '', $cadena);
    //$cadena = str_replace('LETRA', '', $cadena);
    $cadena = str_replace('.wmv', '', $cadena);
    //$cadena = str_replace('(LYRICS)', '', $cadena);
    //$cadena = str_replace('( Audio Oficial )', '', $cadena);
    $cadena = str_replace('|', '', $cadena);
    $cadena = str_replace('(', '', $cadena);
    $cadena = str_replace(')', '', $cadena);
    $cadena = str_replace('/', '', $cadena);
    //$cadena = str_replace('(Con La Letra)', '', $cadena);
    //$cadena = str_replace('(con Letra)', '', $cadena);
    //$cadena = str_replace('Official Video', '', $cadena);
    //$cadena = ucwords($cadena);
    return $cadena;
  }

  public function formatBytes($size, $precision =2) {
    $base = log($size, 1024);
    $suffixes = array('MB', 'KB', 'MB', 'GB', 'TB');
    @$r = round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    return $r;
  }

  public function searchResult($search) {
    $searchKey = str_replace(" ","%20",$search);
    $c = new CacheClass();

    // die($c->isCached($search));
    $c->setCache($search);

    if ($c->isCached($search)) {
      $data = $c->retrieve($search);
    } else {
      $context = stream_context_create(array(
        "ssl"=>array("verify_peer"=>false, "verify_peer_name"=>false,),
        "http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36")
        ));
        
      $fuente = @file_get_contents("https://www.youtube.com/search_ajax?style=json&embeddable=1&search_query=".$searchKey, false, $context);
  
      $json = json_decode($fuente);

      if(!empty($json->video[0])){
        $data = $json->video;
        // $c->setCache($search);
        $c->store($search, $data);
      } else {
        $data = null;
      }
    }
    return $data;
  }
}

?>
