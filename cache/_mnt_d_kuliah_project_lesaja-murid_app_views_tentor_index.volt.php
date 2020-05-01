<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lesaja</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body class="full">
    <?= $this->flashSession->output() ?>

    <header class="headerapi" align="center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href = /dashboard class="navbar-brand"><img src="img/lesaja.png" width=120></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto align-middle">
                    <li class="nav-item align-middle" align="center">
                        <div class="kelasaya" align="center"> 
                            <a href="/kelas" align="center">Kelas Saya<span class="sr-only"></a>
                        </div>
                    </li>
                    <div class="tengah">
                        <form name="form" action="/dashboard/search" method="post">
                            <div class="align-middle">
                                <input class="search-bar1 mr-sm-2 " type="text" name = "cari" placeholder="Kelas apa yang kamu ingin ikuti hari ini?" width=100>
                            </div>
                            <div class="search-btn1">
                                <button class="btn" name = "submit" type="submit">
                                    <img src="img/search.png" width=20>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="infotentor">
                        <a href="/tentor" for="tentor">Temukan tentormu</a>
                    </div>
                    <li>
                        <label class="nama1" for="nama_murid"><?php $hasil=explode(' ',$this->session->get('AUTH_NAME'),2); echo $hasil[0]; ?></label>
                    </li>
                    <li class="rightnav">
                        <button class="btn dropdwon-toggle" id="nama_murid" data-toggle="dropdown">
                            <img src="img/user.png">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/editprofil">Edit Profile</a>
                            <a class="dropdown-item" href="/logout">Keluar</a>
                        </div>
                    </li>
            </div>
        </nav>
    </header>
        
        <!-- content -->
    <main>
        <div style="overflow-x:auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Tentor</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $v120658372939717899601iterator = $tentor; $v120658372939717899601incr = 0; $v120658372939717899601loop = new stdClass(); $v120658372939717899601loop->self = &$v120658372939717899601loop; $v120658372939717899601loop->length = count($v120658372939717899601iterator); $v120658372939717899601loop->index = 1; $v120658372939717899601loop->index0 = 1; $v120658372939717899601loop->revindex = $v120658372939717899601loop->length; $v120658372939717899601loop->revindex0 = $v120658372939717899601loop->length - 1; ?><?php foreach ($v120658372939717899601iterator as $item) { ?><?php $v120658372939717899601loop->first = ($v120658372939717899601incr == 0); $v120658372939717899601loop->index = $v120658372939717899601incr + 1; $v120658372939717899601loop->index0 = $v120658372939717899601incr; $v120658372939717899601loop->revindex = $v120658372939717899601loop->length - $v120658372939717899601incr; $v120658372939717899601loop->revindex0 = $v120658372939717899601loop->length - ($v120658372939717899601incr + 1); $v120658372939717899601loop->last = ($v120658372939717899601incr == ($v120658372939717899601loop->length - 1)); ?>
                    <tr>
                        <th scope="row"><?= $v120658372939717899601loop->index ?></th>
                        <td><?= $item['nama_tentor'] ?></td>
                        <td><?= $item['email_tentor'] ?></td>
                        <td><?= $item['jkel'] ?></td>
                        <td><?= $item['tgl_lahir'] ?></td>
                    </tr>
                    <?php $v120658372939717899601incr++; } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>