<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Helpers\SearchQueryGeneratorController;
use App\Http\Controllers\Helpers\GenerateReport;
use App\TotalSong;
class TubidyController extends Controller
{
    

    public function __construct(){
        // $this->database = app('App\\'.$this->database);
    }

         
    public function index(Request $request)
    {
        date_default_timezone_set("America/New_York");
        $tubidy = TotalSong::where('style', '=', 'tubidy')->get();
        return view('admin.tubidy.index', compact('tubidy'));

    }

   
}
