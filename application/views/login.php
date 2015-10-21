<div class="container-fluid">
	
	<div class="col-md-6 col-md-offset-3">
		
	<div class="panel panel-default">
	    <div class="panel-body">
	        <form class="form-horizontal col-md-11" method="POST" action="<?php echo site_url('api/post_login') ?> ">
			    <fieldset>
			        <legend>Login</legend>
			        <div class="form-group">
			            <label for="inputEmail" class="col-lg-2 control-label" >Email</label>
			            <div class="col-lg-10">
			                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="inputPassword" class="col-lg-2 control-label" >Password</label>
			            <div class="col-lg-10">
			                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
			            </div>
			        </div>
			        
			        <div class="form-group">
			            <div class="col-md-12">
			                <button type="submit" class="btn btn-material-red pull-right">Login</button>
			            </div>
			        </div>
			    </fieldset>
			</form>
	    </div>
	</div>
	</div>


</div>
