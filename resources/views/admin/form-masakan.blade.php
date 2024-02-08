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

    <title>Admin - Form Masakan</title>
</head>

<body>
    <div class="d-flex">




        <!-- sidebar -->
        @include('layouts.sidebar')

        <div class="content-wrapper flex-warp col-md p-3">

            <h3 class="text-center"><strong>Form Masakan</strong></h3>
            <!-- form-->
            <form action="{{route ('masakan.simpanmasakan')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card p-5 m-5 shadow">
                    <div class="d-flex">
                        <h5 class="txt-center">Tambah Menu Masakan</h5>
                    </div>

                    <!-- gambar -->
                    <div class="input-group mb-3 m-2">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input name="image" value="{{old ('image') }}" type="file" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile01">
                    </div>

                    <!-- error notif -->
                    @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror


                    <!-- name barang -->
                    <div class="input-group flex-wrap m-2">
                        <span class="input-group-text" id="addon-wrapping">Nama Masakan</span>
                        <input type="text" name="nama_masakan" value="{{old ('nama_masakan') }}" class=" form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukan Nama" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <!-- error notif -->
                    @error('nama_barang')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <!-- harga -->
                    <div class="input-group flex-wrap m-2">
                        <span class="input-group-text" id="addon-wrapping">Harga</span>
                        <input value="{{ old('harga') ? number_format(old('harga'), 2, '.', '') : '' }}" name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan Harga" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <!-- error notif -->
                    @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <!-- stock -->
                    <div class="input-group flex-wrap m-2">
                        <span class="input-group-text" id="addon-wrapping">Stock</span>
                        <input type="number" value="{{old ('stock') }}" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Masukan Stock" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <!-- error notif -->
                    @error('stock')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <!-- deksripsi -->
                    <div class="input-group felx-warp m-2">
                        <span class="input-group-text">deskripsi</span>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" aria-label="With textarea">{{old('deskripsi')}}</textarea>
                    </div>

                    <!-- error notif -->
                    @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <!-- status -->
                    <!-- <div class="input-group mb-3 m-2">
                        <label class="input-group-text" for="inputGroupSelect01">Status</label>
                        <select name="status" class="form-select" id="inputGroupSelect01">
                            <option value="{{$masakans -> id_status = 1}}">Redy</option>
                            <option value="{{$masakans -> id_status = 2}}">Habis</option>
                        </select>
                    </div> -->


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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>