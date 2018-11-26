<html>
<body background=a_profit.jpeg>
<?php
 error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
echo"<hr style='border: 2px solid #000000' >​</hr>";
echo"<br/><br/>";
$sqlimage  = "SELECT p_name ,sum(profit) FROM photo_info group by p_name desc ";
$mysqli_result = mysqli_query($conn,$sqlimage);
echo"<b><font size=5px face='Helvetica'>The Profit acquired by individual photographer is :</font></b>";
echo"<br/><br/>";
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	$sum = $rows['sum(profit)'];
	$name=$rows['p_name'];
	echo "<font size=4px face='Verdana'>".$name.":&nbsp &nbsp $ ".$sum."</font>";
	echo"<br/><br/>";
}
echo"<br/><br/>";
$query="SELECT sum(profit) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
echo"<br/><br/><br/>";
echo"<b><font size=5px face='Helvetica'>The total profit acquired is  :</font></b>";
echo"<br/><br/>";
$sum = $rows['sum(profit)'];
echo "<font size=4px face='Verdana'> $ $sum</font>";


echo"<br/><br/><br/>";

echo"<br/><br/>";
$query="SELECT avg(profit) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
echo"<br/><br/><br/>";
echo"<b><font size=5px face='Helvetica'>The average profit acquired is  :</font></b>";
echo"<br/><br/>";
$sum = $rows['avg(profit)'];
echo "<font size=4px face='Verdana'>$ ".$sum."</font>";



echo"<br/><br/><br/>";

echo"<br/><br/><br/><br/>";
$sqlimage  = "SELECT category ,sum(profit) FROM photo_info group by category ";
$mysqli_result = mysqli_query($conn,$sqlimage);
echo"<b><font size=5px face='Helvetica'>The Profit acquired by individual category is :</font></b>";
echo"<br/><br/>";
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	$sum = $rows['sum(profit)'];
	$category=$rows['category'];
	echo "<font size=4px face='Verdana'>".$category.":&nbsp &nbsp $ ".$sum."</font>";
	echo"<br/><br/>";
}

echo"<br/><br/>";
echo"<hr style='border: 2px solid #000000' >​</hr>";

?>
</body>
</html>
