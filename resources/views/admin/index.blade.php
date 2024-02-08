<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->

    <!-- local -->
    @include('layouts.link')

    <title>Admin - Homepage</title>
</head>

<body>
    <div class="d-flex">




        <!-- Sidebar -->
        @include('layouts.sidebar')
        <style>
            .g {
                background-image: url("{{asset('banner/bg3.jpg')}}");
                background-position: center center;
                background-size: cover;
                background-attachment: fixed;
                display: inline;
                float: left;
                position: relative;
                width: 100%;
            }

        </style>
        <!-- conten -->
        <div class=" bg g content-wrapper flex-warp col-md p-3">

            <div class="card m-5 p-5">

                <!-- orderan table -->
                <h3 class="card-title text-center"><strong>Tabel Orderan</strong></h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Control</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @forelse ($orders as $order)
                        <tr>
                            <th>{{$order -> id}}</th>
                            <td>{{$order -> users -> name}}</td>
                            <td>{{$order -> masakans -> nama_masakan}}</td>
                            <td>{{$order -> jumlah}}</td>
                            <td>{{$order -> no_meja}}</td>
                            <td>
                                @if ($order->status == 'menunggu')
                                <button disabled class="btn btn-secondary">{{$order->status}}</button>
                                @elseif ($order->status == 'Diterima')
                                <button disabled class="btn btn-success">{{$order->status}}</button>
                                @endif
                            <td>{{$order -> tanggal}}</td>
                            <td>
                                @if ($order->status == 'menunggu')
                                <a href="{{route ('admin.detailcreate', $order -> id)}}"><button class="btn btn-success ms-1">Terima</button></a>
                                <button class="btn btn-danger ms-1">Cancel</button>
                                @elseif ($order->status == 'Diterima')
                                <button disabled class="btn btn-primary ms-1">Diterima</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Orderan belum Tersedia.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $orders->links('pagination::bootstrap-4') }}

            </div>


            <!-- tabel Detail_orderan -->
            <div class="card m-5 p-5">

                <h3 class="card-title text-center"><strong>Tabel Detail_Orderan</strong></h3>

                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Pesanan</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @forelse ($details as $detail)
                        <tr class="text-center">
                            <th>{{$detail -> id}}</th>
                            <td>{{$detail -> user -> name}}</td>
                            <td>{{$detail -> masakan -> nama_masakan}}</td>
                            <td>{{$detail -> masakan -> harga}}</td>
                            <td>{{$detail -> order -> jumlah}}</td>
                            <td>{{$detail -> total_pesanan}}</td>
                            <td>{{$detail -> order -> tanggal  }}</td>
                            <td>
                                @if ($detail -> id_status == 4)
                                <button disabled class="btn btn-secondary">Belum Lunas</button>
                                @elseif ($detail -> id_status == 5)
                                <button disabled class="btn btn-success">Lunas</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Orderan belum Tersedia.
                        </div>
                        @endforelse
                    </tbody>
                    {{ $details->links('pagination::bootstrap-4') }}
                </table>
            </div>

            <!-- tabel Transaksi -->
            <div class="card m-5 p-5">

                <h3 class="card-title text-center"><strong>Tabel Transaksi</strong></h3>

                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Pesanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Pesanan</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Total Kembali</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($transaksis as $transaksi)
                        <tr class="text-center">
                            <th>{{$transaksi -> id}}</th>
                            <td>{{$transaksi -> users -> name}}</td>
                            <td>{{$transaksi -> masakans -> nama_masakan}}</td>
                            <td>{{$transaksi -> masakans -> harga}}</td>
                            <td>{{$transaksi -> details -> total_pesanan}}</td>
                            <td>{{$transaksi -> total_bayar}}</td>
                            <td>{{$transaksi -> kembali}}</td>
                            <td>{{$transaksi -> tanggal }}</td>
                            <td>
                                @if ($transaksi -> id_status == 4)
                                <button disabled class="btn btn-secondary">Belum Lunas</button>
                                @elseif ($transaksi -> id_status == 5)
                                <button disabled class="btn btn-success">Lunas</button>
                                @endif
                            </td>
                            <td>
                                <a href=""><button class="btn btn-success">
                                        <li class="fa fa-print"></li>
                                    </button></a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Belum Tersedia.
                        </div>

                        @endforelse

                    </tbody>
                    {{ $transaksis ->links('pagination::bootstrap-4') }}
                </table>

            </div>



            <!-- tabel Makanan -->
            <div class="card m-5 p-5">

                <h3 class="card-title text-center"><strong>Tabel Masakan</strong></h3>

                <div>
                    <a href="/admin.form-masakan"><button class="btn btn-primary col-sm mb-3">Tambah Data</button></a>
                </div>

                <table class="table table-striped col-md">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Masakan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse($masakans as $masakan )
                        <tr>
                            <th>{{$masakan -> id}}</th>
                            <td>
                                <img src="{{asset ('storage/simpan/masakan/' . $masakan-> image)}}" class="img-fluid rounded col-sm-3 ms-1" alt="">
                            </td>
                            <td>{{$masakan -> nama_masakan}}</td>
                            <td>{{$masakan -> harga}}</td>
                            <td>{{$masakan -> stock}}</td>
                            <td>{{$masakan -> status -> status}}</td>
                            <td>
                                {{$masakan -> deskripsi}}
                            </td>
                            <td>
                                <a href="{{route ('masakan.edit', $masakan -> id)}}">
                                    <button class=" my-1 btn btn-primary"><i class="fa fa-pencil"></i></button>
                                </a>
                                <a href="{{route ('masakan.delete', $masakan -> id)}}">
                                    <button class=" my-1 btn btn-danger"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Belum Tersedia.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $masakans->links('pagination::bootstrap-4') }}

            </div>


            <!-- Tabel User -->
            <div class="card m-5 p-5">

                <h3 class="card-title text-center"><strong>Tabel User</strong></h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Gmail</th>
                            <th scope="col">Role</th>
                            <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($users as $user)
                        <tr>
                            <th>{{$user -> id}}</th>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>{{$user -> role}}</td>
                            <td class="d-flex flex-collum">
                                <a href="{{route ('user.edit', $user -> id)}}">
                                    <button class=" m-1 btn btn-primary"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Belum Tersedia.
                        </div>
                        @endforelse

                    </tbody>
                </table>


            </div>

        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>


<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</html>