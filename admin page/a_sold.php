<html>
<body background=a_sold.jpeg>
<?php
 error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
echo" <hr style='border: 2px solid #000' />​";
$query  = "SELECT sum(count) FROM photo_count";
$mysqli_result = mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($mysqli_result);
echo"<br/><br/><br/>";
echo"<b><font size=5px face='Helvetica'>The total photographs sold is  :</font></b>";
echo"<br/><br/>";
$sum = $rows['sum(count)'];
echo "<font size=4px face='Verdana'>".$sum."</font>";
echo"<br/><br/>";

echo" <hr style='border: 2px solid #000' />​";
echo"<br/><br/>";
$query  = "SELECT sum(photo_count.count) , photo_info.category FROM photo_count inner join photo_info on photo_count.photo_id = photo_info.photo_id group by photo_info.category";
$mysqli_result = mysqli_query($conn,$query);
echo"<b><font size=5px face='Helvetica'>The total photographs sold per category  :</font></b>";
echo"<br/><br/>";
while($rows=mysqli_fetch_assoc($mysqli_result))
{	
$sum = $rows['sum(photo_count.count)'];
$category=$rows['category'];
echo "<font size=4px face='Verdana'>".$category.":&nbsp &nbsp".$sum."</font>";
echo"<br/><br/>";	
}

echo" <hr style='border: 2px solid #000' />​";
echo"<br/><br/>";

echo"<b><font size=5px face='Helvetica'>The total photographs sold per photographs  :</font></b>";
echo"<br/><br/>";
$query  = "SELECT sum(photo_count.count) , photo_info.p_name FROM photo_count inner join photo_info on photo_count.photo_id = photo_info.photo_id group by photo_info.p_name";
$mysqli_result = mysqli_query($conn,$query);
while($rows=mysqli_fetch_assoc($mysqli_result))
{	
$sum = $rows['sum(photo_count.count)'];
$name=$rows['p_name'];
echo "<font size=4px face='Verdana'>".$name.":&nbsp &nbsp".$sum."</font>";
echo"<br/><br/>";	
}

?>

</body>
</html>
