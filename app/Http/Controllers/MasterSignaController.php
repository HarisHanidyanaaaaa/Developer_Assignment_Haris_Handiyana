<?php

namespace App\Http\Controllers;

use App\Models\MasterSignaModels;
use Illuminate\Http\Request;

class MasterSignaController extends Controller
{
    public function index()
    {
        $signa = MasterSignaModels::all();
        return view('MasterSigna.index')->with('signa', $signa);
    }
}
