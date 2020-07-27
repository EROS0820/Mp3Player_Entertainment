<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Helpers\CacheClass;

class Suggest {

  public function getSuggest($search) {
    $fuente = @file_get_contents("https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q=".$search, false, $context);
    $json = json_decode($fuente);
    return $json;
  }
}

?>
