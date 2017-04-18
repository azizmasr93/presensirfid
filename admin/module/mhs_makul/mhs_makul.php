<?php
$aksi="module/mhs_makul/mhs_makul_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA MHS MAKUL ------------------------- ----->

	<div class="row">
		<div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Mahasiswa Mata Kuliah</h4>
				<a class="btn btn-default pull-right" href="?module=mhs_makul&aksi=tambah" data-toggle="tooltip" title="Menambahkan Mahasiswa Mata Kuliah">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-2"> Mata Kuliah</th>
				   <th class="col-sm-2">NIM</th>
                  <th class="col-sm-2">Nama Mahasiswa</th>               
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
					<?php 
						$sql = "SELECT tb_mhsmakul.id_mhsmakul,tb_mhsmakul.kd_makul, tb_makul.nm_makul, tb_mhs.nim, tb_mhs.nm_mhs FROM tb_mhsmakul JOIN tb_makul ON tb_mhsmakul.kd_makul = tb_makul.kd_makul JOIN tb_mhs ON tb_mhsmakul.id_mhs=tb_mhs.id_mhs";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
					
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nm_makul']; ?></td>
							<td><?php echo $data['nim']; ?></td>		
							<td><?php echo $data['nm_mhs']; ?></td>				
							<td>
								<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_mhs'];?> di <?php echo $data['nm_makul'];?>" href="?module=mhs_makul&aksi=edit&id_mhsmakul=<?php echo $data['id_mhsmakul'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
								<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=mhs_makul&aksi=hapus&id_mhsmakul=<?php echo $data['id_mhsmakul'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_mhs'];?> di Mata Kuliah <?php echo $data['nm_makul'];?>?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA MHS MAKUL ------------------------- ----->
<?php 
break;
case "edit": 
$data=mysql_query("SELECT tb_mhsmakul.id_mhsmakul,tb_mhsmakul.id_mhs, tb_mhsmakul.kd_makul, tb_makul.nm_makul, tb_mhs.nm_mhs FROM tb_mhsmakul JOIN tb_makul ON tb_mhsmakul.kd_makul = tb_makul.kd_makul JOIN tb_mhs ON tb_mhsmakul.id_mhs=tb_mhs.id_mhs where id_mhsmakul='$_GET[id_mhsmakul]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA MHS MAKUL ------------------------- ----->
	<form class="form-horizontal" action="<?php echo $aksi?>?module=mhs_makul&aksi=edit" role="form" method="post">    
		<div class="box box-solid box-primary">
			<div class="box-header">
			<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Mata Kuliah</h4>
				<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
				<i class="fa fa-minus"></i></a>
			</div>	
				<div class="box-body">
					<div class="form-group" hidden>
					<label class="col-sm-4 control-label">ID</label>
						<div class="col-sm-5">
						  <input type="text" class="form-control" name="id_mhsmakul" placeholder="Mahasiswa Makul" value="<?php echo $edit['id_mhsmakul']; ?>"  >
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Nama Mata Kuliah</label>
						<div class="col-sm-5">
							  <select class="form-control" name="kd_makul">
									<option>-- Pilih Mata Kuliah --</option>
										<?php $qMe = "SELECT * FROM tb_makul"; // 
										$qM = mysql_query($qMe); //
										while ($rowM = mysql_fetch_object($qM)){
											if  ($rowM -> kd_makul == $edit['kd_makul']) {?>
										<option value="<?php echo $rowM -> kd_makul?>" selected > <?php echo $rowM -> nm_makul ?></option>
									<?php 	}else{ ?>
										<option value="<?php echo $rowM -> kd_makul?>"> <?php echo $rowM -> nm_makul ?></option>
									<?php }
										}?>
							  </select>
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Nama Mahasiswa</label>
						<div class="col-sm-5">
							  <select class="form-control" name="id_mhs">
									<option>-- Pilih Mahasiswa --</option>
										<?php $qMe = "SELECT * FROM tb_mhs"; // 
										$qM = mysql_query($qMe); //
										while ($rowM = mysql_fetch_object($qM)){
											if  ($rowM -> id_mhs == $edit['id_mhs']) {?>
										<option value="<?php echo $rowM -> id_mhs?>" selected > <?php echo $rowM -> nm_mhs ?></option>
									<?php 	}else{ ?>
										<option value="<?php echo $rowM -> id_mhs?>"> <?php echo $rowM -> nm_mhs ?></option>
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
<!----- ------------------------- END EDIT DATA MHS MAKUL ------------------------- ----->	
<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA MHS MAKUL ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=mhs_makul&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Mata Kuliah</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID MHS MAKUL</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="id_mhsmakul" placeholder="ID MHS MAKUL" >
				</div>
				</div>		
				
				<div class="form-group">
				<label class="col-sm-4 control-label">Mata Kuliah</label>
				<div class="col-sm-5">
				   <select class="form-control" name="kd_makul">
									<option>Pilih Mata Kuliah</option>
									<?php $qMe = "SELECT * FROM tb_makul"; // 
									$qM = mysql_query($qMe); //
									while ($rowM = mysql_fetch_object($qM)) {?>	
										<option value="<?php echo $rowM -> kd_makul?>" > <?php echo $rowM -> nm_makul ?> </option>
									<?php } ?>
					</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Mahasiswa</label>
				<div class="col-sm-5">
				   <select class="form-control" name="id_mhs">
									<option>Pilih Mahasiswa</option>
									<?php $qMe = "SELECT * FROM tb_mhs"; // 
									$qM = mysql_query($qMe); //
									while ($rowM = mysql_fetch_object($qM)) {?>
										<option value="<?php echo $rowM -> id_mhs?>" > <?php echo $rowM -> nm_mhs ?> </option>
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
<!----- ------------------------- END TAMBAH DATA MHS MAKUL ------------------------- ----->	
</form>
<?php
}
?>	