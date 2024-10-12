<?php
if ($type == 'buku') {
?>

<?= form_open_multipart('buku/ubahbuku', ['id' => 'formteditbuku']) ?>

  <div class="form-group row">
                    <label for="namabuku" class="col-sm-2 col-form-label">Judul buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judulbuku" id="judulbuku" placeholder="Masukan Judul buku" value="<?= $databuku['judul_buku'] ?>" required autofocus>
                        <input type="hidden" name="id" id="id" value="<?= $databuku['id_buku'] ?>">
                      </div>
                </div>

                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukan Pengarang Buku" value="<?= $databuku['pengarang'] ?>" required>
                    </div>
                </div>
             

               
                <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Kategori Buku</label>

                <div class="col-sm-10">
                    <select class="selectpicker form-control" id="kategori" name="kategori" data-live-search="true" required>
                    <option value="<?= $databuku['kategori'] ?>" disabled><?= $databuku['kategori'] ?></option>

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
                        <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $databuku['ISBN'] ?>" placeholder="Masukan Nomer ISBN" required>
                    </div>
                </div>

                
                <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Tahun Terbit</label>

                <div class="col-sm-10">
                    <select class="selectpicker form-control" id="tahunterbit" name="tahunterbit" data-live-search="true" required>
                    <option value="<?= $databuku['Tahun_terbit'] ?>" disabled><?= $databuku['Tahun_terbit'] ?></option>

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
                        <input type="Number" class="form-control" name="jumlahsalinan" id="jumlahsalinan" value="<?= $databuku['jumlah_salinan'] ?>" placeholder="Masukan Jumlah Salinan" required>
                    </div>
                </div>
                
  
    <div class="modal-footer">
     
      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn  btn-primary"  id="btn-buku">Ubah Data</button>
    </div>
  </form>



<?php

} else if ($type == 'santri') {
?>
  <?= form_open_multipart('santri/ubahsantri', ['id' => 'formteditsantri']) ?>
  <div class="form-group row">
    <label for="namabarang" class="col-sm-2 col-form-label">Nama Santri</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="namasantri" id="namasantri" value="<?= $datasantri['nama_santri'] ?>" placeholder="Masukan Nama Santri" required autofocus>
      <input type="hidden" name="id_santri" id="id_santri" value="<?= $datasantri['id_santri'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="namabarang" class="col-sm-2 col-form-label">NIS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nis" id="nis" value="<?= $datasantri['NIS'] ?>" placeholder="Masukan Nis Santri" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="namabarang" class="col-sm-2 col-form-label">Asrama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="asrama" id="asrama" value="<?= $datasantri['asrama'] ?>" placeholder="Masukan Asrama Santri" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="namabarang" class="col-sm-2 col-form-label">Kelas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $datasantri['kelas'] ?>" placeholder="Masukan kelas santri" required>
    </div>
  </div>

  <div class="form-group row"> <label for="status" class="col-sm-2 col-form-label">Status</label>

<div class="col-sm-10">
<select class="selectpicker form-control" id="status" name="status" data-live-search="true" required>
      <option value="<?= $datasantri['status'] ?>"><?= $datasantri['status'] ?></option>
      <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
    </select>

</div>


  <div class="my-2" id="info-data"></div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" id="btn-santri" class="btn btn-primary">Update Data </button>
  </div>
  </form>



<?php

}else if ($type == 'Pengembalian') {
?>
 <?= form_open_multipart('pinjam/pengembalian', ['id' => 'formpengambilan']) ?>
  <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">Nama Santri</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly name="namasantri" id="namasantri" value="<?= $datapinjam['nama_santri'] ?>" placeholder="Masukan Nama Santri" required autofocus>
      <input type="hidden" name="id_santri" id="id_santri" value="<?= $datapinjam['id_santri'] ?>">
      <input type="hidden" name="id_pinjam" id="id_pinjam" value="<?= $datapinjam['id_pinjambuku'] ?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">Nama Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly name="namabuku" id="namabuku" value="<?= $datapinjam['judul_buku'] ?>" placeholder="Masukan Nama buku" required autofocus>
      <input type="hidden" name="id_buku" id="id_buku" value="<?= $datapinjam['id_buku'] ?>">
    </div>
  </div>
  <div class="form-group row">
  <label for="namasantri" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="number" class="form-control"  name="stokbuku" id="stokbuku" placeholder="Masukan Jumlah Buku" required >
     
    </div>
  </div>

  <div class="my-2" id="info-data"></div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" id="btn-pengambilan" class="btn btn-primary">Kembalikan </button>
  </div>
  </form>

<?php
}else if ($type == 'denda') {

?>

<?= form_open_multipart('denda/tambahdenda', ['id' => 'formdenda']) ?>
  <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">Nama Santri</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly name="namasantri" id="namasantri" value="<?= $datapinjam['nama_santri'] ?>" placeholder="Masukan Nama Santri" required autofocus>
      <input type="hidden" name="id_santri" id="id_santri" value="<?= $datapinjam['id_santri'] ?>">
     </div>
  </div>


  <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">Nama Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly name="namabuku" id="namabuku" value="<?= $datapinjam['judul_buku'] ?>" placeholder="Masukan Nama buku" required autofocus>
      <input type="hidden" name="id_buku" id="id_buku" value="<?= $datapinjam['id_buku'] ?>">
    </div>
  </div>
  
  <div class="form-group row">
  <label for="namasantri" class="col-sm-2 col-form-label">Denda</label>
    <div class="col-sm-10">
      <?php
   $t = date_create($datapinjam['tgl_jatuhtempo']);
   $n = date_create(date('Y-m-d'));

   $date = date('Y-m-d');
  if($n >= $t){

  
   $terlambat = date_diff($t, $n);
   $hari = $terlambat->format("%a");
   $denda = $hari * 1000;


?>
      <input type="number" readonly class="form-control"  name="denda" id="denda" value="<?=$denda?>" required >
     
    </div>
  </div>

  <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">tanggal</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly name="tgldenda" id="tgldenda" value="<?= $date ?>" autofocus>
       </div>
  </div>


  <div class="form-group row">
  <label for="namasantri" class="col-sm-2 col-form-label">Status Pembayaran</label>
    <div class="col-sm-10">
   
<select class="selectpicker form-control" id="status" name="status" data-live-search="true" required>
         <option value="Belum Bayar">Belum Bayar</option>
                            <option value="Sudah Bayar">Sudah Bayar</option>
    </select>     </div>
  </div>


  <div class="my-2" id="info-data"></div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" id="btn-denda" class="btn btn-primary">Tambahkan Denda </button>
  </div>
  </form>
<?php
}
}else if ($type == 'lunasi') {

  ?>
  
  <?= form_open_multipart('pinjam/ubahdenda', ['id' => 'formlunasi']) ?>
    <div class="form-group row">
      <label for="namasantri" class="col-sm-2 col-form-label">Nama Santri</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" readonly name="namasantri" id="namasantri" value="<?= $datadenda['nama_santri'] ?>" placeholder="Masukan Nama Santri" required autofocus>
        <input type="hidden" name="id_santri" id="id_santri" value="<?= $datadenda['id_santri'] ?>">
        <input type="hidden" name="id_denda" id="id_denda" value="<?= $datadenda['id_denda'] ?>">
       </div>
    </div>
  
  
    <div class="form-group row">
      <label for="namasantri" class="col-sm-2 col-form-label">Nama Buku</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" readonly name="namabuku" id="namabuku" value="<?= $datadenda['judul_buku'] ?>" placeholder="Masukan Nama buku" required autofocus>
        <input type="hidden" name="id_buku" id="id_buku" value="<?= $datadenda['id_buku'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="namasantri" class="col-sm-2 col-form-label">Denda</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" readonly name="denda" id="denda" value="<?= $datadenda['denda'] ?>" placeholder="Masukan Nama buku" required autofocus>
      
      </div>
    </div>
  
    <div class="form-group row">
      <label for="namasantri" class="col-sm-2 col-form-label">tanggal</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" readonly name="tgldenda" id="tgldenda" value="<?= $datadenda['tgl_denda'] ?>" autofocus>
         </div>
    </div>
  
  
    <div class="form-group row">
    <label for="namasantri" class="col-sm-2 col-form-label">Status Pembayaran</label>
      <div class="col-sm-10">
     
  <select class="selectpicker form-control" id="status" name="status" data-live-search="true" required>
  <option value="<?= $datadenda['status_pembayaran'] ?>"><?= $datadenda['status_pembayaran'] ?></option>
           <option value="Belum Bayar">Belum Bayar</option>
                              <option value="Sudah Bayar">Sudah Bayar</option>
      </select>     </div>
    </div>
  
  
    <div class="my-2" id="info-data"></div>
  
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      <button type="submit" id="btn-lunas" class="btn btn-primary">Lunasi </button>
    </div>
    </form>
  <?php
  }
  
  ?>