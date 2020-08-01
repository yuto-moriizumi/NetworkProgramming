<?php

namespace App\Http\Controllers;

use mysqli;
use PDO;
use DB;
use Log;
use Illuminate\Http\Request;

class SQLController extends Controller
{
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "np";
        $this->password = "A7H2DJ@2GwGv";
        $this->dbname = "mydb";
    }

    public function searchWinResults()
    {
        //
        // modify following code for searching win matches
        //
        $team_id = request('team');

        // sample query: search all tournament name
        $results = DB::table("wc_tournament")
            ->select("name AS tournament_name")
            ->get();

        // show page based on the template: sql/search_win_matchers.blade.php with parameters: team, data
        return view('sql/search_win_results', [
            'team' => $team_id,
            'data' => $results
        ]);
    }
}
