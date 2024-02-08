<?php

namespace App\Http\Controllers;
// model

use App\Models\detail_orderan;
use App\Models\masakan;
use App\Models\order;
use App\Models\transaksi;
use App\Models\User;
use App\Models\saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// tambahan
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    // view index
    public function index(): View
    {
        $users = User::all();
        $renders = masakan::with('status')->paginate(10);
        $details = detail_orderan::all();

        return view('user.index', compact('renders', 'details', 'users'));
    }

    // beli
    public function beli($id): View
    {
        //get posts
        $renders = masakan::findOrFail($id);
        $users = Auth::id();


        //render view with posts
        return view('user.beli', compact('renders', 'users'));
    }
    // store
    public function createbeli(Request $request, $id): RedirectResponse
    {

        $user = Auth::id();
        // Membuat data order
        order::create([
            'id_user'  => $request->id_user,
            'id_masakan' => $request->id_masakan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'no_meja' => $request->no_meja,
            'ketegrangan' => $request->keterangan,
        ]);

        return redirect()->route('user.index')->with(['success' => 'orderan berhasil!!']);
    }

    
    // orderan 
    
    public function detailuser($no): View
    {
        $user = Auth::user(); // Get the authenticated user
        $users = User::all();
        
        // Filter detail_orderan records for the authenticated user
        $details = detail_orderan::with('order', 'user', 'masakan', 'status')
        ->where('id_user', $user->id)
        ->latest()
        ->paginate(10);
        
        return view('user.order', compact('details', 'users'));
    }
    

    // transaksi
    public function transaksi($id): View
    {

        // Fetch details for the specific transaction
        $details = detail_orderan::with('masakan', 'user', 'order')->findOrFail($id);

        return view('user.transaksi', compact( 'details'));
    }
    // transaksi Create
    public function createtransaksi(Request $request, $id): RedirectResponse
    {
        
        // pengubah status otomatis
        $status = detail_orderan::findOrFail($id);
        $status->id_status = '5';
        $status->save();

        // dd($request -> all());
        $kembali = $request->total_bayar  - $request->total_pesanan ;
        $detailOrderan = detail_orderan::findOrFail($id);
        $masakan = $detailOrderan->id_masakan;


        
        // $user = Auth::id();
        transaksi::create([
            'id_user'  => $request->id_user,
            'id_detail'  => $request->id_detail,   
            'id_masakan'  => $masakan,   
            'tanggal' => now(),
            'total_pesanan' => $request->total_pesanan,
            'total_bayar' => $request->total_bayar,
            'kembali' => $kembali,
            'id_status' => 5,
        ]);

        return redirect()->route('user.detail', $id)->with(['success' => 'Pembayaran Berhasil']);
    }


}
