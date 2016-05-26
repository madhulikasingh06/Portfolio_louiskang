<?php include_once "header.php" ;?>
<?php 
	
	$id = 0;
	$aw_year = $aw_title = $aw_desc =  "";
	

	if (isset($_GET["id"])) {

			$id = intval($_GET["id"]);
			# code...
	}


	if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['submit']=='Submit'){

		 $temp_id = intval($_POST['id']);
		 $title = $_POST['title'];
		 $desc= $_POST['desc'];
		 $year=intval($_POST['year']);
			
		if ($temp_id > 0) {
			# code...
			 $sql = "UPDATE awards SET year=$year ,aw_title= '$title' ,aw_desc='$desc'
					WHERE ID= $temp_id; ";
			$result= $db->query($sql);
			 "affected_rows".$db->affected_rows;



		}else {

			 $sql = "INSERT INTO awards(year,aw_title,aw_desc) VALUES ($year,'$title','$desc')";
			$result= $db->query($sql);
			 $temp_id = $db->insert_id;;

		}

		echo "Award Added sucessfully." ; ?> <br/><button type="button" class="btn btn-info" 
									onclick="window.location='admin-awards.php'">Go back</button>
		<?php 
	}

	if(isset($_GET['action']) && $_GET['action']=='edit'){

		$sql="SELECT  * FROM  awards WHERE ID = $id;";

		$result= $db->query($sql);
				            
		// echo "total rows : ".$result->num_rows;
		if($result->num_rows > 0){

			  while($row = $result->fetch_assoc()) {
			  	$aw_title = $row['aw_title'];
			  	$aw_desc = $row['aw_desc'];
			  	 $aw_year =  $row['year'];
			  }				                   
		}
	}
?>
	<div class="page-contents content-padding">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-9">
				<div id="add-proj-div" class="">
					
					<form role="form" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						 <div class="form-group">
						    <label for="title">Award year:</label>
						    <input type="text" required class="form-control" id="year" name="year" 
						    		value="<?php echo $aw_year; ?>">
						  </div>
						  
						  <div class="form-group">
							    <label for="desc">Award Title:</label>
								<input type="text" required class="form-control" id="title" name="title" value="<?php echo $aw_title; ?>">

						  </div>
						  
						  <div class="form-group">
							    <label for="proj">Award Description:</label>
								<textarea class="form-control" required  name="desc" id="desc" rows="10" 
								maxlength="500"><?php echo $aw_desc ;?></textarea>

						 </div>

						<div class="form-group">
								<div class="center"><input type="submit" value="Submit" name="submit"  class="btn btn-primary"/>
									<button type="button" class="btn btn-default" 
									onclick="window.location='admin-awards.php'">Cancel</button>

								</div>
						</div>
	
					</form>
				</div>
			</div>
		</div>
	</div>


 <?php include_once "footer.php" ; ?>