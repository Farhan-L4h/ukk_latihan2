<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- local -->
    @include('layouts.link')

    <title>Document</title>
</head>

<style>
    body {
        background-image: url("{{asset('banner/bg1.png')}}");
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
        height: 100vh;
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
        <form action="{{route ('user.transaksi.create', $details -> id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card col-md-12 p-5 mt-5 shadow d-flex">


                

                <div class="d-flex">
                    <h5 class="txt-center">Pembayaran</h5>
                </div>

                <div class="input-group mb-3 m-2">
                    <!-- input id masakan -->
                    <label class="input-group-text" for="inputGroupSelect01">No Pesanan</label>
                    <select name="id_detail" class="form-select" id="inputGroupSelect01">
                        <option value="{{$details -> id}}">{{$details -> id}}</option>
                    </select>
                    <!-- atas nama -->
                    <label class="input-group-text" for="inputGroupSelect01">Atas Nama</label>
                    <select name="id_user" class="form-select" id="inputGroupSelect01">
                        <option value="{{$details -> user -> id}}">{{$details -> user -> name}}</option>
                    </select>
                </div>



                <!-- error notif -->
                @error('harga')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <!-- total -->
                <div class="input-group flex-wrap m-2">

                    <!-- harga -->
                    <span class="input-group-text" id="addon-wrapping">Harga Masakan :</span>
                    <input disabled type="number" value="{{$details -> masakan -> harga}}" name="" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
                </div>


                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Jumlah Pesanan :</span>
                    <input disabled type="number" value="{{$details -> order -> jumlah}}" name="" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Harga Total Pesanan :</span>
                    <input type="number" value="{{$details -> masakan -> harga  * $details -> order -> jumlah}}" name="total_pesanan" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-wrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Total Bayar</span>
                    <input type="number" value="{{old ('total_bayar') }}" name="total_bayar" min="{{$details -> masakan -> harga  * $details -> order -> jumlah}}" class="form-control" placeholder="Masukan Nominal" aria-label="Username" aria-describedby="addon-wrapping">

                </div>


                <!-- error notif -->
                @error('stock')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="input-group flex-wrap m-2">
                </div>

                <!-- error notif -->
                @error('stock1')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

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