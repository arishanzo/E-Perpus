<div class="row col-lg-12">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-gradient-dark">
                <h4 class="text-white">Data Pinjam Buku</h4>
            </div>
            <div class="card-body">
                <div class="card-header py-3">
                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">


                                <button type="button" class="btn btn-dark mb-4 float-right text-right" data-toggle="modal" data-target="#tambahdatapinjamshow">Tambah Data Pinjam</button>
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="datapinjam">
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
                                            <th>Aksi</th>
                                       
                                    </tr>
                                </thead>


                                <tbody >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-gradient-dark">
                <h4 class="text-white">Data Denda Buku</h4>
            </div>
            <div class="card-body">
                <div class="card-header py-3">
                    <div class="container-fluid">

                      
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="datadenda">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Santri</th>
                                        <th>NIS</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Denda</th>
                                        <th>Denda</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                       
                                    </tr>
                                </thead>


                                <tbody >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header bg-gradient-dark">
                <h4 class="text-white">Data Pengambilan Buku</h4>
            </div>
            <div class="card-body">
                <div class="card-header py-3">
                    <div class="container-fluid">

                     
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="datakembalian">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Santri</th>
                                        <th>NIS</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pengembalian</th>
                                           
                                       
                                    </tr>
                                </thead>


                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk tambah data user -->
<div class="modal fade" id="tambahdatapinjamshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $halaman ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('pinjam/tambahpinjam', ['id' => 'formtambahpinjam']) ?>
              
                <div class="form-group row"> <label for="namasantri" class="col-sm-2 col-form-label">Nama Santri</label>

<div class="col-sm-10">
<select class="selectpicker form-control" id="id_santri" name="id_santri" data-live-search="true" required>
                        <?php

                        foreach ($datasantri as $value) {
                        ?>
                            <option value="<?= $value['id_santri'] ?>"><?= $value['nama_santri'] ?></option>

                        <?php


                        }

                        ?>
                    </select>

</div>
</div>

<div class="form-group row"> <label for="namabuku" class="col-sm-2 col-form-label">Nama Buku</label>

<div class="col-sm-10">
<select class="selectpicker form-control" id="id_buku" name="id_buku" data-live-search="true" required>
                        <?php

                        foreach ($databuku as $value) {

                            if ($value['jumlah_salinan'] == 0){
                        ?>

                        
                            <option value="<?= $value['id_buku'] ?>" disabled ><?= $value['judul_buku'] ?></option>

                        <?php
                            }else{
                                ?>

<option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>

                                <?php
                            }

                        }

                        ?>
                    </select>

</div>
</div>
<div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Total Pinjam</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="stokbuku" id="stokbuku" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tglpinjam" id="tglpinjam" required>
                    </div>
                </div>
             
                <div class="my-2" id="info-data"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btn-pinjam" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>

    </div>

    <div>

    </div>

    </div>

<div>
</div> 


