<!-- Modal untuk edit data user -->
<div class="modal fade" id="editshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $halaman ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="edit">

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // ini adalah fungsi untuk mengambil data user dan di  incluce ke dalam datatable
      var datasantri = $('#datasantri').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/santri/datasantri") ?>",
        stateSave: true,
        "order": []
      })

      // ini adalah fungsi untuk mengambil data user dan di  incluce ke dalam datatable
      var databuku = $('#databuku').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/buku/databuku") ?>",
        stateSave: true,
        "order": []
      })


      var datapinjam= $('#datapinjam').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/pinjam/datapinjam") ?>",
        stateSave: true,
        "order": []
      })

      var datakembalian= $('#datakembalian').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/pinjam/datakembalian") ?>",
        stateSave: true,
        "order": []
      })

      var datadenda= $('#datadenda').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/pinjam/datadenda") ?>",
        stateSave: true,
        "order": []
      })


      var datadenda= $('#laporandatadenda').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/laporan/datadenda") ?>",
        stateSave: true,
        "order": []
      })


      var datakembalian= $('#laporandatakembalian').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/laporan/datakembalian") ?>",
        stateSave: true,
        "order": []
      })

      var datapinjam= $('#laporandatapinjam').DataTable({
        "processing": true,
        "ajax": "<?= base_url("index.php/laporan/datapinjam") ?>",
        stateSave: true,
        "order": []
      })
      // tambah opname

      


      // tambah barang keluar

   

      // hapus barang keluar

      // tambah santri
      $('#formtambahsantri').submit(function(e) {
        e.preventDefault();
        $("#btn-santri").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
        var formdata = new FormData(this);
        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/santri/tambahsantri') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Tambah Data',
              text: 'Anda Berhasil Menambahkan Data',
              showConfirmButton: true,
              timer: 1500
            });
            $('#tambahdatasantrishow').modal('hide');

            $('#datasantri').DataTable().ajax.reload();
            window.location.replace('santri');
          },
          error: function() {
            swal.fire("Gagal Menyimpan", "Ada Kesalahan Saat Menyimpan!", "error");
          }


        })
        return false;
      });


      // fungsi untuk edit data
      //pilih selector dari table id datauser dengan class .ubah-user
      $('#datasantri').on('click', '.ubah-santri', function() {
        // ambil element id pada saat klik ubah
        var id = $(this).data('id');

        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/santri/editsantri') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: {
            id: id
          },
          success: function(data) {
            swal.close();
            $('#editshow').modal('show');
            $('#edit').html(data);

            // proses untuk mengubah data
            $('#formteditsantri').submit(function(e) {
              e.preventDefault();
              $("#btn-santri").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
              var formdata = new FormData(this);

              $.ajax({
                url: "<?= base_url('index.php/santri/ubahsantri') ?>",
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })
                },

                success: function(data) {
                  datasantri.ajax.reload(null, false);
                  swal({
                    type: 'success',
                    title: 'Update Data',
                    text: 'Anda Berhasil Mengubah Data'
                  })
                  // bersihkan form pada modal
                  $('#editshow').modal('hide');
                },
                error: function(data) {
                  swal.fire("Gagal Menyimpan", "Stok Opname Terjadi Kesalahan Input Data", "error");
                }

              })
              return false;
            });
          }
        });
      });
      // fungsi untuk hapus data
      //pilih selector dari table id datauser dengan class .hapus-user
      $('#datasantri').on('click', '.hapus-santri', function() {
        var id = $(this).data('id');
        swal({
          title: 'Konfirmasi',
          text: "Anda ingin menghapus ",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Hapus',
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          cancelButtonText: 'Tidak',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('index.php/santri/hapussantri') ?>",
              method: "post",
              beforeSend: function() {
                swal({
                  title: 'Menunggu',
                  html: 'Memproses data',
                  onOpen: () => {
                    swal.showLoading()
                  }
                })
              },
              data: {
                id: id
              },
              success: function(data) {
                swal(
                  'Hapus',
                  'Berhasil Terhapus',
                  'success'
                )
                datasantri.ajax.reload(null, false)
              }
            })
          } else if (result.dismiss === swal.DismissReason.cancel) {
            swal(
              'Batal',
              'Anda membatalkan penghapusan',
              'error'
            )
          }
        })
      });


      // ubah data buku
      $('#formtambahbuku').submit(function(e) {
        e.preventDefault();
        $("#btn-buku").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
        var formdata = new FormData(this);
        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/buku/tambahbuku') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Tambah Data',
              text: 'Anda Berhasil Menambahkan Data',
              showConfirmButton: true,
              timer: 1500
            });
            $('#tambahdatabukushow').modal('hide');

            $('#databuku').DataTable().ajax.reload();
            window.location.replace('buku');
          },
          error: function() {
            swal.fire("Gagal Menyimpan", "Ada Kesalahan Saat Menyimpan!", "error");
          }


        })
        return false;
      });


      // fungsi untuk edit data
      //pilih selector dari table id datauser dengan class .ubah-user
      $('#databuku').on('click', '.ubah-buku', function() {
        // ambil element id pada saat klik ubah
        var id = $(this).data('id');

        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/buku/editbuku') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: {
            id: id
          },
          success: function(data) {
            swal.close();
            $('#editshow').modal('show');
            $('#edit').html(data);

            // proses untuk mengubah data
            $('#formteditbuku').submit(function(e) {
              e.preventDefault();
              $("#btn-buku").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
              var formdata = new FormData(this);

              $.ajax({
                url: "<?= base_url('index.php/buku/ubahbuku') ?>",
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })
                },

                success: function(data) {
                  datasantri.ajax.reload(null, false);
                  swal({
                    type: 'success',
                    title: 'Update Data',
                    text: 'Anda Berhasil Mengubah Data'
                  })
                  // bersihkan form pada modal
                  $('#editshow').modal('hide');
                  $('#databuku').DataTable().ajax.reload();
        
          
                },
                error: function(data) {
                  swal.fire("Gagal Menyimpan", "Stok Opname Terjadi Kesalahan Input Data", "error");
                }

              })
              return false;
            });
          }
        });
      });
      // fungsi untuk hapus data
      //pilih selector dari table id datauser dengan class .hapus-user
      $('#databuku').on('click', '.hapus-buku', function() {
        var id = $(this).data('id');
        swal({
          title: 'Konfirmasi',
          text: "Anda ingin menghapus ",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Hapus',
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          cancelButtonText: 'Tidak',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url('index.php/buku/hapusbuku') ?>",
              method: "post",
              beforeSend: function() {
                swal({
                  title: 'Menunggu',
                  html: 'Memproses data',
                  onOpen: () => {
                    swal.showLoading()
                  }
                })
              },
              data: {
                id: id
              },
              success: function(data) {
                swal(
                  'Hapus',
                  'Berhasil Terhapus',
                  'success'
                )
                databuku.ajax.reload(null, false)
              }
            })
          } else if (result.dismiss === swal.DismissReason.cancel) {
            swal(
              'Batal',
              'Anda membatalkan penghapusan',
              'error'
            )
          }
        })
      });
    });

    
      // tambah santri
      $('#formtambahpinjam').submit(function(e) {
        e.preventDefault();
        $("#btn-pinjam").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
        var formdata = new FormData(this);
        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/pinjam/tambahpinjam') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Tambah Data',
              text: 'Anda Berhasil Menambahkan Data',
              showConfirmButton: true,
              timer: 1500
            });
            $('#tambahdatapinjamshow').modal('hide');

            $('#datapinjam').DataTable().ajax.reload();
            window.location.replace('pinjam');
          },
          error: function() {
            swal.fire("Gagal Menyimpan", "Ada Kesalahan Saat Menyimpan!", "error");
          }


        })
        return false;
      });


      $('#datapinjam').on('click', '.pengembalian-buku', function() {
        // ambil element id pada saat klik ubah
        var id = $(this).data('id');

        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/pinjam/editkembalikan') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: {
            id: id
          },
          success: function(data) {
            swal.close();
            $('#editshow').modal('show');
            $('#edit').html(data);

            // proses untuk mengubah data
            $('#formpengambilan').submit(function(e) {
              e.preventDefault();
              $("#btn-pengambilan").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
              var formdata = new FormData(this);

              $.ajax({
                url: "<?= base_url('index.php/pinjam/pengembalian') ?>",
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })
                },

                data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Data Pengembalian',
              text: 'Anda Berhasil Mengembalikan',
              showConfirmButton: true,
              timer: 1500
            });
            $('#editshow').modal('hide');

            $('#datapinjam').DataTable().ajax.reload();
         
              
                },
                error: function(data) {
                  swal.fire("Gagal Menyimpan", "Stok Opname Terjadi Kesalahan Input Data", "error");
                }

              })
              return false;
            });
          }
        });
      });

      $('#datapinjam').on('click', '.denda-buku', function() {
        // ambil element id pada saat klik ubah
        var id = $(this).data('id');

        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/denda/editdenda') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: {
            id: id
          },
          success: function(data) {
            swal.close();
            $('#editshow').modal('show');
            $('#edit').html(data);

            // proses untuk mengubah data
            $('#formdenda').submit(function(e) {
              e.preventDefault();
              $("#btn-denda").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
              var formdata = new FormData(this);

              $.ajax({
                url: "<?= base_url('index.php/denda/tambahdenda') ?>",
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })
                },

              data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Data Denda',
              text: 'Anda Berhasil Menambahkan Denda',
              showConfirmButton: true,
              timer: 1500
            });
            $('#editshow').modal('hide');

            $('#datapinjam').DataTable().ajax.reload();
         
                },
                error: function(data) {
                  swal.fire("Gagal Menyimpan", "Stok Opname Terjadi Kesalahan Input Data", "error");
                }

              })
              return false;
            });
          }
        });
      });


      $('#datadenda').on('click', '.lunasi-denda', function() {
        // ambil element id pada saat klik ubah
        var id = $(this).data('id');

        $.ajax({
          type: "post",
          url: "<?= base_url('index.php/pinjam/lunasform') ?>",
          beforeSend: function() {
            swal({
              title: 'Menunggu',
              html: 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data: {
            id: id
          },
          success: function(data) {
            swal.close();
            $('#editshow').modal('show');
            $('#edit').html(data);

            // proses untuk mengubah data
            $('#formlunasi').submit(function(e) {
              e.preventDefault();
              $("#btn-lunas").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Saving").attr("disabled", true);
              var formdata = new FormData(this);

              $.ajax({
                url: "<?= base_url('index.php/pinjam/ubahdenda') ?>",
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })
                },

              data: formdata, // ambil datanya dari form yang ada di variabel
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) {
            swal({
              type: 'success',
              title: 'Data Denda',
              text: 'Anda Berhasil Melunasi Denda',
              showConfirmButton: true,
              timer: 1500
            });
            $('#editshow').modal('hide');

            $('#datadenda').DataTable().ajax.reload();
         
                },
                error: function(data) {
                  swal.fire("Gagal Menyimpan", "Stok Opname Terjadi Kesalahan Input Data", "error");
                }

              })
              return false;
            });
          }
        });
      });


  </script>

  <!-- data user -->
