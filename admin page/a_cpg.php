<html>
<body background=a_cpg.jpeg>
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
$query="select count(distinct(p_name)) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
echo"<br/><br/><br/>";
echo"<b><font size=5px face='Helvetica'>The total number of photographers are :</font><b> ";

$count = $rows['count(distinct(p_name))'];
echo "<font size=5px face='Verdana'>".$count."</font>";


$query="select distinct(p_name) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	$name=$rows['p_name'];
	echo"<br/><br/>";
	echo "<font size=4px face='Verdana'>".$name."</font>";
}
echo"<br/><br/><br/>";
?>
 <hr style="border: 2px solid #000" />​
</body>
</html>