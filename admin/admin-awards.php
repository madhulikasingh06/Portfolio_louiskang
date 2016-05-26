<?php include_once "header.php" ;?>
<?php 
if ( isset($_GET['action']) && $_GET['action']=='del' && isset($_GET['id'])) {
		# code...

		$id = intval($_GET['id']);
		$sql = "DELETE FROM awards WHERE id=$id ;";
        $result = $db->query($sql);

	}

 ?>

<div class="page-contents content-padding">
	
	<div class="row">
		<div class="col-sm-10">
			<a class="btn btn-primary" href="add-edit-awards.php">Add An Award</a>	

		</div>
	</div>

	<div class="space"></div>
	<div class="row">
		<div class="col-sm-12">
			<div id="all-projects">
				<h4> <i><b>Awards</b></i></h4>
				<ul class="no-list-style">

					<?php

					$sql="SELECT  * FROM  awards ORDER BY year DESC;";

					$result= $db->query($sql);

				            // echo "total rows : ".$result->num_rows;
					if($result->num_rows > 0){

						while($row = $result->fetch_assoc()) { ?>

						<li>
							<div class="row" style="padding:5px;">
								<div class="col-sm-2"> <?php echo $row['year'] ; ?> </div>
								<div class="col-sm-3"><a href="add-edit-awards.php?action=edit&amp;id=<?php echo $row['ID'];?>">
									<?php echo $row['aw_title'];?></a></div>
									<div class="col-sm-5"> <?php echo $row['aw_desc'] ; ?> </div>
									<div class="col-sm-2">
										<a class="btn btn-danger" role="button" href="?action=del&amp;id=<?php echo $row['ID'];?>">Delete</a>
										<a class="btn btn-primary" role="button"  href="add-edit-awards.php?action=edit&amp;id=<?php echo $row['ID'];?>">
									Edit</a>


									</div>

								</div>



							</li>
							<?php }

						}
						?>


						
					</ul>
				</div>
			</div>
		</div>
		



		


		
	</div>


	<?php include_once "footer.php" ; ?>

