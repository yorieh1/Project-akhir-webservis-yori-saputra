<?php

namespace App\Http\Controllers;

use App\Models\KasMasjid;
use Illuminate\Http\Request;

class KasMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = KasMasjid::where('jenis', 'pemasukan')->sum('masuk');

        $kasMasjid = KasMasjid::where('jenis', 'Pemasukan')->get();
        return view('admin.kas-masjid.index', [
            'kasMasjid' => $kasMasjid,
            'total' => $total,
        ]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kas-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'urain_kas_masjid' => 'required',
            'masuk' => 'required',

        ]);

        $kas = $request->input('urain_kas_masjid');
        $masuk = $request->input('masuk');

        // dd($kas);

        KasMasjid::create([
            'urain_kas_masjid' => $kas,
            'masuk' => $masuk,
            'jenis' => 'pemasukan',
        ]);

        return redirect()->route('kas-masjid')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KasMasjid $kasMasjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_masjid)
    {

        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->first();
        return view('admin.kas-masjid.edit', [
            'kasMasjid' => $kasMasjid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_masjid)
    {
        request()->validate([
            'urain_kas_masjid' => 'required',
            'masuk' => 'required',

        ]);

        // $kas =;
        // $masuk = ;

        // dd($kas)
        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->update([
            'urain_kas_masjid' => $request->input('urain_kas_masjid'),
            'masuk' => $request->input('masuk'),
        ]);



        return redirect()->route('kas-masjid')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_masjid)
    {
        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->delete();
        return redirect()->route('kas-masjid')
            ->with('success', 'Informasi created successfully.');
    }






    /**
     * Route pengeluaran masjid
     */
    public function indexPengeluaran()
    {
        $total = KasMasjid::where('jenis', 'pengeluaran')->sum('keluar');
        $kasMasjid = KasMasjid::where('jenis', 'pengeluaran')->get();
        return view('admin.kas-masjid.pengeluaranIndex', [
            'kasMasjid' => $kasMasjid,
            'total' => $total,
        ]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function createPengeluaran()
    {
        return view('admin.kas-masjid.pengeluaranCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePengeluaran(Request $request)
    {
        request()->validate([
            'urain_kas_masjid' => 'required',
            'keluar' => 'required',

        ]);

        $kas = $request->input('urain_kas_masjid');
        $pengeluaran = $request->input('keluar');

        // dd($kas)

        KasMasjid::create([
            'urain_kas_masjid' => $kas,
            'keluar' => $pengeluaran,
            'jenis' => 'pengeluaran',
        ]);

        return redirect()->route('kas-masjid.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPengeluaran($id_masjid)
    {

        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->first();
        return view('admin.kas-masjid.edit.pengeluaran', [
            'kasMasjid' => $kasMasjid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePengeluaran(Request $request, $id_masjid)
    {
        request()->validate([
            'urain_kas_masjid' => 'required',
            'keluar' => 'required',

        ]);

        // $kas =;
        // $masuk = ;

        // dd($kas)
        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->update([
            'urain_kas_masjid' => $request->input('urain_kas_masjid'),
            'keluar' => $request->input('keluar'),
        ]);



        return redirect()->route('kas-masjid.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPengeluaran($id_masjid)
    {
        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->delete();
        return redirect()->route('kas-masjid.pengeluaran')
            ->with('success', 'Informasi created successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexLaporan()
    {
        $totalMasuk = KasMasjid::where('jenis', 'pemasukan')->sum('masuk');
        $totalKeluar = KasMasjid::where('jenis', 'pengeluaran')->sum('keluar');
        $total = $totalMasuk - $totalKeluar;
        $kasMasjid = KasMasjid::all();
        return view('admin.kas-masjid.laporanKasMasjid', [
            'kasMasjid' => $kasMasjid,
            'total' => $total,
        ]);
    }


    public function destroyLaporan($id_masjid)
    {
        $kasMasjid = KasMasjid::where('id_masjid', $id_masjid)->delete();
        return redirect()->route('kas-masjid.laporan')
            ->with('success', 'Informasi created successfully.');
    }
}
