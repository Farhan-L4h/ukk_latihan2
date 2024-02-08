<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('layouts.link')
    <title>NOTA TRANSAKSI</title>
</head>

<body style="">
    <div class="container">

        <div class="card p-3" style="">

            <div class="text-center">
                <h3>Laporan Keuangan</h3>
                <h5>Farhan Resto</h5>
            </div>
            <hr>

            <div class="d-flex justify-content-between">


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
            
            <hr>
            <div class="card m-5 p-2 col-sm-5">
                <h5 class="card-title">
                    Sub Total : {{$totalpesanan}}
                </h5>
            </div>
            
        </div>


    </div>
    <script>
        window.onload = function() {
            window.print();

        };
    </script>
</body>

</html>