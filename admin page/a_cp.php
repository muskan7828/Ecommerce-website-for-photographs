<html>
<body background=a_user.jpeg>
<br><br><br>
 <hr style="border: 2px solid #000" />​
<?php
 error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
$query="select count(photo_id) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
echo"<br/><br/><br/>";
echo"<b><font size=5px face='Helvetica'>The total number of photographs are :</font></b>";
echo"<br/><br/>";
$count = $rows['count(photo_id)'];
echo "<b><font size=5px face='Verdana'>".$count."</font></b>";
?>
<br><br><br>
 <hr style="border: 2px solid #000" />​
</body>
</html>