<?php

namespace App\Http\Controllers;

use App\Models\KasSosial;
use Illuminate\Http\Request;

class KasSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = KasSosial::where('jenis', 'pemasukan')->sum('masuk');

        $KasSosial = KasSosial::where('jenis', 'Pemasukan')->get();
        return view('admin.kas-sosial.index', [
            'KasSosial' => $KasSosial,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kas-sosial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'uraian' => 'required',
            'masuk' => 'required',

        ]);

        $kas = $request->input('uraian');
        $masuk = $request->input('masuk');

        // dd($kas);

        KasSosial::create([
            'uraian' => $kas,
            'masuk' => $masuk,
            'jenis' => 'pemasukan',
        ]);

        return redirect()->route('kas-sosial')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KasSosial $kasSosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kasSosial = KasSosial::where('id', $id)->first();
        return view('admin.kas-sosial.edit', [
            'kasSosial' => $kasSosial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'uraian' => 'required',
            'masuk' => 'required',

        ]);

        // $kas =;
        // $masuk = ;

        // dd($kas)
        $kasSosial = KasSosial::where('id', $id)->update([
            'uraian' => $request->input('uraian'),
            'masuk' => $request->input('masuk'),
        ]);



        return redirect()->route('kas-sosial')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kasSosial = KasSosial::where('id', $id)->delete();
        return redirect()->route('kas-sosial')
            ->with('success', 'Informasi created successfully.');
    }




    /**
     * Route pengeluaran masjid
     */
    public function indexPengeluaran()
    {
        $total = KasSosial::where('jenis', 'pengeluaran')->sum('keluar');
        $kasSosial = KasSosial::where('jenis', 'pengeluaran')->get();
        return view('admin.kas-sosial.pengeluaranIndex', [
            'kasSosial' => $kasSosial,
            'total' => $total,
        ]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function createPengeluaran()
    {
        return view('admin.kas-sosial.pengeluaranCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePengeluaran(Request $request)
    {
        request()->validate([
            'uraian' => 'required',
            'keluar' => 'required',

        ]);

        $kas = $request->input('uraian');
        $pengeluaran = $request->input('keluar');

        // dd($kas)

        KasSosial::create([
            'uraian' => $kas,
            'keluar' => $pengeluaran,
            'jenis' => 'pengeluaran',
        ]);

        return redirect()->route('kas-sosial.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPengeluaran($id)
    {

        $kasSosial = KasSosial::where('id', $id)->first();
        return view('admin.kas-sosial.pengeluaranEdit', [
            'kasSosial' => $kasSosial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePengeluaran(Request $request, $id)
    {
        request()->validate([
            'uraian' => 'required',
            'keluar' => 'required',

        ]);

        // $kas =;
        // $masuk = ;

        // dd($kas)
        $kasSosial = KasSosial::where('id', $id)->update([
            'uraian' => $request->input('uraian'),
            'keluar' => $request->input('keluar'),
        ]);



        return redirect()->route('kas-sosial.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPengeluaran($id)
    {
        $kasSosial = KasSosial::where('id', $id)->delete();
        return redirect()->route('kas-sosial.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexLaporan()
    {
        $totalMasuk = KasSosial::where('jenis', 'pemasukan')->sum('masuk');
        $totalKeluar = KasSosial::where('jenis', 'pengeluaran')->sum('keluar');
        $total = $totalMasuk - $totalKeluar;
        $kasSosial = KasSosial::all();
        return view('admin.kas-sosial.laporanKasSosial', [
            'kasSosial' => $kasSosial,
            'total' => $total,
        ]);
    }

    public function destroyLaporan($id)
    {
        $kasSosial = KasSosial::where('id', $id)->delete();
        return redirect()->route('kas-sosial.laporan')
            ->with('success', 'Informasi created successfully.');
    }
}
