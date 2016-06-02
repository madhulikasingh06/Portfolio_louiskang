<?php include_once "includes/header.php" ;?>
<?php 
$id_projects= array(); 
$images= array();
?>
<div class="page-contents content-padding">
	<div id="project-container">
		<div class="row">
			<div class="col-sm-3">
				<div id="project-titles">
					<h5>PROJECTS</h5>
					<ul class="no-list-style">

						<?php 
						$sql="SELECT  * FROM  projects_desc WHERE active=1 ORDER BY ID;";

						$result= $db->query($sql);

				            // echo "total rows : ".$result->num_rows;
						if($result->num_rows > 0){

							while($row = $result->fetch_assoc()) {

								$arrayName = array('id' => $row['ID'],'title' => $row['project_title'],
									'desc' => $row['project_description']);

								array_push($id_projects, $arrayName);
								?>


								<li><a href="#proj-<?php echo trim($row['ID']); ?>"><?php echo $row['project_title'];?></a></li>
								<?php }
									// print_r($id_projects);

								}
							?>
					</div>
				</div>
				<div class="col-sm-9">
					<div id="project-details">

						<!-- code for showing images  -->
						<?php 

						foreach ($id_projects as $index => $project) { 
							# code...
							$temp_id= trim($project['id']); 
							$temp_title = $project['title'];
							$temp_desc = $project['desc'];

							?>

							<div id="proj-<?php echo $temp_id ; ?>">

								<h4><?php echo $temp_title ; ?></h4>
								
								<?php 

								$sql="SELECT  * FROM  projects_images WHERE project_id = $temp_id;";

								$result= $db->query($sql);

									// echo "total rows : ".$result->num_rows;
								if($result->num_rows > 0){

									while($row = $result->fetch_assoc()) { 
										if ( $row['image_src'] != "") {

										$images[$temp_id][$row['ID']] = $row['image_src'];	

										  ?>

										<?php 	 	}
									} 

									

								}?>


								<ul class="no-list-style">

								<?php 
										$projImages = $images[$temp_id];

									// print_r($projImages);
								foreach ($projImages as $index => $url) {
										# code...

										 ?>

										
										
										<li class="thumbs" style="display: inline-flex;">

										<a href="#proj-img-<?php echo $temp_id.'-'.$index; ?>">	<img class="img-thumbnail img-responsive" 
											src="<?php echo PROJECT_IMG_LOCATION_N.$url ; ?>" alt="" >
										</a>
										</li>

									<?php  
									} ?>

							</ul>

							<?php 	$projImages = $images[$temp_id];

							foreach ($projImages as $index => $url) {
										# code... ?>



										<div class="project-img " id="proj-img-<?php echo  $temp_id.'-'.$index; ?>">

											<img class="lazy project-img-padding" 
											data-original="<?php echo PROJECT_IMG_LOCATION_N.$url;  ?>" alt="">
										</div>
				

									<?php  
									}

				

								?>
								<div class="project-title"><?php echo $temp_title ; ?></div>
								<div class="project-description"><?php echo $temp_desc ; ?></div>
							</div>
							<hr COLOR="#000">


							<?php 	}

							?>


						</div>



					</div>
				</div>
			</div>


		</div>

		<?php include_once "includes/footer.php" ; ?>