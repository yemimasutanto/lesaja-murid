<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lesaja</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body>
    {{ form('user/list', 'method': 'post') }}
    <div class="container">
        <div class="row">
            <div class="col-sm-300 col-md-150 col-lg-300 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h3 class="card-title text-center"><a href=""><img src="/public/img/logo.png"
                                    style="max-height: 300px; max-width: 300px;"></a><br>List Produk | Quantity:
                            <?php echo $produk->count(); ?>
                        </h3>
                        <form method="POST" autocomplete="off" action="{{url('Produk/cari')}}" >

                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id='nama' name='nama' placeholder="Cari Produk" aria-label="Cari Produk">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-block" type="submit">Cari</button>
                            </div>
                        </div>
                        </form>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Brand Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Status Produk</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for prod in produk %}
                                <tr>
                                    <td>{{ prod.id_produk }}</td>
                                    <td><img src='{{url(prod.foto_produk)}}' class="mx-auto d-block" width="100" height="100"></td>
                                    <td>{{ prod.nama_produk }}</td>
                                    <td>{{ prod.brand_produk }}</td>
                                    <td>{{ prod.deskripsi_produk }}</td>
                                    <td>{{ prod.harga_produk }}</td>
                                    <td>{{ prod.status_produk }}</td>
                                    <td><a href="{{ url('Produk/edit/' ~ prod.id_produk) }}" class='btn btn-outline-primary btn-block'>Edit</a><br>
                                        <a href="{{ url('Produk/hapus/' ~ prod.id_produk) }}" class='btn btn-outline-primary btn-block'>Hapus</a></td>
                                </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="{{url('/menu')}}" class="btn btn-lg btn-outline-primary"
                                        role="button">Menu</a> &emsp;
                                    <a href="{{url('/produk')}}" class="btn btn-lg btn-outline-primary" role="button">Tambah Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>