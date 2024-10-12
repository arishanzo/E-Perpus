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


                                <button type="button" class="btn btn-dark mb-4 float-right text-right" data-toggle="modal" data-target="#tambahdatabukushow">Tambah Data buku</button>
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 admin" id="databuku">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul buku</th>
                                        <th>Pengarang</th>
                                        <th>Kategori</th>
                                        <th>ISBN</th>
                                        <th>Tahun Terbit</th>
                                        <th>Jumlah/Stock Buku</th>
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
<div class="modal fade" id="tambahdatabukushow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $halaman ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('buku/tambahbuku', ['id' => 'formtambahbuku']) ?>
                <div class="form-group row">
                    <label for="namabuku" class="col-sm-2 col-form-label">Judul buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judulbuku" id="judulbuku" placeholder="Masukan Judul buku" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukan Pengarang Buku" required>
                    </div>
                </div>
             

               
                <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Kategori Buku</label>

                <div class="col-sm-10">
                    <select class="selectpicker form-control" id="kategori" name="kategori" data-live-search="true" required>
                     
                            <option value="fiksi">Fiksi</option>
                            <option value="non_fiksi">Non Fiksi</option>
                            
                            <option value="pelajaran">Pelajaran</option>
                            <option value="lainnya">Lainnya</option>
                   
                    </select>

                </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Masukan Nomer ISBN" required>
                    </div>
                </div>

                
                <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Tahun Terbit</label>

                <div class="col-sm-10">
                    <select class="selectpicker form-control" id="tahunterbit" name="tahunterbit" data-live-search="true" required>
<?php   
                $now=date('Y');    for ($a=1990;$a<=$now;$a++){

     echo "<option value=' ".$a." '>".$a."</option>";

}

?>
                   
                    </select>

                </div>
                </div>

                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Jumlah/Stock</label>
                    <div class="col-sm-10">
                        <input type="Number" class="form-control" name="jumlahsalinan" id="jumlahsalinan" placeholder="Masukan Jumlah Salinan" required>
                    </div>
                </div>
                

                <div class="my-2" id="info-data"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btn-buku" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>

    </div>

    <div>

    </div>

    </div>

<div>
</div> 

<div>
</div> 

<div>
</div> 

<div>
</div> 


<div>
</div> 



