<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Dashboard</h1>

        <div class="col-lg-6">
                            <h5 class="text-right text-success"><?= $jam ?>, <?= date('d-F-Y') ?></h5>
                                <h2 class=" text-right" id="jam" style="font-size:24"></h2>
                            </b>
                        </div>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>

 
    

    <div class="row mt-3">
        <div class=" col-md-12 mb-4">
            <div class="card border-left-dark shadow h-100 py-5">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Jumlah Santri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dtsantri ?>
                            </div>
                            
                        </div>
                        <div class="col-auto">  <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mt-3">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Jumlah Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dtbuku ?>
                            </div>
                            
                        </div>
                        <div class="col-auto">  <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mt-3">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Jumlah Pinjaman Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $pinjam ?>
                            </div>
                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
       
    <div class="card">
        <div class="card-body col-md-12">
            
                <div class="card-header mt-3">
                    <b><span class="mb-4">Notifikasi Status Pengembalian Buku</span></b>
                </div>
                <div class="table-responsive mt-3">
                     <table class="table table-striped mb-0 admin" id="laporandatapinjam">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Santri</th>
                                        <th>NIS</th>
                                        <th>Judul Buku</th>
                                        <th> Jumlah Pinjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Terlambat</th>
                                        <th>Denda</th>
                                        <th>status</th>
                                       
                                    </tr>
                                </thead>


                        <tbody align="center">
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    </div>
  







    <br>
</div>