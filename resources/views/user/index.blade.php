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

    <!-- Banner -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset ('banner/banner 1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset ('banner/banner 1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset ('banner/banner 1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-5" id="content">
        <!-- conten -->

        <div class="content justify-content-center">


        <button class="btn btn-primary">
            <a style="text-decoration: none; color: white;" href="{{ route('user.detail',['no' => Auth::user()->id]) }}">Orderan</a>
        </button>

            <!-- menu -->
            <div class=" menu card my-3 justify-content-center d-flex shadow">
                <style>
                    .menu {
                        flex-direction: row;
                        flex-wrap: wrap;
                    }

                    .card {
                        box-shadow: lightgray;
                    }

                    .kartu {
                        transition: box-shadow 0.5s ease-in-out, transform 0.5s ease-in-out;
                    }

                    .kartu:hover {
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                        transform: scale(1.05);
                        transition: box-shadow 0.3s ease, transform 0.3s ease;
                    }

                    * {
                        scroll-behavior: smooth;
                        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                    }
                </style>

                <!-- card - menu -->
                <h3 class="card-title text-center mt-5">Menu Makanan</h3>
                <div class="menu col-md-12 justify-content-center d-flex pt-5 pb-5">


                    @forelse($renders as $render)
                    <div class="card m-2 shadow-sm kartu" style="width: 18rem;">
                        <img src="{{asset ('storage/simpan/masakan/' . $render -> image)}}" class="card-img-top rounded-top" alt="..." style="max-width: 290px; max-height: 290px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$render -> nama_masakan}}</h5>
                            <button disabled class="btn btn-success m-1">Rp: {{$render -> harga}} <a disabled class="btn btn-primary ms-3">Status - {{$render -> status -> status}}</a></button>
                            <hr>
                            <p class="card-text">deksripsi :<br>{{$render -> deskripsi}}</p>
                            <hr><div class="d-flex">
                        
                                <a href="{{route ('user.beli' ,$render -> id)}}" class="btn btn-primary">Beli Sekarang</a>
                            </div>

                        </div>
                    </div>


                    @empty
                    <div class="alert alert-danger">
                        Data Belum Tersedia.
                    </div>
                    @endforelse

                </div>
            </div>

            <!-- Tabel Transaksi -->




        </div>


    </div>

    <!-- lainnya -->
    <div class="p-5" style="background-color: lightgray;">
        <!-- about -->
        <div id="about">
            <div class="menu card mb-3 menu m-5 col-md-12 justify-content-center d-flex pb-5 pt-5 ms-2 shadow">
                <div class="row g-0 ps-5">
                    <h3 class="card-title text-center">About</h3>
                    <div class="col-md-3 m-2 rounded">
                        <img src="{{asset ('foto/ayam 1.jpg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ayam Geprek</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pesan atau rating dan lainnya -->
        <div class="menu card mb-3 menu m-5 col-md-12 justify-content-center d-flex pb-5 pt-5 ms-2 shadow">
            <div class="card text-center">
                <div class="card-header">
                    Pesan
                </div>
                <div class="card-body">
                    <h5 class="card-title">Tinggalkan Pesan dan Kesan Mu Disni</h5>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-body-secondary">
                    2 days ago
                </div>
            </div>
        </div>



    </div>

    <!-- footer -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Company, Inc</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
        </footer>
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