<?php
$aksi="module/kelas/kelas_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA KELAS ------------------------- ----->

	<div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Kelas</h4>
				<a class="btn btn-default pull-right" href="?module=kelas&aksi=tambah" data-toggle="tooltip" title="Menambahkan Data Kelas">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-3">Nama Kelas</th>
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
						<?php 
						// Tampilkan data dari Database
						$sql = "SELECT * FROM tb_kelas";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
						$Kode = $data['id_kelas'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['nm_kelas']; ?></td>
								<td><center>
									<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_kelas'];?>" href="?module=kelas&aksi=edit&id_kelas=<?php echo $data['id_kelas'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
									<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=kelas&aksi=hapus&id_kelas=<?php echo $data['id_kelas'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_kelas'];?> ?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA KELAS ------------------------- ----->		  
<?php 
break;
case "edit": 
$data=mysql_query("select * from tb_kelas where id_kelas='$_GET[id_kelas]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA KELAS ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelas&aksi=edit" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Kelas</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">
			<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID Kelas</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="id_kelas" placeholder="ID Kelas" value="<?php echo $edit['id_kelas']; ?>" readonly>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Kelas</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" required="required" name="nm_kelas" placeholder="Nama Kelas" value="<?php echo $edit['nm_kelas']; ?>" >
					</div>
				</div><center>  
			<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
			<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
			<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
</form>
<!----- ------------------------- END EDIT DATA KELAS ------------------------- ----->	

<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA KELAS ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelas&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Kelas</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID KELAS</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control"  name="id_kelas" placeholder="ID Kelas" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Kelas</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nm_kelas" placeholder="Nama Kelas">
				</div>
				</div>
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA KELAS ------------------------- ----->	
</form>
<?php
}
?>
	  
	  
	  
	  

	  
	  
	 


	
