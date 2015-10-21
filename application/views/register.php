<div class="container-fluid">
	
	<div class="col-md-6 col-md-offset-3">
		
	<div class="panel panel-default">
	    <div class="panel-body">
	        <form class="form-horizontal col-md-11" method="POST" action="<?php echo site_url('api/post_register') ; ?> ">
			    <fieldset>
			        <legend>Register</legend>
			        <div class="form-group">
			            <label for="inputEmail" class="col-md-3 control-label">Email</label>
			            <div class="col-md-9">
			                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputPassword" class="col-md-3 control-label">Password</label>
			            <div class="col-md-7">
			                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
			            </div>
			            <div class="col-md-2">
			            	<a class="btn btn-default btn-xs" onmousedown="showpw(1)" onmouseup="showpw(0)">View</a>
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputName" class="col-md-3 control-label">Nama Lengkap</label>
			            <div class="col-md-9">
			                <input type="text" class="form-control" name="nama" id="inputName" placeholder="Nama Lengkap">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputNoHP" class="col-md-3 control-label">No. HP</label>
			            <div class="col-md-9">
			                <input type="text" class="form-control" name="nohp" id="inputNoHP" placeholder="Nomor HP">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputID" class="col-md-3 control-label">No. Identitas</label>
			            <div class="col-md-9">
			                <input type="text" class="form-control" name="identitas" id="inputID" placeholder="KTP / SIM / PASPOR">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputMAC" class="col-md-3 control-label">MAC Address</label>
			            <div class="col-md-9">
			                <input type="text" class="form-control" name="mac" id="inputMAC" placeholder="MAC">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="address" class="col-md-3 control-label">Alamat</label>
			            <div class="col-md-9">
			                <textarea class="form-control"  name="alamat" rows="3" id="address"></textarea>
			            </div>
			        </div>
			        <div class="form-group">
			            <div class="col-md-6 col-md-offset-6 ">
			                <button type="reset" class="btn btn-default">Reset</button>
			                <button type="submit" class="btn btn-material-red pull-right">Register</button>
			            </div>
			        </div>
			    </fieldset>
			</form>
	    </div>
	</div>
	</div>


</div>
