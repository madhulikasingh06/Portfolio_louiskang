<?php include_once "header.php" ; ?>
<?php $message="";

if(isset($_GET['action']) && $_GET['action']==1)
{
   $message="Invalid username and password";
}

if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['submit']=='Login'){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT  * FROM  admin where username='$username' and password='$password' ";

    $result= $db->query($sql);

    if($result->num_rows > 0){

       while($row = $result->fetch_assoc()) {
           $_SESSION['loggedIn']=1;
           $_SESSION['username']=$row['username'];
       }

                      // header("location: admin-actions.php");     
       echo "<meta http-equiv='refresh' content='0;add-projects.php'>";
       exit;                                         
   }
   else{    
                    // header("location: index.php?action=1");
       echo "<meta http-equiv='refresh' content='0;index.php?action=1'>";

   }       

}
?>


</body>
</html>

<div id="ogin">
	<div id="row">
       <div id="" class="col-sm-10 " >
           <div id="da-login-box-header">
               <h3>Login</h3>
           </div>
           <font  color="#990000" ><strong ><?php echo $message; ?></strong></font>
           <div id="da-login-box-content">
               <form id="da-login-form" method="post" action="" role="form" >
                   <div id="login-form">
                       <div class="form-group row" >
                           <div class="col-sm-4">
                            <input type="text" name="username" id="da-login-username" required class="form-control"
                            placeholder="Username" />
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="password" name="password" id="da-login-password" required class="form-control"
                            placeholder="Password" />
                        </div>

                    </div>
                </div>
                <div id="da-login-button">
                    <input  class="btn btn-info" type="submit" value="Login" name="submit" id="da-login-submit" />
               </div>
           </form>
       </div>
<!--             <div id="da-login-box-footer">
            	<a href="#">forgot your password?</a>
                <div id="da-login-tape"></div>
            </div> -->
        </div>
        <div id="da-login-bottom-shadow">
        </div>
    </div>
</div>

