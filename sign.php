<html>
<body background=sign.jpeg>
<font size=20px face="Garamond" ><center>Signup Form  </center></font>

<br><br>



<?php
error_reporting(E_ERROR | E_PARSE);
include("connect.php");
If(isset($_REQUEST['submit'])!=''){ 

$nameErr =$u_nameErr=$passwordErr=$mailidErr="";

$name=$u_name=$password=$mailid="";

$a=$b=$c=$d=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$a=0;
  } else {
    $name =$_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$a=0;
      $nameErr = "Only letters and white space allowed";
    }
  }}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["u_name"])) {
	  $b=0;
    $u_nameErr = "Name is required";
	
}}

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
	  $c=0;
    $passwordErr = "Name is required";
 }}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["mailid"])) {
	  $d=0;
    $mailidErr = "Name is required";
  }  }  
  
 
if($a && $b && $c && $d)
{

 // Create connection
$name = $conn->real_escape_string($_POST['name']);
$user = $conn->real_escape_string($_POST['u_name']);
$pass = $conn->real_escape_string($_POST['password']);
$email = $conn->real_escape_string($_POST['mailid']);
$query="select * from users where user_name='$user'";
$mysqli_result = mysqli_query($conn,$query);
	  $rows=mysqli_fetch_assoc($mysqli_result);
      if(!is_null ($rows ))
	  {
		  echo"This user name already exists";
	  }
	  else{



$query   = "CALL signup('$name','$user','$pass','$email')";
$success = $conn->query($query);
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
	  }
	  else
	  {
		  echo'<script type ="text/javascript">
		  window.onload=function(){alert("Account Successfully Created!");
		  window.location.href="home.php";
		  }
		  </script>';

	  }
	  
	  }

}
}

?>   



<center>
<form style="font-size:100%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

<b><font size=5px face="Helvetica">Name:</font></b><br><br>
<input type="text" name="name" padding=30px size="25" style="height:30px;font-size:12pt;"><br>
<span class="error"> <br><?php echo $nameErr;?></span>
<br>

<b><font size=5px face="Helvetica">Mail Id:</font></b><br><br>
<input type="email" name="mailid" size="25" style="height:30px;font-size:12pt;"><br>
<br><?php echo $mailidErr;?></span>
<br>

<b><font size=5px face="Helvetica">User Name:</font></b><br><br>
<input type="text" name="u_name" size="25" style="height:30px;font-size:12pt;"><br>
<span class="error"> <br><?php echo $u_nameErr;?></span>
<br>

<b><font size=5px face="Helvetica">Password:</font></b><br><br>
<input type="password" name="password" size="25" style="height:30px;font-size:12pt;"><br>
<span class="error"> <br><?php echo $passwordErr;?></span>
<br>

<input type="submit" value="SUBMIT" name="submit"  size="25" style="height:30px;font-size:15pt;"/><br><br>



</form>
</center>
</body>
</html>