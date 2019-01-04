<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Crud Jquery</title>
  </head>
  <body>
    
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-6">
        <h1>Data Mahasiswa</h1>
      </div>  
      <div class="col-6">
        <button type="button" class="btn btn-primary float-right" onclick="form_add()">Tambah Data</button>
      </div>  
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">JK</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- List Data Menggunakan DataTable -->              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>

  <!-- START Modal Form -->

  <div class="modal fade" id="modalmhs" tabindex="-1" role="dialog" aria-labelledby="modalmhs" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                  <form onsubmit="return save_data()">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="Nim">Nim</label>
                          <input type="text" class="form-control" name="nim" id="nim">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="JK">JK</label>
                          
                          <select name="jk" id="jk" class="form-control">
                            <option value="L">L</option>
                            <option value="P">P</option>
                          </select>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="Nama">Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Jurusan">Jurusan</label>
                          <select name="jurusan" id="jurusan" class="form-control">
                            <option value="Informatika">Informatika</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Arsitektur">Arsitektur</option>
                          </select>
                        </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Alamat">Alamat</label>
                            <textarea class="form-control" rows="5" name="alamat" id="alamat"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <div class="mr-auto">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 

                      </div>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>

  <!-- END Modal Form -->

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
      //Tempat Proses Jquery Ajax
      
      var save_method, table,pesan;
      //Menerapkan plugin datatables
      $(function(){
         table = $('.table').DataTable( {
                "processing": true,
                "ajax": "ajax/ajax_mahasiswa.php?action=table_data"
            } );
         });

      function form_add(){
         save_method = "add";
         $('#modalmhs').modal('show');
         $('#modalmhs form')[0].reset();
         $('.modal-title').text('Tambah Mahasiswa');
      }

      function form_edit(id){
           save_method = "edit";
           $.ajax({
              url : "ajax/ajax_mahasiswa.php?action=form_data&id="+id,
              type : "GET",
              dataType : "JSON",
              success : function(data){
                 $('#modalmhs').modal('show');
                 $('.modal-title').text('Ubah Mahasiswa');
              
                 $('#id').val(data.id);
                 $('#nim').val(data.nim);
                 $('#nama').val(data.nama);
                 $('#jk').val(data.jk);
                 $('#alamat').val(data.alamat);
                 $('#jurusan').val(data.jurusan);
              },
              error : function(){
                 alert("Tidak dapat menampilkan data!");
              }
           });
      }

      function save_data(){
         if(save_method == "add"){
            url = "ajax/ajax_mahasiswa.php?action=insert";
            pesan = "Berhasil Disimpan";
         }else{ 
            url = "ajax/ajax_mahasiswa.php?action=update";
            pesan= "Berhasil Diubah";
         }

         $.ajax({
            url : url,
            type : "POST",
            data : $('#modalmhs form').serialize(),
            success : function(){
               $('#modalmhs').modal('hide');
               $('#modalmhs form')[0].reset();
               alert(pesan);
               table.ajax.reload();         
            },
            error : function(){
               alert("Tidak dapat menyimpan data!");
            }     
         });
         return false;
      }

      function delete_data(id){
         if(confirm("Apakah yakin data akan dihapus?")){
            $.ajax({
               url : "ajax/ajax_mahasiswa.php?action=delete&id="+id,
               type : "GET",
               success : function(data){
                  alert("Data Berhasil Dihapus")
                  table.ajax.reload();
               },
               error : function(){
                  alert("Tidak dapat menghapus data!");
               }
            });
         }
      }

</script>




</body>
</html>