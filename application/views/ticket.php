<div class="container-fluid">
	
	<div class="col-md-6 col-md-offset-3">
		
	<div class="panel panel-default">
	    <div class="panel-body">
	        <form class="form-horizontal col-md-11" method="POST" action="<?php echo site_url('api/post_ticket') ; ?> ">
			    <fieldset>
			        <legend>Register</legend>
			        <div class="form-group">
			            <label class="col-md-3 control-label">MAC</label>
			            <div class="col-md-9">
			                <?php echo $this->session->userdata('mac'); ?>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-md-3 control-label">Nama Lengkap</label>
			            <div class="col-md-9">
			                <?php echo $this->session->userdata('nama') ?>
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputPassword" class="col-md-3 control-label">Stasiun Asal</label>
			            <div class="col-md-9">
			            	<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('uid') ?>  ">
			                <select name="stasiun_asal" class="form-control stasiun" id="stasiunAsal"></select>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-md-3 control-label">Stasiun Tujuan</label>
			            <div class="col-md-9">
			                <select name="stasiun_tujuan" class="form-control stasiun" id="stasiunTujuan"></select>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-md-3 control-label">Tanggal Keberangkatan</label>
			            <div class="col-md-9">
			                <input type="date" class="form-control" name="tanggal_keberangkatan" id="inputNoHP" placeholder="Nomor HP">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-md-3 control-label">Waktu Keberangkatan</label>
			            <div class="col-md-9">
			                <select name="waktu_keberangkatan" class="form-control" id="waktuBerangkat"></select>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-md-3 control-label">Harga</label>
			            <input type="hidden" id="valHargaTiket" name="harga_tiket" value="">
			            <div class="col-md-9">
			                Rp. <strong id="hargaTiket"></strong>
			            </div>
			        </div>
			        <div class="form-group">
			            <div class="col-md-6 col-md-offset-6 ">
			                <button type="reset" class="btn btn-default">Reset</button>
			                <button type="submit" class="btn btn-material-red pull-right">PESAN</button>
			            </div>
			        </div>
			    </fieldset>
			</form>
	    </div>
	</div>
	</div>


</div>
