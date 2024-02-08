<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- local -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <title>Rarhan - Resto </title>
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')


    <div class="container my-5" id="content">
        <!-- conten -->

        <div class="content justify-content-center">



            <!-- menu -->
            <div class=" menu card my-3 justify-content-center d-flex shadow" style="background-color: #474F7A;">
                <style>
                    .menu {
                        flex-direction: row;
                        flex-wrap: wrap;
                    }

                    .card {
                        box-shadow: lightgray;
                    }
                </style>

                <!-- card - menu -->
                <h3 class="card-title text-center mt-5 text-white">Orderan Anda</h3>
                <div class="menu col-md-12 justify-content-center d-flex pt-5 pb-5">

                    <div class="card m-5 p-5">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Pesanan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total Pesanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Order</th>
                                    <th scope="col">Control</th>
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
                                    <td>
                                        @if ($detail -> id_status == 4)
                                        <button disabled class="btn btn-secondary">Belum Lunas</button>
                                        @elseif ($detail -> id_status == 5)
                                        <button disabled class="btn btn-success">Lunas</button>
                                        @endif
                                    </td>
                                    <td>{{$detail -> order -> tanggal  }}</td>
                                    <td>
                                    @if ($detail -> id_status == 4)
                                    <a href="{{route ('user.transaksi', $detail->id)}}"><button class="btn btn-success my-2"><i class="fa fa-money"></i> Bayar</button></a>
                                        @elseif ($detail -> id_status == 5)
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
                        {{ $details->links('pagination::bootstrap-4') }}

                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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