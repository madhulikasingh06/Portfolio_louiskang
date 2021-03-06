<?php 
$id_projects= array(); 
$images= array();
?>
<div class="page-contents content-padding">
	<div id="project-container">
		<div class="row">
				
			<!--  Project Browser  -->
			<div class="col-sm-3">
				<div id="project-titles">
					<h4>All Projects</h4>
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

				<!-- Project Carousal -->
			
				<div class="col-sm-9 project-content" >
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
								
								<!-- <div class="owl-carousel owl-theme"> -->
								<div class="carousel js-flickity" data-flickity-options='{ "lazyLoad": true ,"setGallerySize": false,
								"contain": true ,"wrapAround": true}'>
								<?php 

								$sql="SELECT  * FROM  projects_images WHERE project_id = $temp_id;";

								$result= $db->query($sql);

									// echo "total rows : ".$result->num_rows;
								if($result->num_rows > 0){

									while($row = $result->fetch_assoc()) { 
										if ( $row['image_src'] != "") { 

											$url= $row['image_src'] ; ?>

										<!-- array_push($images, $row['image_src']) -->
										 
										 <!-- <div class="project-img item"> -->
										<div class="carousel-cell">
											<img  class="carousel-cell-image"
      											data-flickity-lazyload="<?php echo PROJECT_IMG_LOCATION_N.$url; ?>" alt="">
										</div> 
										  

										<?php 	 	}
									} ?>

 						<?php 	

								}

								?>
								</div>
								<div class="space"></div>
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