<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class testdatabase extends Controller
{
    public function index()
    {   
        try {
            $dbname = DB::connection()->getDatabaseName();
            return "Connected database name is: {$dbname}";
        } catch(\Exception $e) {
            return "Error in connecting to the database";
        }
    }
}
namespace App\Http\Controllers;
