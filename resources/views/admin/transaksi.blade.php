<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CDN -->
    @include('layouts.link')

    <!-- local -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/sidebars.js"></script>
    </body>

    <title>Admin - Transaksi </title>
</head>

<body>
    <div class="d-flex">




        <!-- Sidebar -->
        @include('layouts.sidebar')


        <div class="content-wrapper flex-warp col-md p-3">


            <div class="card m-5 p-5">


            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('admin.transaksi.laporan')}}"><button class="btn btn-success"><i class="fa fa-file"></i></button></a>
            </div>

                <h3 class="card-title text-center my-2">Tabel Rekap Transaksi</h3>

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
                                @if ($transaksi-> id_status == 4)
                                <button disabled class="btn btn-secondary">Belum Lunas</button>
                                @elseif ($transaksi-> id_status == 5)
                                <button disabled class="btn btn-success">Lunas</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{route ('admin.transaksi.notes', $transaksi-> id)}}"><button class="btn btn-success"><li class="fa fa-print"></li></button></a>
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

        </div>
    </div>

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