<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- local -->
    @include('layouts.link')

    </body>

    <title>Admin - Orderan</title>
</head>

<body>
    <div class="d-flex">




        <!-- Sidebar -->
        @include('layouts.sidebar')


        <div class="content-wrapper flex-warp col-md p-3">


            <h3 class="card-title text-center">Tabel Orderan</h3>


            <div class="card m-5 p-5">

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
            <h3 class="card-title text-center">Rekap Orderan</h3>


            <div class="card m-5 p-5">

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

        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>