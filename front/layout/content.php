<?php include('header.php'); ?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <!-- Topbar -->
        <?php include('navbar.php'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
            <!-- Illustrations -->
            <div class="col-lg-12 mb-4">
                <div class="card border-bottom-success shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Selamat Datang</h6>
                    </div>
                    <div class="card-body">
                        <p>Hey !!! <br>
                        Selamat datang kembali <br>
                        Jika kamu bingung, silahkan baca penggunaan untuk admin. Klik <a target="_blank" rel="nofollow" href="panduan.php">Disini</a> untuk membaca buku panduannya. <br>
                        Terima kasih telah bergabung, semoga bisa bekerja dengan lancar.</p>
                    </div>
                </div>
            </div>

            <!-- Total Akun Nasabah -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-bluesky shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-bluesky text-uppercase mb-1">Total Akun Nasabah</div>
                        <div class="h5 mb-0 font-weight-bold text-bluesky">total</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-bluesky"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Minimum Transaksi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelas</div>
                            <button onclick="window.location.href='data_kelas.php';" class="btn btn-success">
                                <i class="fas fa-eye"></i> Lihat Data
                            </button>                    
                        </div>
                    <div class="col-auto">
                        <i class="fas fa-school fa-2x text-success"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Data Jurusan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jurusan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <button onclick="window.location.href='data_jurusan.php';" class="btn btn-danger">
                                <i class="fas fa-eye"></i> Lihat Data
                            </button>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-danger"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Info -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Info</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <button onclick="window.location.href='../../system_add/add_info.php';" class="btn btn-warning">
                                        <i class="fas fa-plus"></i> Tambahkan Info
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Content Row -->
        <div class="row">
            <!-- table area -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Diagram Transaksi</h6>
                    <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Filter</div>
                        <a class="dropdown-item" href="#">Bulan Sekarang</a>
                        <a class="dropdown-item" href="#">Minggu Sekarang</a>
                        <a class="dropdown-item" href="#">Hari Ini</a>
                    </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                </div>
            </div>

            <!-- table area -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Transaksi</h6>
                    <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Filter</div>
                        <a class="dropdown-item" href="#">Bulan Sekarang</a>
                        <a class="dropdown-item" href="#">Minggu Sekarang</a>
                        <a class="dropdown-item" href="#">Hari Ini</a>
                    </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <!-- khusus untuk laporan transaksi keuangan -->
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-dark mt-5">
                <div class="container text-white my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bank Mini 2024 - V.1.0</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
<?php include('footer.php'); ?>

<script>
    // Konversi data PHP ke format JavaScript
    var tanggal = <?= json_encode($tanggal) ?>;
    var totalSetor = <?= json_encode($total_setor) ?>;
    var totalTarik = <?= json_encode($total_tarik) ?>;
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: tanggal,
            datasets: [{
                label: "Setor",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: totalSetor,
            }, {
                label: "Tarik",
                borderColor: "rgba(28, 200, 138, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(28, 200, 138, 1)",
                pointBorderColor: "rgba(28, 200, 138, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
                pointHoverBorderColor: "rgba(28, 200, 138, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: totalTarik,
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return value + ' kali'; // Hapus number_format
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + tooltipItem.yLabel + ' kali';
                    }
                }
            }
        }
    });
</script>
