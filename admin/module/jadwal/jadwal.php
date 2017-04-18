<?php
$aksi="module/jadwal/jadwal_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA jadwal ------------------------- ----->

	<div class="row">
		<div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Jadwal</h4>
				<a class="btn btn-default pull-right" href="?module=jadwal&aksi=tambah" data-toggle="tooltip" title="Menambahkan jadwal">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-1">Hari</th>
                  <th class="col-sm-1">Waktu</th>
				  <th class="col-sm-1">Kelas</th>
				  <th class="col-sm-2">Kode Mata Kuliah</th>
				  <th class="col-sm-2">Mata Kuliah</th>
				  <th class="col-sm-3">Dosen</th>
				  <th class="col-sm-1">Aksi</th>
				  
                </tr>
                </thead>
			    <tbody>
					<?php 
						$sql = "SELECT tb_jadwal.id_jadwal, tb_jadwal.hari,tb_jadwal.waktu,tb_kelas.nm_kelas, tb_jadwal.id_kelas, tb_makul.kd_makul, tb_makul.nm_makul, tb_dosen.nm_dosen 
						from tb_jadwal join tb_makul on tb_jadwal.kd_makul = tb_makul.kd_makul 
						join tb_dosen on tb_makul.id_dosen = tb_dosen.id_dosen 
						join tb_kelas on tb_jadwal.id_kelas = tb_kelas.id_kelas";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
					
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['hari']; ?></td>
							<td><?php echo $data['waktu']; ?></td>
							<td><?php echo $data['nm_kelas']; ?></td>
							<td><?php echo $data['kd_makul']; ?></td>
							<td><?php echo $data['nm_makul']; ?></td>				
							<td><?php echo $data['nm_dosen']; ?></td>
							<td>
								<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_makul'];?>" href="?module=jadwal&aksi=edit&id_jadwal=<?php echo $data['id_jadwal'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
								<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=jadwal&aksi=hapus&id_jadwal=<?php echo $data['id_jadwal'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_makul'];?> di hari <?php echo $data['hari'];?> jam <?php echo $data['waktu'];?>?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA jadwal ------------------------- ----->
<?php 
break;
case "edit": 
$data=mysql_query("SELECT tb_jadwal.id_jadwal, tb_jadwal.hari,tb_jadwal.waktu,tb_kelas.nm_kelas, tb_jadwal.id_kelas, tb_makul.kd_makul, tb_makul.nm_makul, tb_dosen.nm_dosen 
						from tb_jadwal join tb_makul on tb_jadwal.kd_makul = tb_makul.kd_makul 
						join tb_dosen on tb_makul.id_dosen = tb_dosen.id_dosen 
						join tb_kelas on tb_jadwal.id_kelas = tb_kelas.id_kelas where id_jadwal='$_GET[id_jadwal]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA jadwal ------------------------- ----->
	<form class="form-horizontal" action="<?php echo $aksi?>?module=jadwal&aksi=edit" role="form" method="post">    
		<div class="box box-solid box-primary">
			<div class="box-header">
			<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data Jadwal Mata Kuliah</h4>
				<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
				<i class="fa fa-minus"></i></a>
			</div>	
				<div class="box-body">
					<div class="form-group" hidden>
					<label class="col-sm-4 control-label">ID jadwal</label>
						<div class="col-sm-5">
						  <input type="text" class="form-control" readonly name="id_jadwal" placeholder="id_jadwal" value="<?php echo $edit['id_jadwal']; ?>">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Hari</label>
						<div class="col-sm-5">
							<select class="form-control" name="hari" required="required" >
									<option><?php echo $edit['hari']; ?> </option>
									<option>-- Pilih hari --</option>
									<option value = "Senin"> Senin</option>
									<option value = "Selasa"> Selasa</option>
									<option value = "Rabu"> Rabu</option>
									<option value = "Kamis"> Kamis</option>
									<option value = "Jumat"> Jumat</option>	
							</select>	
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Waktu</label>
						<div class="col-sm-5">
						  <input type="time" class="form-control" name="waktu" placeholder="Waktu" value="<?php echo $edit['waktu']; ?>"  >
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label">Nama Kelas</label>
						<div class="col-sm-5">
							  <select class="form-control" name="id_kelas">
									<option>-- Pilih Mata Kuliah --</option>
										<?php $qMe = "SELECT * FROM tb_kelas"; // 
										$qM = mysql_query($qMe); //
										while ($rowM = mysql_fetch_object($qM)){
											if  ($rowM -> id_kelas == $edit['id_kelas']) {?>
										<option value="<?php echo $rowM -> id_kelas?>" selected > <?php echo $rowM -> nm_kelas ?></option>
									<?php 	}else{ ?>
										<option value="<?php echo $rowM -> id_kelas?>"> <?php echo $rowM -> nm_kelas ?></option>
									<?php }
										}?>
							  </select>
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
					<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
				</div>
		 </div> 
	</form>
<!----- ------------------------- END EDIT DATA jadwal ------------------------- ----->	
<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA jadwal ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=jadwal&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Mata Kuliah</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID jadwal</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="id_jadwal" placeholder="ID jadwal" >
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Hari</label>
						<div class="col-sm-5">
							  <select class="form-control" name="hari" required="required">
									<option>-- Pilih Hari --</option>
										<option value = "Senin">Senin</option>
										<option value = "Selasa">Selasa</option>
										<option value = "Rabu">Rabu</option>
										<option value = "Kamis">Kamis</option>
										<option value = "Jumat">Jumat</option>		
							</select>	
						</div>
					</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Waktu</label>
				<div class="col-sm-5">
				  <input type="time" class="form-control" required="required" name="waktu" placeholder="waktu">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Kelas</label>
				<div class="col-sm-5">
				   <select class="form-control" name="id_kelas">
									<option>Pilih Mata Kuliah</option>
									<?php $qMe = "SELECT * FROM tb_kelas"; // 
									$qM = mysql_query($qMe); //
									while ($rowM = mysql_fetch_object($qM)) {?>	
										<option value="<?php echo $rowM -> id_kelas?>" > <?php echo $rowM -> nm_kelas ?> </option>
									<?php } ?>
					</select>
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
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA jadwal ------------------------- ----->	
</form>
<?php
}
?>	