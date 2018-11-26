<html>
<body background=a_delete.jpeg>
<?php
 error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
If(isset($_REQUEST['submit'])!=''){ 
$id = $_POST['id'];
$query="select * from photo_info where photo_id='$id'";

	  $mysqli_result = mysqli_query($conn,$query);
	  $rows=mysqli_fetch_assoc($mysqli_result);
      if(is_null ($rows ))
	  {
		  echo"This photo id does not exists";
	  }
	  else
	  {	  
	  mysqli_autocommit($conn, FALSE);	  
	  $query   = "delete from photo_info where photo_id='$id'";
	  $success1 = $conn->query($query);
	  $query   = "delete from photo_count where photo_id='$id'";
	  $success2 = $conn->query($query);
	  $query   = "delete from photo_add where photo_id='$id'";
	  $success3 = $conn->query($query);
      if (!$success1 or !$success2 or !$success3) {
	   mysqli_rollback($conn);
       die("Couldn't enter data: ".$conn->error);
       }
	   else{
		   echo'<script type ="text/javascript">
		  window.onload=function(){alert("Photograph Successfully Deleted!");
		  }
		  </script>';
		  mysqli_commit($conn);
	   }
}}

?>

<br><br><br>
 <hr style="border: 2px solid #000" />​
<br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" ><center><br><br>
<b><font size=5px face="Georgia">Enter The Photo Id</font></b><br><br>
<input type="text"  name="id" size="25" style="height:30px;font-size:12pt;"><br><br><br>

<input type="submit" value="submit" name="submit" size="25" style="height:30px;font-size:15pt;"/>
<br><br>
</center>
</form>

<hr style="border: 2px solid #000" />​
</body>
</html>