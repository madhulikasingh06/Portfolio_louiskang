<?php include_once "header.php" ;?>
<?php 
	$msg = "";

if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['submit']=='Submit'){
		$pwd = $_POST['password']; 
		$username = $_SESSION['username'];
			$sql = "UPDATE admin SET password= '$pwd ' WHERE username LIKE '$username%'; ";
			$result= $db->query($sql);
			echo "affected_rows".$db->affected_rows;

	}


 ?>
	<div class="page-contents content-padding">
			
			<div class="row">
				<div class="col-sm-6">
					
					<h5>Please enter new password</h5>
					<form action="" class="has-validation-callback" id="change-pwd-form " method="POST">
						<input type="hidden" name="id" >
						<div class="row form-group">
							<div class="col-sm-6 ">
								<input type='password' name="password_confirmation" id="password"  class="form-control"
									maxlength="15" placeholder="Password" data-validation="required length"
									data-validation-length="min6"
									data-validation-error-msg="Passwords should be atleast 6 characters" />
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-6">
                            <input type='password' id="password_confirm"  class="form-control" name="password" 			maxlength="15" placeholder="Password (Confirm)" data-validation="confirmation"
									data-validation-error-msg="Passwords didn't match" />
							</div>
						</div>
			

								<div class=" row form-group">
							<div class="col-sm-6"><input type="submit" value="Submit" name="submit"  class="btn btn-primary"/>
						</div>
						</div>

					</form>
				</div>
			</div>
			
	</div>
 <?php include_once "footer.php" ; ?>