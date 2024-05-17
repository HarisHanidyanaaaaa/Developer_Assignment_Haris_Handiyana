<?php

namespace App\Http\Controllers;

use App\Models\MasterObatModels;
use App\Models\MasterSignaModels;
use App\Models\ResepModels;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $resep = ResepModels::all();
        $obat = MasterObatModels::all();
        $signa = MasterSignaModels::all();
        return view('Resep.index')->with('resep', $resep)->with('obat', $obat)->with('signa', $signa);
    }
    public function store(Request $request)
    {
        $obat = MasterObatModels::where('obatalkes_nama', $request->obatalkes_nama)->first();
        if ($obat && $obat->reduceStock($request->qty)) {
            $resep = new ResepModels();
            $resep->racikan_nama = $request->racikan_nama;
            $resep->obatalkes_nama = $request->obatalkes_nama;
            $resep->signa_nama = $request->signa_nama;
            $resep->qty = $request->qty;
            $resep->save();
            return redirect('/Resep-Index')->with('success', 'Resep berhasil disimpan dan stok berhasil dikurangi.');
        } else {
            return redirect('/Resep-Index')->with('error', 'Stok obat tidak mencukupi.');
        }
    }
    public function storeRacikan(Request $request)
    {
        $obat_nama_list = $request->input('obatalkes_nama');
        $qty_list = $request->input('qty');

        foreach ($obat_nama_list as $index => $obat_nama) {
            $obat = MasterObatModels::where('obatalkes_nama', $obat_nama)->first();

            if ($obat && $obat->reduceStock($qty_list[$index])) {
                continue;
            } else {
                return redirect('/Resep-Index')->with('error', 'Stok obat ' . $obat_nama . ' tidak mencukupi.');
            }
        }

        $resep = new ResepModels();
        $resep->racikan_nama = $request->racikan_nama;
        $resep->obatalkes_nama = implode(", ", $obat_nama_list);
        $resep->signa_nama = $request->signa_nama;
        $resep->qty = array_sum($qty_list);
        $resep->save();

        return redirect('/Resep-Index')->with('success', 'Resep racikan berhasil disimpan dan stok berhasil dikurangi.');
    }
   
    public function printrow($id)
    {
        $resep = ResepModels::where('resep_id', $id)->get();
        return view('Resep.print', compact('resep'));
    }
    
}
