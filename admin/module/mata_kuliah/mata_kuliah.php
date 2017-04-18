<?php
$aksi="module/mata_kuliah/mata_kuliah_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA MAKUL ------------------------- ----->

	<div class="row">
		<div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Mata Kuliah</h4>
				<a class="btn btn-default pull-right" href="?module=mata_kuliah&aksi=tambah" data-toggle="tooltip" title="Menambahkan Mata Kuliah">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-2">Kode Mata Kuliah</th>
                  <th class="col-sm-2">Nama Mata Kuliah</th>
                  <th class="col-sm-2">Dosen</th>
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
					<?php 
						$sql = "SELECT tb_makul.kd_makul, tb_makul.nm_makul, tb_dosen.nm_dosen FROM tb_makul JOIN tb_dosen on tb_makul.id_dosen = tb_dosen.id_dosen";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
					
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['kd_makul']; ?></td>
							<td><?php echo $data['nm_makul']; ?></td>				
							<td><?php echo $data['nm_dosen']; ?></td>
							
							<td>
								<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_makul'];?>" href="?module=mata_kuliah&aksi=edit&kd_makul=<?php echo $data['kd_makul'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
								<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=mata_kuliah&aksi=hapus&kd_makul=<?php echo $data['kd_makul'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_makul'];?> ?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA MAKUL ------------------------- ----->
<?php 
break;
case "edit": 
$data=mysql_query("SELECT tb_makul.kd_makul, tb_makul.id_dosen, tb_makul.nm_makul, tb_dosen.nm_dosen FROM tb_makul JOIN tb_dosen on tb_makul.id_dosen = tb_dosen.id_dosen where kd_makul='$_GET[kd_makul]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA MAKUL ------------------------- ----->
	<form class="form-horizontal" action="<?php echo $aksi?>?module=mata_kuliah&aksi=edit" role="form" method="post">    
		<div class="box box-solid box-primary">
			<div class="box-header">
			<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Mata Kuliah</h4>
				<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
				<i class="fa fa-minus"></i></a>
			</div>	
				<div class="box-body">
					<div class="form-group">
					<label class="col-sm-4 control-label">Kode Mata Kuliah</label>
						<div class="col-sm-5">
						  <input type="text" class="form-control" name="kd_makul" placeholder="Kode Mata Kuliah" value="<?php echo $edit['kd_makul']; ?>">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Nama Mata Kuliah</label>
						<div class="col-sm-5">
						  <input type="text" class="form-control" name="nm_makul" placeholder="Nama Mata Kuliah" value="<?php echo $edit['nm_makul']; ?>"  >
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Nama Dosen</label>
						<div class="col-sm-5">
							  <select class="form-control" name="id_dosen">
									<option>-- Pilih Dosen --</option>
										<?php $qMe = "SELECT * FROM tb_dosen"; // 
										$qM = mysql_query($qMe); //
										while ($rowM = mysql_fetch_object($qM)){
											if  ($rowM -> id_dosen == $edit['id_dosen']) {?>
										<option value="<?php echo $rowM -> id_dosen?>" selected > <?php echo $rowM -> nm_dosen ?></option>
									<?php 	}else{ ?>
										<option value="<?php echo $rowM -> id_dosen?>"> <?php echo $rowM -> nm_dosen ?></option>
									<?php }
										}?>
							  </select>
						</div>
					</div>
				
					<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
				</div>
		 </div> 
	</form>
<!----- ------------------------- END EDIT DATA MAKUL ------------------------- ----->	
<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA MAKUL ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=mata_kuliah&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Mata Kuliah</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group">
				<label class="col-sm-4 control-label">Kode Mata Kuliah</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="kd_makul" placeholder="Kode Mata Kuliah" >
				</div>
				</div>		
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Mata Kuliah</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="nm_makul" placeholder="Mata Kuliah">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Dosen</label>
				<div class="col-sm-5">
				   <select class="form-control" name="id_dosen">
									<option>Pilih Dosen</option>
									<?php $qMe = "SELECT * FROM tb_dosen"; // 
									$qM = mysql_query($qMe); //
									while ($rowM = mysql_fetch_object($qM)) {?>
										<option value="<?php echo $rowM -> id_dosen?>" > <?php echo $rowM -> nm_dosen ?> </option>
									<?php } ?>
					</select>
				</div>
				</div>
			
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA MAKUL ------------------------- ----->	
</form>
<?php
}
?>	