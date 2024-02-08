<?php

namespace App\Http\Controllers;

use App\Models\detail_orderan;
use App\Models\masakan;
use App\Models\status;
use App\Models\order;
use App\Models\User;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(): View
    {
        //get masakan
        $masakans = masakan::with('status')->paginate(5);

        //user
        $users = User::paginate(10);

        // transaksi
        $transaksis = transaksi::with('details', 'masakans', 'statuses')->paginate(10);

        // details orderan
        $details = detail_orderan::with('order', 'user', 'masakan', 'status')->paginate(10);

        // $details = detail_orderan::with(['users', 'orders', 'masakans', 'statuses', 'transaksis'])

        //     ->select('detail_orderans.id', 'users.name', 'masakans.nama_masakan', 'orders.jumlah', 'orders.no_meja', 'statuses.status', 'orders.tanggal', 'transaksis.total_bayar', 'masakans.harga', 'detail_orderans.id_transaksi', 'detail_orderans.keterangan')

        //     ->join('users', 'detail_orderans.id_user', '=', 'users.id')
        //     ->join('orders', 'detail_orderans.id_user', '=', 'orders.id')
        //     ->join('statuses', 'detail_orderans.id_status', '=', 'statuses.id')
        //     ->join('masakans', 'detail_orderans.id_masakan', '=', 'masakans.id')
        //     ->join('transaksis', 'detail_orderans.id_masakan', '=', 'transaksis.id')
        //     ->get();


        // orderan
        $orders = order::with('users', 'masakans', 'statuses')->latest()->paginate(20);

        return view('admin.index', compact('masakans', 'users', 'orders', 'details', 'transaksis'));
    }


    // masakan
    public function masakan(): View
    {

        $masakans = masakan::with('status')->paginate(5);
        $statuses = status::all();



        return view('admin.masakan', compact('masakans', 'statuses'));
    }

    // form masakan

    public function createmasakan(): View
    {

        $masakans = masakan::with('status')->paginate(2);
        $statuses = status::all();



        return view('admin.form-masakan', compact('masakans', 'statuses'));
    }
    // store
    public function simpanmasakan(Request $request): RedirectResponse
    {


        $image = $request->file('image');
        $image->storeAs('public/simpan/masakan', $image->hashName());


        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_masakan' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
        ]);


        masakan::create([
            'image' => $image->hashName(),
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);


        session()->flash('success', 'Form submitted successfully.');
        return redirect()->route('admin.masakan');
    }

    //form edit masakan
    public function editmasakan(string $id): View
    {
        //get post by ID
        $masakans = masakan::findOrFail($id);

        //render view with post
        return view('admin.edit-masakan', compact('masakans'));
    }

    // update masakan
    public function updatemasakan(Request $request, $id): RedirectResponse
    {
        $masakans = masakan::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/simpan/masakan', $image->hashName());

            //delete old image
            Storage::delete('public/simpan/masakan' . $masakans->image);

            //update post with new image
            $masakans->update([
                'image' => $image->hashName(),
                'nama_masakan' => $request->nama_masakan,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);
        } else {

            //update post without image
            $masakans->update([
                'nama_masakan' => $request->nama_masakan,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);
        }

        //redirect to index
        return redirect()->route('admin.masakan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete Masakan
    public function deletemasakan($id): RedirectResponse
    {
        //get post by ID
        $masakans = masakan::findOrFail($id);

        //delete image
        Storage::delete('public/simpan/masakan' . $masakans->image);

        //delete post
        $masakans->delete();

        //redirect to index
        return redirect()->route('admin.masakan')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    // user
    public function user(): View
    {

        $users = User::paginate(10);


        return view('admin.user', compact('users'));
    }

    // user edit

    //form edit user
    public function edituser(string $id): View
    {

        $users = user::findOrFail($id);

        return view('admin.edit_user', compact('users'));
    }
    //update
    public function userupdate(Request $request, $id): RedirectResponse
    {
        $users = User::findOrFail($id);

        //update post without image
        $users->update([
            'role' => $request->role,
        ]);

        //redirect to index
        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Diubah!']);
    }


    // order
    public function order(): View
    {


        // details order

        // $details = detail_orderan::with(['users', 'orders', 'masakans', 'statuses', 'transaksis'])


        // ->join('users', 'detail_orderans.id_user', '=', 'users.id')
        // ->join('orders', 'detail_orderans.id_user', '=', 'orders.id')
        // ->join('statuses', 'detail_orderans.id_status', '=', 'statuses.id')
        // ->join('masakans', 'detail_orderans.id_masakan', '=', 'masakans.id')
        // ->join('transaksis', 'detail_orderans.id_masakan', '=', 'transaksis.id')

        //  ->select('detail_orderans.id', 'users.name', 'masakans.nama_masakan', 'orders.jumlah', 'orders.no_meja', 'statuses.status', 'orders.tanggal' , 'transaksis.total_bayar' ,'masakans.harga', 'detail_orderans.id_transaksi', 'detail_orderans.keterangan')
        //  ->get();

        $details = detail_orderan::with('order', 'user', 'masakan', 'status')->latest()->paginate(5);

        // order
        $orders = order::with('users', 'masakans', 'statuses')->latest()->paginate(20);

        return view('admin.order', compact('orders', 'details'));
    }


    // details
    public function detailscreate(Request $request, order $order)
    {
        // Mengubah status order menjadi 'Diterima'
        $order = Order::findOrFail($order->id);
        $order->status = 'Diterima';
        $order->save();

        $data = Order::with('masakans')->findOrFail($order->id);

        $total = $data->jumlah * $data->masakans->harga;

        // Duplikasi data order ke detail_orderan
        $details = new detail_orderan();
        $details->id_order = $order->id;
        $details->id_user = $order->id_user;
        $details->id_masakan = $order->id_masakan;
        $details->total_pesanan = $total;
        $details->tanggal = now();
        $details->save();

        return back()->with('success', 'Orderan Diterima');
    }



    // transaksi
    public function transaksi(): View
    {


        $transaksis = transaksi::with('details', 'users', 'masakans', 'statuses')->latest()->paginate(10);



        return view('admin.transaksi', compact('transaksis'));
    }


    public function struck(string $id): View
    {

        $jumlah = detail_orderan::with('order')->findOrFail($id);
        $transaksis = transaksi::with('details', 'users', 'masakans', 'statuses')->findOrFail($id);
        
        return view('struck.index', compact('transaksis','jumlah'));
    }


    public function laporan(): View
    {
        $transaksis = transaksi::with('details', 'users', 'masakans', 'statuses')->latest()->paginate(10);
        $kali = transaksi::latest()->first();
        $totalpesanan = 0;

        foreach ($transaksis as $transaksi) {
            $totalpesanan += $transaksi->details->sum('total_pesanan');
        }

        

        return view('struck.laporan', compact('transaksis', 'kali', 'totalpesanan'));
    }

}
