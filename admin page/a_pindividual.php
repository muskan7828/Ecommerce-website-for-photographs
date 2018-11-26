<html>
<body background=a_pindividual.jpeg>
<hr style="border: 2px solid #000" />​
<center>
<b><font size=5px face="Georgia">Enter the name of a photographer from the given list:</font></b>
<br><br><br>
<?php
include("connect.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
$query="select distinct(p_name) from photo_info";
$mysqli_result = mysqli_query($conn,$query);
$i=0;
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	
	$name=$rows['p_name'];
	echo"<h2>".$name."</h2>";
	
	
}
echo"</ol>";

?>
<br><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" align="center">
<b><font size=5px face="Helvetica">Name</font></b><br><br>
<input type="text"  name="name" size="25" style="height:30px;font-size:12pt;"><br><br>

<input type="submit" value="submit" name="submit" size="25" style="height:30px;font-size:15pt;"/>
</form>

<?php
session_start();
include("connect.php");
error_reporting(E_ERROR | E_PARSE);
If(isset($_REQUEST['submit'])!='')
{
	$name = $_POST['name']; 
	$_SESSION['photographer'] = $name;
	header("Location:a_pdisplay.php");
}
?>
<hr style="border: 2px solid #000" />​
</center>
</body>
</html>


