<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayatOddoModel;
use App\Models\oddoOutModel;
use App\Models\oddoInModel;
use App\Models\User;
use App\Models\kendaraanModel;

class oddoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = RiwayatOddoModel::with('oddoIn.user', 'oddoIn.kendaraan', 'oddoOut.user','oddoOut.kendaraan')->get();

        return view ('test', compact('test'));
    }

        public function oddoOutStore(Request $request)
        {
            $userId = $request->user_id;

            $riwayatTransaksi = RiwayatOddoModel::where('user_id', $userId)
                ->whereNull('oddo_in_id')
                ->first();

            if ($riwayatTransaksi) {
                // Jika ada catatan "Oddo In" yang kosong, alihkan pengguna ke halaman Oddo In terlebih dahulu
                return redirect()->route('oddoInForm')->with('error', 'Anda harus melakukan Oddo In terlebih dahulu.');
            }

            // Lanjutkan dengan menyimpan data Oddo Out karena tidak ada "Oddo In" yang kosong
            $oddoOut = new OddoOutModel;
            $oddoOut->kendaraan_id = $request->kendaraan_id;
            $oddoOut->user_id = $request->user_id;
            $oddoOut->oddometer = $request->oddometer;
            $oddoOut->foto_oddo_meter = $request->foto_oddo_meter;
            $oddoOut->safety_tools = $request->safety_tools;
            $oddoOut->save();

            $kodeUnikTransaksi = 'ODD/' . date('dmY') . '/' . mt_rand(1000, 9999);

            $riwayatTransaksi = new RiwayatOddoModel;
            $riwayatTransaksi->user_id = $userId;
            $riwayatTransaksi->unique_code = $kodeUnikTransaksi;
            $riwayatTransaksi->oddo_out_id = $oddoOut->id;
            $riwayatTransaksi->save();

            // Jika semua berhasil, tampilkan pesan sukses
            return redirect('/user')->with('success', 'Oddo Out berhasil disimpan.');
        }



    public function oddoOutview(){
        return view ('oddoOutView');
    }

    public function oddoInStore(Request $request){

        $user_id = $request->user_id;

        $riwayatTransaksi = riwayatOddoModel::where('user_id', $user_id)
        ->whereNull('oddo_in_id') // Pastikan tidak ada transaksi "Oddo In"
        ->first();

        if ($riwayatTransaksi) {
            // Simpan transaksi Oddo In dalam transaksi masuk yang sesuai
            $oddoIn = new OddoInModel;
            $oddoIn->kendaraan_id = $request->kendaraan_id;
            $oddoIn->user_id = $request->user_id;
            $oddoIn->oddometer = $request->oddometer;
            $oddoIn->foto_oddo_meter = $request->foto_oddo_meter;
            $oddoIn->safety_tools = $request->safety_tools;
            $oddoIn->save();

            // Update ID transaksi masuk pada catatan riwayat yang sudah ada
            $riwayatTransaksi->oddo_in_id = $oddoIn->id;
            $riwayatTransaksi->save();

            return redirect('/user')->with('success', 'Oddo in berhasil disimpan.');
        }
    }

    public function oddoInView(){
        return view ('oddoInView');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
