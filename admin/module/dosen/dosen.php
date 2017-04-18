<?php
$aksi="module/dosen/dosen_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA dosen ------------------------- ----->

	<div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Dosen</h4>
				<a class="btn btn-default pull-right" href="?module=dosen&aksi=tambah" data-toggle="tooltip" title="Menambahkan Data dosen">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-1">ID RFID</th>
                  <th class="col-sm-3">Nama</th>
				  <th class="col-sm-3">NIP</th>
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
						<?php 
						// Tampilkan data dari Database
						$sql = "SELECT * FROM tb_dosen";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
						$Kode = $data['id_dosen'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['id_rfiddosen']; ?></td>
								<td><?php echo $data['nm_dosen']; ?></td>
								<td><?php echo $data['nip']; ?></td>
								<td><center>
									<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_dosen'];?>" href="?module=dosen&aksi=edit&id_dosen=<?php echo $data['id_dosen'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
									<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=dosen&aksi=hapus&id_dosen=<?php echo $data['id_dosen'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_dosen'];?> ?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA dosen ------------------------- ----->		  
<?php 
break;
case "edit": 
$data=mysql_query("select * from tb_dosen where id_dosen='$_GET[id_dosen]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA dosen ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=dosen&aksi=edit" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Dosen</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">
				<div class="form-group" hidden >
				<label class="col-sm-4 control-label">ID Dosen</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" readonly name="id_dosen" placeholder="id_dosen" value="<?php echo $edit['id_dosen']; ?>">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">ID RFID Dosen</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="id_rfiddosen" placeholder="ID RFID Dosen" value="<?php echo $edit['id_rfiddosen']; ?>">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">NIP</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" required="required" name="nip" placeholder="nip" value="<?php echo $edit['nip']; ?>"  >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Dosen</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" required="required" name="nm_dosen" placeholder="Nama dosen" value="<?php echo $edit['nm_dosen']; ?>" >
					</div>
				</div><center>  
			<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
			<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
			<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
</form>
<!----- ------------------------- END EDIT DATA dosen ------------------------- ----->	

<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA dosen ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=dosen&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data dosen</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID Dosen</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="id_dosen" placeholder="ID dosen" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">ID RFID Dosen</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="id_rfiddosen" placeholder="ID RFID dosen" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">NIP</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nip" placeholder="NIP" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Dosen</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nm_dosen" placeholder="Nama dosen">
				</div>
				</div>
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA dosen ------------------------- ----->	
</form>
<?php
}
?>
	  
	  
	  
	  

	  
	  
	 


	
