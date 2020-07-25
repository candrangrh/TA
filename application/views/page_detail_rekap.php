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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

</head>

<body>
    <?php include "user_navbar.php" ?>
    <?php include "sidebar.php" ?>

    <section style="margin:30px 40px;">
        <div class="dropdown" style="margin:0 30px 20px 0px;">

            <label for="">Tenant : </label>
            <button class=" btn dropdown-toggle btn-info" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:30px; font-size:10pt; ">
                <?php $nametenant = array_values($rekap)[0];
                echo $nametenant['nama_tenant'] ?>
            </button>
            <hr style="margin-bottom:-15px;">
            <br><label for="" style="margin-bottom:-100px; margin-top:0px; font-size:11pt;">Cetak Laporan Penjualan</label>
            <div class="dropdown-menu">
                <?php foreach ($tenant as $t) : ?>
                    <a class="dropdown-item" href="<?php echo site_url('K_tenant/get_detail_rekap/' . $t['nama_tenant']); ?>">
                        <?php echo $t['nama_tenant']; ?>
                    </a>
                <?php endforeach; ?>
                <a class="dropdown-item" href="<?php echo site_url('K_tenant/get_all_rekap') ?>">
                    all tenant
                </a>
            </div>
        </div>

        <table id="examples" class="display nowrap" style="width:95%; margin:20px 20px;">
            <thead>
                <tr>
                    <!-- <th>Id Rekap</th> -->
                    <th>Tgl rekap</th>
                    <th>Id Transaksi</th>
                    <th>Tenant</th>
                    <th>Total</th>
                    <th>%Potongan</th>
                    <th>Bersih Tenant</th>
                    <th> Bersih Pengelola</th>
                    <th> Tgl Transaksi</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($rekap as $rek) { ?>
                    <tr>
                        <td><?php echo $rek['tgl_rekap']; ?> </td>
                        <td><?php echo $rek['id_transaksi_order']; ?> </td>
                        <td><?php echo $rek['nama_tenant']; ?></td>
                        <td><?php echo $rek['pendapatan_total']; ?></td>
                        <td><?php echo $rek['persen_potongan']; ?></td>
                        <td><?php echo $rek['bersih_tenant']; ?></td>
                        <td><?php echo $rek['bersih_pengelola']; ?></td>
                        <td><?php echo $rek['waktu_transaksi']; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>



</body>
<script src="<?php echo base_url() ?>assets/js/page_kelola_tenant.js"></script>
<script>
    $(document).ready(function() {
        $('#examples').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</html>