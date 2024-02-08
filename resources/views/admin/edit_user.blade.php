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

    <title>Admin - Edit Role</title>
</head>

<body>
    <div class="d-flex">




        <!-- sidebar -->
        @include('layouts.sidebar')

        <div class="content-wrapper flex-warp col-md p-3">

            <!-- form-->
            <form action="{{route ('user.edit.update', $users -> id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card p-5 m-5 shadow">

                    <!-- name barang -->
                    <div class="input-group mb-3 m-2">
                        <!-- atas nama -->
                        <label class="input-group-text" for="inputGroupSelect01">Atas Nama</label>
                        <select name="role" class="form-select" id="inputGroupSelect01">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>

                    <div class="d-flex p-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="cancel" class="btn btn-danger">cancel</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>