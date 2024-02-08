<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body class="">

    <div class="card p-5 m-5 d-flex justify-content-center flex-row"    >
        <div class="card ms-2" style="width: 18rem;">
            <img src="{{asset ('foto/ayam 1.jpeg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <img src="{{asset ('foto/ayam2.jpg')}}" class="card-img-top" alt="..." style="max-width: 286px; max-height: 280px; border: 1px solid; height: 280px;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card ms-2" style="width: 18rem;">
            <img src="{{asset ('foto/ayam 1.jpeg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="card m-5 shadow p-2">

        <!-- tabel -->

        <div>
            <button class="btn btn-primary">Create</button>
        </div>
        <table class=" table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="card m-5 p-5 shadow">
        <label for="">Nama</label>
        <input type="text" class="form-control">

        <label for="">Kelas</label>
        <input type="text" class="form-control">

        <label for="">Gambar</label>
        <input type="file" class="form-control">
        <div class="d-flex mt-2">
            <a href=""><button class="btn btn-primary ms-2">Submit</button></a>
            <a href=""><button class="btn btn-danger ms-2">cancel</button></a>
        </div>

    </div>
</body>

</html>