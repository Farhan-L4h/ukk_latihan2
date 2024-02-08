<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- local -->
    @include('layouts.link')

    <title>Admin - Homepage</title>
</head>

<body>
    <div class="d-flex">




        <!-- sidebar -->
        @include('layouts.sidebar')

        <div class="content-wrapper flex-warp col-md p-3">


            <h3 class="card-title text-center">Tabel Masakan</h3>


            <div class="card m-5 p-5">


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

        </div>
    </div>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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