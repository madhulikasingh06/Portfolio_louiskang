<?php include_once "header.php" ;?>
<?php 
	
	$id = 0;
	$project_title = $project_desc = $project_enable = $image_src[] = "";
	 $active= 1;
	

	if (isset($_GET["id"])) {

			$id = intval($_GET["id"]);
			# code...
	}

	if ( isset($_GET['action']) && $_GET['action']=='editP' && isset($_GET['imgId'])) {
		# code...

		$imgID = intval($_GET['imgId']);
		echo $sql = "DELETE FROM projects_images WHERE id=$imgID ;";
        echo $result = $db->query($sql);

	}

	if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['submit']=='Submit'){

		echo $temp_id = intval($_POST['id']);
		echo $title = $_POST['title'];
		echo $desc= $_POST['desc'];
		echo $active = intval($_POST['active']);
			
		if ($temp_id > 0) {
			# code...
			 $sql = "UPDATE projects_desc SET project_title= '$title' ,project_description='$desc',active=$active 
					WHERE ID= $temp_id; ";
			$result= $db->query($sql);
			echo "affected_rows".$db->affected_rows;



		}else {

			echo $sql = "INSERT INTO projects_desc(project_title,project_description,active) VALUES ('$title','$desc',$active)";
			$result= $db->query($sql);
			echo $temp_id = $db->insert_id;;

		}

	 	// upload the files 


			$total = count($_FILES['projFiles']['name']);
			$insertData="";
	 		// Loop through each file
				for($i=0; $i<$total; $i++) {

				  //Get the temp file path
				  $tmpFilePath = $_FILES['projFiles']['tmp_name'][$i];

				  if ($tmpFilePath != ""){
				    //Setup our new file path
				    echo $fileName=$_FILES['projFiles']['name'][$i];
				     $newFilePath = PROJECT_IMG_LOCATION.$fileName;

				     if($insertData!=""){
				     	$insertData = $insertData.",";
				     }

				    //Upload the file into the temp dir
				    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

				      //Handle other code here
				    	$insertData = $insertData."($temp_id,'$fileName')";

				    }
				  }
				}

				echo $insertData;


				echo $sql = "INSERT INTO projects_images(project_id,image_src) VALUES $insertData ;";
				$result= $db->query($sql);
				echo  $db->insert_id;
	}

	if(isset($_GET['action']) && $_GET['action']=='editP'){

		

		$sql="SELECT  * FROM  projects_desc WHERE ID = $id;";

		$result= $db->query($sql);
				            
		// echo "total rows : ".$result->num_rows;
		if($result->num_rows > 0){

			  while($row = $result->fetch_assoc()) {
			  	$project_title = $row['project_title'];
			  	$project_desc = $row['project_description'];
			  	 $project_enable =  $row['active'];
			  }

				                     
				                   
		}

	}


?>



	<div class="page-contents content-padding">
	
		<div class="row">
			<div class="col-sm-10">
				<div id="add-proj-div" class="form-border">
					
					<form role="form" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						 <div class="form-group">
						    <label for="title">Project title:</label>
						    <input type="text" class="form-control" id="title" name="title" value="<?php echo $project_title; ?>">
						  </div>
						  
						  <div class="form-group">
							    <label for="desc">Project Description:</label>
							    <textarea class="form-control" name="desc" id="desc" rows="10" maxlength="1000"><?php echo $project_desc ;?></textarea> 
						  </div>
						  
						  <div class="form-group">
							    <label for="proj">Project Image:</label>
								<input type="file" class="" name="projFiles[]" id="projFiles" multiple >
									<br />
									<div id="selectedFiles"></div>
								</input>

						 </div>

						 <div class="form-group">
						 	<label for="active"></label>
						 	<select name="active" id="active" class="form-control">
						 		<option value="1" <?php if($active===1) echo 'selected'; ?>>Show</option>
						 		<option value="0" <?php if($active==0) echo 'selected'; ?>>Hide</option>

						 	</select>
						 </div>
						<div class="form-group">
								<div class="center"><input type="submit" value="Submit" name="submit"  class="btn btn-primary"/>
									<button type="button" class="btn btn-default" onclick="window.location='add-projects.php'">Cancel</button>

								</div>
						</div>
	
					</form>
				</div>
			</div>
		</div>

		
			<div class="form-border">
			
			<?php 

			$sql="SELECT  * FROM  projects_images WHERE project_id = $id;";
		
				$result= $db->query($sql);
						            
				// echo "total rows : ".$result->num_rows;
					if($result->num_rows > 0){
					 
					 while($row = $result->fetch_assoc()) { 
					 	if ( $row['image_src'] != "") { ?>

					 	<div class="row">
						
						<div class="col-sm-2"><?php echo $row['image_src']; ?><br /><br/> <a  class="btn btn-danger" role="button" href="?action=editP&amp;id=<?php echo $id; ?>&amp;imgId=<?php echo $row['ID']; ?>">Delete</a> </div>

						<div class="col-sm-10">
								
								<div class="project-img"><img src="<?php echo PROJECT_IMG_LOCATION.$row['image_src']; ?>" alt=""></div>

							</div>
						</div>
								<div class="space"></div>
					  	

	


				<?php 	}
					  }					                   
					}



			 ?>

			</div>
	
	</div>


 <?php include_once "footer.php" ; ?>

   <script>
    var selDiv = "";
        
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#projFiles').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
        
    function handleFileSelect(e) {
        
        if(!e.target.files) return;
        
        selDiv.innerHTML = "";
        
        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
            var f = files[i];
            
            selDiv.innerHTML += f.name + "<br/>";

        }
        
    }
    </script>add-edit-projects.php