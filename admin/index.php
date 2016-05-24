<?php
include "connections/connection.php";?>
<?php 
$message="";

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
                   
                      header("location: admin-actions.php");                                              
                 }
                else{    
                    header("location: index.php?action=1");

                   }       

}
?>


<div id="da-login">
	<div id="da-login-box-wrapper">
    	<div id="da-login-top-shadow">
        </div>
    	<div id="da-login-box">
        	<div id="da-login-box-header">
            	<h3>Login</h3>
            </div>
			<font color="#990000" ><strong ><?php echo $message; ?></strong></font>
            <div id="da-login-box-content">
            	<form id="da-login-form" method="post" action="">
                	<div id="da-login-input-wrapper">
                    	<div class="da-login-input">
	                        <input type="text" name="username" id="da-login-username" placeholder="Username" />
                        </div>
                    	<div class="da-login-input">
	                        <input type="password" name="password" id="da-login-password" placeholder="Password" />
                        </div>
                    </div>
                    <div id="da-login-button">
                    	<input type="submit" value="Login" name="submit" id="da-login-submit" />
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

