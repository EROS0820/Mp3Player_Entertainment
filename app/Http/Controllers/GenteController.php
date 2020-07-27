<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Helpers\SearchQueryGeneratorController;
use App\Http\Controllers\Helpers\PortReportGenerate;
use App\TotalSong;
class GenteController extends Controller
{

    public function __construct(){
        // $this->database = app('App\\'.$this->database);
    }

    public function index(Request $request)
    {
        date_default_timezone_set("America/New_York");
        $gente = TotalSong::where('style', '=', 'genteflow')->get();
        return view('admin.gente.index', compact('gente'));
    }

}
