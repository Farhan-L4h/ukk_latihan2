<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- local -->
    @include('layouts.link')

    <title>User - Form Beli</title>
</head>

<style>
    body {
            background-image: url("{{asset('banner/bg2.jpg')}}");
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            display: inline;
            float: left;
            position: relative;
            width: 100%;
        }

        .bg {
            justify-content: center;
            align-items: center;
            height: auto;
            position: relative;
            /* Menambahkan posisi relatif */
        }

        .bg::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna hitam dengan opacity 50% */
            z-index: 1;
            /* Mengatur lapisan di atas background */
        }
</style>


<!-- navbar -->
@include('layouts.navbar')


<body class="bg">
    <div class="container justify-content-center d-flex " style="position: relative; z-index: 2;">
        <!-- form-->
        <form action="{{route ('user.beli.create', $renders-> id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card col-md-10 p-5 m-5 shadow">
                <div class="d-flex">
                    <h5 class="txt-center">Buat Pesanan</h5>
                </div>

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset ('storage/simpan/masakan/' . $renders -> image)}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$renders -> nama_masakan}}</h5>
                                <p class="card-text mb-0">
                                <div class="overflow-auto m-0" style="max-height: 90px;">{{$renders -> deskripsi}}</div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- input id masakan -->
                <div class="input-group mb-3 m-2">
                    <label class="input-group-text" for="inputGroupSelect01">Makanan</label>
                    <select name="id_masakan" class="form-select" id="inputGroupSelect01">
                        <option value="{{$renders -> id}}">{{$renders-> nama_masakan}}</option>
                    </select>
                </div>


                <!-- atas nama -->
                <div class="input-group mb-3 m-2">
                    <label class="input-group-text" for="inputGroupSelect01">Atas Nama</label>
                    <select name="id_user" class="form-select" id="inputGroupSelect01">
                        <option value="{{Auth::user()-> id}}">{{Auth::user()-> name}}</option>
                    </select>
                </div>

                <!-- tanggal -->
                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Tanggal</span>
                    <input value="{{old ('tanggal') }}" name="tanggal" type="date" class="form-control @error('harga') is-invalid @enderror" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <!-- error notif -->
                @error('harga')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <!-- Jumlah -->
                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Jumlah</span>
                    <input type="number" value="{{old ('jumlah') }}" name="jumlah" class="form-control @error('stock') is-invalid @enderror" placeholder="Masukan Stock" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <!-- error notif -->
                @error('stock')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <!-- no_meja -->
                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Nomer Meja</span>
                    <input type="number" value="{{old ('no_meja') }}" name="no_meja" class="form-control @error('stock1') is-invalid @enderror" placeholder="Masukan Stock" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <!-- error notif -->
                @error('stock1')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <!-- deksripsi -->
                <div class="input-group felx-warp m-2">
                    <span class="input-group-text">keterangan</span>
                    <textarea name="keterangan" class="form-control @error('deskripsi') is-invalid @enderror" aria-label="With textarea">{{old('keterangan')}}</textarea>
                </div>

                <!-- error notif -->
                @error('deskripsi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="d-flex p-2">
                    <a class="mt-2 " href="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </a>
                    <a class="mt-2 ms-1" href="/admin.tmb-barang">
                        <button type="cancel" class="btn btn-danger">cancel</button>
                    </a>
                </div>

            </div>
        </form>

    </div>
</body>

</html>