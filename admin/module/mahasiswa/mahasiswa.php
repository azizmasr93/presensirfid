<?php
$aksi="module/mahasiswa/mahasiswa_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA MAHASISWA ------------------------- ----->

	<div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Mahasiswa</h4>
				<a class="btn btn-default pull-right" href="?module=mahasiswa&aksi=tambah" data-toggle="tooltip" title="Menambahkan Data Mahasiswa">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
                  <th class="col-sm-3">ID RFID</th>
                  <th class="col-sm-3">Nama</th>
				  <th class="col-sm-3">NIM</th>
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
						<?php 
						// Tampilkan data dari Database
						$sql = "SELECT * FROM tb_mhs";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
						$Kode = $data['id_mhs'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['id_rfidmhs']; ?></td>
								<td><?php echo $data['nm_mhs']; ?></td>
								<td><?php echo $data['nim']; ?></td>
								<td><center>
									<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_mhs'];?>" href="?module=mahasiswa&aksi=edit&id_mhs=<?php echo $data['id_mhs'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
									<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=mahasiswa&aksi=hapus&id_mhs=<?php echo $data['id_mhs'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_mhs'];?> ?')"> <i class="glyphicon glyphicon-trash"></i></a>
									</center>
								</td>
							</tr>
						<?php 
							$no++;
						} 
						?>
			   </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
<!----- ------------------------- END TAMPIL DATA MAHASISWA ------------------------- ----->		  
<?php 
break;
case "edit": 
$data=mysql_query("select * from tb_mhs where id_mhs='$_GET[id_mhs]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA MAHASISWA ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=mahasiswa&aksi=edit" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Mahasiswa</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">
			<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID Mahasiswa</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="id_mhs" placeholder="ID Mahasiswa" value="<?php echo $edit['id_mhs']; ?>" readonly>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">ID RFID Mahasiswa</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="id_rfidmhs" placeholder="ID RFID Mahasiswa" value="<?php echo $edit['id_rfidmhs']; ?>">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">NIM</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" required="required" name="nim" placeholder="NIM" value="<?php echo $edit['nim']; ?>"  >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Mahasiswa</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" required="required" name="nm_mhs" placeholder="Nama Mahasiswa" value="<?php echo $edit['nm_mhs']; ?>" >
					</div>
				</div><center>  
			<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
			<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
			<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
</form>
<!----- ------------------------- END EDIT DATA MAHASISWA ------------------------- ----->	

<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA MAHASISWA ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=mahasiswa&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Mahasiswa</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID MAHASISWA</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control"  name="id_mhs" placeholder="ID Mahasiswa" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">ID RFID MAHASISWA</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="id_rfidmhs" placeholder="ID RFID Mahasiswa" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">NIM</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nim" placeholder="NIM" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Mahasiswa</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nm_mhs" placeholder="Nama Mahasiswa">
				</div>
				</div>
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA MAHASISWA ------------------------- ----->	
</form>
<?php
}
?>
	  
	  
	  
	  

	  
	  
	 


	
