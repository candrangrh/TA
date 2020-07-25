<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "bootstrap_css.php" ?>
    <?php include "bootstrap_js.php" ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/kelola_tenant.css" ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <?php include "user_navbar.php" ?>
    <?php include "sidebar.php" ?>

    <section style="margin:30px 40px;">
        <div class="dropdown" style="margin:0 30px 20px 0px;">

            <label for="">Tenant : </label>
            <button class=" btn dropdown-toggle btn-info" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:30px; font-size:10pt; ">
                <?php $nametenant = array_values($trx)[0];
                echo $nametenant['nama_tenant'] ?>
            </button>

            <div class="dropdown-menu">
                <?php foreach ($tenant as $t) : ?>
                    <a class="dropdown-item" href="<?php echo site_url('K_tenant/detail_tenant/' . $t['nama_tenant']); ?>">
                        <?php echo $t['nama_tenant']; ?>
                    </a>
                <?php endforeach; ?>
                <a class="dropdown-item" href="<?php echo site_url('K_tenant') ?>">
                    all tenant
                </a>
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%; margin:20px 20px;">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Id Transaksi</th>
                    <th>Tenant</th>
                    <th>Menu</th>
                    <th>Metode Transaksi</th>
                    <th>Total Transaksi</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($trx as $t) { ?>
                    <tr>
                        <td><?php echo $t['waktu_transaksi']; ?></td>
                        <td><?php echo $t['id_transaksi_order']; ?> </td>
                        <td><?php echo $t['nama_tenant']; ?></td>

                        <td><?php echo $t['id_menu']; ?></td>
                        <td><?php echo $t['metode_transaksi_order']; ?></td>
                        <td><?php echo $t['total_harga']; ?></td>
                        <td><?php echo $t['status_transaksi']; ?></td>

                    </tr>
                    <!-- <tr><td></td></tr> -->
                <?php } ?>
            </tbody>
        </table>
        <button class="btn btn-success" onclick="validasi()" style="float:right;margin:30px -20px;">Rekap Data</button>
    </section>



</body>
<script src="<?php echo base_url() ?>assets/js/page_kelola_tenant.js"></script>

</html>