<html>
<body background=insert.jpeg>
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
$name = $_POST['name'] ;
$id = $_POST['id'];
$category = $_POST['category'];
$price = $_POST['price'];
$link = $_POST['link'];

$query="select * from photo_info where photo_id='$id'";

	  $mysqli_result = mysqli_query($conn,$query);
	  $rows=mysqli_fetch_assoc($mysqli_result);
      if(!is_null ($rows ))
	  {
		  echo"This photo id already exists";
	  }
	  else
	  {
      mysqli_autocommit($conn, FALSE);		  
	  $query1   = "INSERT into photo_info (photo_id,p_name,category,price) VALUES('" . $id . "','" . $name . "','" . $category . "','" . $price . "')";
	  $success1 = $conn->query($query1);
	  $query2   = "INSERT into photo_count (photo_id) VALUES('" . $id . "')";
	  $success2 = $conn->query($query2);
	  $query3   = "INSERT into photo_add (photo_id,photo_link) VALUES('" . $id . "','" . $link . "')";
	  $success3 = $conn->query($query3);
      if (!$success1 or !$success2 or !$success3) {
	   mysqli_rollback($conn);	  
       die("Couldn't enter data: ".$conn->error);
 }
  else{
	  mysqli_commit($conn);
	  echo'<script type ="text/javascript">
		  window.onload=function(){alert("Phototgraph Successfully Inserted!");
		  }
		  </script>';
  }
	  }
}
?>
<br>
<hr style="border: 2px solid #808080" />​

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" ><center>
<b><font size=5px face="Comic Sans MS">Name Of Photographer</font></b><br><br>
<input type="text"  name="name" size="25" style="height:30px;font-size:12pt;"><br><br>
<b><font size=5px face="Comic Sans MS">Photo Id</font></b><br><br>
<input type="text" name="id" size="25" style="height:30px;font-size:12pt;"><br><br>
<b><font size=5px face="Comic Sans MS">Category</font></b><br><br>
<input type="text" name="category" size="25" style="height:30px;font-size:12pt;"><br><br>
<b><font size=5px face="Comic Sans MS">Price</font></b><br><br>
<input type="text"  name="price" size="25" style="height:30px;font-size:12pt;"><br><br>
<b><font size=5px face="Comic Sans MS">Photo_link</font></b><br><br>
<input type="text"  name="link" size="25" style="height:30px;font-size:12pt;"><br><br><br>
<input type="submit" value="SUBMIT" name="submit"  size="25" style="height:30px;font-size:15pt;"/>

</center>
</form>

<hr style="border: 2px solid #808080" />​
</body>
</html>