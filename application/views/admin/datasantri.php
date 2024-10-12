<div class="row col-lg-12">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-gradient-dark">
                <h4 class="text-white">Data <?= $halaman ?></h4>
            </div>
            <div class="card-body">
                <div class="card-header py-3">
                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">


                                <button type="button" class="btn btn-dark mb-4 float-right text-right" data-toggle="modal" data-target="#tambahdatasantrishow">Tambah Data Santri</button>
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="datasantri">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Santri</th>
                                        <th>Nama Santri</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th>Asrama</th>
                                        <th>Status</th>
                                       
                                            <th>Aksi</th>
                                       
                                    </tr>
                                </thead>


                                <tbody align="center">
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
<div class="modal fade" id="tambahdatasantrishow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $halaman ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('santri/tambahsantri', ['id' => 'formtambahsantri']) ?>
                <div class="form-group row">
                    <label for="namasantri" class="col-sm-2 col-form-label">Nama Santri</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namasantri" id="namasantri" placeholder="Masukan Nama Santri" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukan nis santri" required>
                    </div>
                </div>
             

                <div class="form-group row">
                    <label for="asrama" class="col-sm-2 col-form-label">Asrama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="asrama" id="asrama" placeholder="Masukan Asrama" required>
                    </div>
                </div>
                <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Status</label>

                <div class="col-sm-10">
                    <select class="selectpicker form-control" id="status" name="status" data-live-search="true" required>
                     
                            <option value="aktif">Aktif</option>
                            <option value="aktif">Tidak Aktif</option>
                   
                    </select>

                </div>


                <div class="my-2" id="info-data"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btn-santri" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>

    </div>

    <div>

    </div>

    </div>

<div>
</div> 


