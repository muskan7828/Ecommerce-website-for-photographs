<html>

<body background=lo.jpg>
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include("connect.php");
If(isset($_REQUEST['submit'])!=''){
$name = $_POST['username'] ;
$psw = $_POST['psw'];
$query="select * from users where user_name='$name' and password='$psw'";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
if(is_null ($rows ))
	  {
		  echo'<script type ="text/javascript">
		  window.onload=function(){alert("Invalid username/password");
		  }
		  </script>';
	  }
else
	{
	 $query="select * from users where user_name='admin' and password='admin123'";
     $mysqli_result = mysqli_query($conn,$query);
     $rows=mysqli_fetch_assoc($mysqli_result);    
	 if($rows['user_name']==$name && $rows['password']==$psw)
	 {
		$_SESSION["username"]=$name;
		 header("Location:a_home.php");
	 }
	 else{
		 $_SESSION["username"]=$name;
		 header("Location:category.php");
	  }
	 
	}	 
	  
}
?>





<center>
<h1 style="font-family:Arial Black; color:#154360;"><br>Log In Form</h1>
   
  
</center>

<form name="login" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" align="right">

<strong>
Enter Your Login Details.</strong><br><br>

<link rel="stylesheet" type="text/css" href="theme.css">

   
<label for="username" ><b><font size="5" style="font-family:Arial Black; color:#6E2C00;">Username</font><br></b></label>
 
<input type="text" placeholder="Enter Your Username" name="username" size="15" required><br><br>
 
<label for="psw"><b><font size="5" style="font-family:Arial Black; color:#6E2C00;">Password</font><br></b></label>
 
 <input type="password" placeholder="Enter Password" name="psw" id="psw"required>

  
<label><br>
<input type="checkbox" checked="checked" name="checkbox" style="margin-bottom:15px"><font size="4"> <strong>Keep Me Logged In</strong>
</font> </label>


 <div class="clearfix" >

      <button type="reset" class="cancelbtn">Reset</button>
 

     <button type="submit" class="signupbtn" name="submit">Login</button>
   
   </div>


</form>


</body>

</html>
