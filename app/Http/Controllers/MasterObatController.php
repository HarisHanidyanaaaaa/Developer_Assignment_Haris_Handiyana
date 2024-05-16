<?php

namespace App\Http\Controllers;

use App\Models\MasterObatModels;
use Illuminate\Http\Request;

class MasterObatController extends Controller
{
    public function index(){
        $obat = MasterObatModels::all();
        return view('MasterObat.index')->with('obat', $obat);
    }
}
