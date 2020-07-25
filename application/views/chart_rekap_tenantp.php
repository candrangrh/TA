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

</head>

<body>
    <?php include "user_navbar.php" ?>
    <?php include "sidebar.php" ?>

    <section style="margin:30px 40px;">

        <div class="dropdown" style="margin:0 30px 0px 35px;">

            <label for="">Tenant : </label>
            <button class=" btn dropdown-toggle btn-info" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:30px; font-size:10pt; ">
                <?php $nametenant = array_values($rekap)[0];
                echo $nametenant['nama_tenant'] ?>
            </button>
            <hr style="width:200px; margin-right:770px;">
            <div class="dropdown-menu">
                <?php foreach ($tenant as $t) : ?>
                    <a class="dropdown-item" href="<?php echo site_url('K_tenant/chart_detail_rekapp/' . $t['nama_tenant']); ?>">
                        <?php echo $t['nama_tenant']; ?>
                    </a>
                <?php endforeach; ?>
                <a class="dropdown-item" href="<?php echo site_url('K_tenant/chart_detail_rekapall'); ?>">
                        All
                    </a>
            </div>
        </div>


        <?php
        /* Mengambil query report*/
        foreach ($rekap as $result) {
            $date[] = $result['waktu_transaksi']; //ambil tgl
            $value[] = (float)$result['bersih_pengelola']; //ambil nilai
        }
        /* end mengambil query*/

        ?>

        <!-- Load chart dengan menggunakan ID -->
        <div id="report" style="width:1030px"></div>
        <!-- END load chart -->
    </section>

    <!-- Script untuk memanggil library Highcharts -->

</body>
<script type="text/javascript">
    $(function() {
        $('#report').highcharts({
            chart: {
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: false,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Report Pendapatan Pengelola perTenant',
                style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
            subtitle: {
                text: 'Rp.',
                style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: <?php echo json_encode($date); ?>
            },
            exporting: {
                enabled: false
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
            },
            tooltip: {
                formatter: function() {
                    return 'The value for <b>' + this.x + '</b> is <b>' + Highcharts.numberFormat(this.y, 0) + '</b>, in ' + this.series.name;
                }
            },
            series: [{
                name: 'Report Data',
                data: <?php echo json_encode($value); ?>,
                shadow: true,
                dataLabels: {
                    enabled: true,
                    color: '#045396',
                    align: 'center',
                    formatter: function() {
                        return Highcharts.numberFormat(this.y, 0);
                    }, // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>

</html>