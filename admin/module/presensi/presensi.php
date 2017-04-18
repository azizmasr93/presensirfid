<?php
$aksi="module/presensi/presensi_aksi.php";

switch($_GET[aksi]){
default:
?> 	
<!----- ------------------------- TAMPIL DATA PRESENSI ------------------------- ----->

	<div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h4 class="box-title">Data Presensi</h4>
				<a class="btn btn-default pull-right" href="?module=presensi&aksi=tambah" data-toggle="tooltip" title="Menambahkan Data">
				<i class="fa  fa-plus"></i> Tambah Data</a>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-sm-1">No</th>
				  <th class="col-sm-2">Kode Mata Kuliah</th>
				  <th class="col-sm-2">Mata Kuliah</th>
				  <th class="col-sm-2">NIM</th>
                  <th class="col-sm-2">Mahasiswa</th>
				  <th class="col-sm-1">Tanggal</th>	
				  <th class="col-sm-1">Waktu</th>
				  <th class="col-sm-1">Aksi</th>
                </tr>
                </thead>
			    <tbody>
						<?php 
						// Tampilkan data dari Database
						$sql = "SELECT tb_presensi.id_presensi,tb_mhs.id_mhs,tb_mhs.nim, tb_presensi.kd_makul,tb_makul.nm_makul, tb_mhs.nm_mhs, tb_presensi.tgl, tb_presensi.waktu from tb_presensi 
								JOIN tb_mhs on tb_mhs.id_mhs = tb_presensi.id_mhs
								JOIN tb_makul on tb_presensi.kd_makul = tb_makul.kd_makul order by waktu desc";
						$tampil = mysql_query($sql);
						$no=1;
						while ($data = mysql_fetch_array($tampil)) { 
						$Kode = $data['id_presensi'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['kd_makul']; ?></td>
								<td><?php echo $data['nm_makul']; ?></td>
								<td><?php echo $data['nim']; ?></td>
								<td><?php echo $data['nm_mhs']; ?></td>
								<td><?php echo $data['tgl']; ?></td>	
								<td><?php echo $data['waktu']; ?></td>
								<td><center>
									<a class="btn btn-xs btn-primary"   data-toggle="tooltip" title="Edit Data <?php echo $data['nm_mhs'];?> di presensi <?php echo $data['nm_makul'];?>" href="?module=presensi&aksi=edit&id_presensi=<?php echo $data['id_presensi'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
									<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=presensi&aksi=hapus&id_presensi=<?php echo $data['id_presensi'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $data['nm_mhs'];?> di Mata kuliah <?php echo $data['nm_makul'];?> pada tanggal <?php echo $data['tgl'];?>?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ------------------------- END TAMPIL DATA PRESENSI ------------------------- ----->		  
<?php 
break;
case "edit": 
$data=mysql_query("SELECT tb_presensi.id_presensi,tb_mhs.id_mhs, tb_presensi.kd_makul,tb_makul.nm_makul, tb_mhs.nm_mhs, tb_presensi.tgl, tb_presensi.waktu from tb_presensi 
								JOIN tb_mhs on tb_mhs.id_mhs = tb_presensi.id_mhs
								JOIN tb_makul on tb_presensi.kd_makul = tb_makul.kd_makul where id_presensi='$_GET[id_presensi]'");
$edit=mysql_fetch_array($data);
?>	
<!----- ------------------------- EDIT DATA PRESENSI ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=presensi&aksi=edit" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h4 class="box-title"> <i class="fa fa-user-md"></i> Edit Data </h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
		<div class="box-body">
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID Presensi</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="id_presensi" value="<?php echo $edit['id_presensi']; ?>"readonly >
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
				<div class="form-group">
				<label class="col-sm-4 control-label">Tanggal</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" name="tgl" placeholder="Tanggal" value="<?php echo $edit['tgl']; ?>">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Waktu</label>
					<div class="col-sm-5">
						<input type="time" class="form-control" name="waktu" placeholder="Waktu" value="<?php echo $edit['waktu']; ?>">
					</div>
				</div>
			<center>  
		<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
		<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
		</div>
	 </div> 
</form>
<!----- ------------------------- END EDIT DATA PRESENSI ------------------------- ----->	
<?php 
break;
case "tambah": 
?>	  
<!----- ------------------------- TAMBAH DATA PRESENSI ------------------------- ----->
<form class="form-horizontal" action="<?php echo $aksi?>?module=presensi&aksi=tambah" role="form" method="post">    
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h4 class="box-title"> <i class="fa fa-user-md"></i> Tambah Data Presensi</h4>
			<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-center: 5px;">
			<i class="fa fa-minus"></i></a>
		</div>	
			<div class="box-body">	
				<div class="form-group" hidden>
				<label class="col-sm-4 control-label">ID Presensi</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="id_presensi" >
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
									<option>Pilih Mata Kuliah</option>
									<?php $qMe = "SELECT * FROM tb_mhs"; // 
									$qM = mysql_query($qMe); //
									while ($rowM = mysql_fetch_object($qM)) {?>	
										<option value="<?php echo $rowM -> id_mhs?>" > <?php echo $rowM -> nm_mhs ?> </option>
									<?php } ?>
					</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Tanggal</label>
				<div class="col-sm-5">
				  <input type="date" class="form-control" required="required" name="tgl" placeholder="Tanggal">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Waktu</label>
				<div class="col-sm-5">
				  <input type="time" class="form-control" required="required" name="waktu" placeholder="waktu">
				</div>
				</div>		
				
				<center>  
				<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button></center>
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
<!----- ------------------------- END TAMBAH DATA Presensi ------------------------- ----->	
</form>
<?php
}

	  
	  
	  
	  

	  
	  
	 


	
