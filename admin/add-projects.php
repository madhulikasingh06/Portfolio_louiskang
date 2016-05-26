<?php include_once "header.php" ;?>

	<div class="page-contents content-padding">
	
<!-- 		<div class="row">
			<div class="col-sm-10">
				<button class="btn btn-info">Add A Project</button>	
				<div class="space"></div>

			</div>
		</div> -->
		<div class="space"></div>
		<div class="row">
			<div class="col-sm-8">
				<div id="all-projects">
				<h4>Please click on a Project to edit</h4>
					<ul class="no-list-style">
						
						<?php

							$sql="SELECT  * FROM  projects_desc;";

				            $result= $db->query($sql);
				            
				            // echo "total rows : ".$result->num_rows;
				                if($result->num_rows > 0){

				                     while($row = $result->fetch_assoc()) { ?>
				                         
				                         <li><a href="add-edit-projects.php?action=editP&amp;id=<?php echo $row['ID'];?>"><?php echo $row['project_title'];?></a></li>
				                     <?php }
				                   
				                 }






						?>


						
					</ul>
				</div>
			</div>
		</div>
		
			


		
	

		
	</div>


 <?php include_once "footer.php" ; ?>

  