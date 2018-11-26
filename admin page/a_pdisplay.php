<html>
<body background=category.jpg>
<?php
include("connect.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
$name = $_SESSION['photographer'];
$sqlimage  = "SELECT * FROM photo_info where p_name='$name'";
$mysqli_result = mysqli_query($conn,$sqlimage);
echo"<center>";
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	
    $price=$rows['price'];
	$id=$rows['photo_id'];
    $query  = "SELECT * FROM photo_add where photo_id='$id'";
    $result = mysqli_query($conn,$query);
	$final=mysqli_fetch_assoc($result);
	$image=$final['photo_link'];
	
    echo "<img src='$image' width='50%' height='60%' >";
	echo "<br><br>";
	echo "<b>Photo Id:$id </B>";
	echo str_repeat("&nbsp;",120)."<b>Price:$$price</b>";
    echo "<br><br>";
	echo"<hr style='border: 2px solid #000000' />​";
	echo"<br><br><br>";
}
echo"</center>";
?>
</body>
</html>