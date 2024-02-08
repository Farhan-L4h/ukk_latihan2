<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- local -->
    @include('layouts.link')

    </body>

    <title>Admin - USER TABEL</title>
</head>

<body>
    <div class="d-flex">




        <!-- Sidebar -->
        @include('layouts.sidebar')


        <div class="content-wrapper flex-warp col-md p-3">


            <h3 class="card-title text-center">Tabel User</h3>


            <div class="card m-5 p-5">

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