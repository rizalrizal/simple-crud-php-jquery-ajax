<?php 
include '../koneksi.php';

if($_GET['action'] == "table_data"){
	$query = $mysqli->query("SELECT * FROM tbl_mahasiswa");
	$jumlah = $query->num_rows;
	$data = array();
	$no = 1;
	while($r = $query->fetch_array()){
	   $id = $r['id'];
	   $row = array();
	   $row[] = $no;
	   $row[] = $r['nim'];
	   $row[] = $r['nama'];
	   $row[] = $r['jk'];
	   $row[] = $r['alamat'];
	   $row[] = $r['jurusan'];
	   $row[] = '<div class="text-center">
	   			   <a style="color:#fff;" class="btn btn-primary" onclick="form_edit('.$id.')">Ubah</a>
	   			   <a style="color:#fff;" class="btn btn-danger" onclick="delete_data('.$id.')">Hapus</a>
	   			 </div>';
	   $data[] = $row;
	   $no++;
	}
		
	$output = array("draw"=>1,"recordsTotal"=>$jumlah,"recordsFiltered"=>$jumlah,"data" => $data);
	echo json_encode($output);
}

elseif($_GET['action'] == "form_data"){
   $query = $mysqli->query( "SELECT * FROM tbl_mahasiswa WHERE id='$_GET[id]'");
   $data  = $query->fetch_array();	
   echo json_encode($data);
}

elseif($_GET['action'] == "insert"){
  
   $result = $mysqli->query("INSERT INTO tbl_mahasiswa SET
      nim     = '$_POST[nim]',
      nama    = '$_POST[nama]',
      jk      = '$_POST[jk]',
      alamat  = '$_POST[alamat]',
      jurusan = '$_POST[jurusan]'");	
}

elseif($_GET['action'] == "update"){

 	$result = $mysqli->query("UPDATE tbl_mahasiswa SET
      nim     = '$_POST[nim]',
      nama    = '$_POST[nama]',
      jk      = '$_POST[jk]',
      alamat  = '$_POST[alamat]',
      jurusan = '$_POST[jurusan]'
      WHERE id ='$_POST[id]'");  
 
}

elseif($_GET['action'] == "delete"){
   $result = $mysqli->query("DELETE FROM tbl_mahasiswa WHERE id='$_GET[id]'");
}
 ?>



 