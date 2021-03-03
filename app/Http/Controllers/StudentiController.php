<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentiController extends Controller
{
    public function studenti(){
        $studenti = new \App\Models\Studenti("1","Alaudin Behrami","16.02.2001","M");


        return view('studenti',[
            "studenti"=>$studenti
        ]);
    }
}
