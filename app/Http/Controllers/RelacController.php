<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Helpers\SearchQueryGeneratorController;
use App\Http\Controllers\Helpers\GenerateReport;
use App\TotalSong;
use DB;
class RelacController extends Controller
{

    public function __construct(){
        // $this->database = app('App\\'.$this->database);
    }

    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function index(Request $request)
    { 

        date_default_timezone_set("America/New_York");
        $relac = TotalSong::where('style', '=', 'relacion-sech')->get();
        return view('admin.relac.index', compact('relac'));
    }
}
