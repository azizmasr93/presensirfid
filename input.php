<form class="form-horizontal" action="add.php" role="form" method="post">    
	<div class="box box-solid box-primary">
			<div class="box-body">	
				<div class="form-group">
				<label class="col-sm-4 control-label">ID</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="ID" placeholder="ID" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Kode </label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="kd_makul" placeholder="kode makul" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Kelas</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="kelas" placeholder="kelas" >
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Hari</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="hari" placeholder="Hari">
				</div>
				</div>
                                <div class="form-group">
				<label class="col-sm-4 control-label">waktu</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" required="required" name="waktu" placeholder="waktu">
				</div>
				</div>
				<center>  
				<button type="submit" href ="input.php" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				
				<a href="javascript:history.back()" class="btn btn-info pull-left"><i class="fa fa-backward"></i> Kembali</a>			
			</div>
	 </div> 
</form>