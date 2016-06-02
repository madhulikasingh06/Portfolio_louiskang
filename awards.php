<?php include_once "includes/header.php" ;?>

	<div class="page-contents">
		<div id="awards" class="content-padding">
			<div class="row">
		<div class="col-sm-12">
			<div id="all-projects">
				<!-- <h4> <i><b>My Awards</b></i></h4> -->
				<ul class="no-list-style">

					<?php

					$sql="SELECT  * FROM  awards ORDER BY year DESC;";

					$result= $db->query($sql);

				            // echo "total rows : ".$result->num_rows;
					if($result->num_rows > 0){

						while($row = $result->fetch_assoc()) { ?>

						<li>
							<div class="row" style="padding:2px;">
								<div class="col-sm-2"><?php echo $row['year'] ; ?> </div>
								<div class="col-sm-10"> <b><?php echo $row['aw_title'];?></b><br />
								<i><?php echo $row['aw_desc'] ; ?></i></div>
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

	</div>
 <?php include_once "includes/footer.php" ; ?>