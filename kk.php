<html>
<body background=category.jpg>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.navbar {
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
  display: block;
  transition: top 0.3s;
  overflow:hidden;
}

.navbar a {
  float: left;
  display: block;
  color: 	#D9ED99;
  text-align: center;
  padding: 15px;
  text-decoration: none;
  font-size: 23px;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
  }
</style>
<?php
include("connect.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$category = $_SESSION['varname'];
$username=$_SESSION['username'];
if ($username=='')
{
	 exit("Please Login First");
}	
echo"<marquee> Welcome $username</marquee>";
echo"<br><br><br><br>";
echo'<div class="navbar">';
  echo'<a href="category.php">Home</a>';
  echo'<a href="cart.php">Cart</a>';
  echo'<a href="logout.php">Log Out</a>';
echo'</div>';


$popular="select *from photo_info where category='$category'";
$result = mysqli_query($conn,$popular);
$count=0;
$mostpop;
while($pop=mysqli_fetch_assoc($result))
{
	$id=$pop['photo_id'];
	$temp="select count from photo_count where photo_id='$id'";
	$result1 = mysqli_query($conn,$temp);
	$pop1=mysqli_fetch_assoc($result1);
	$counttemp=$pop1['count'];
	if ($counttemp>$count)
	{
		$count=$counttemp;
		$mostpop=$id;
	}
	
}
$query1="select photo_link from photo_add where photo_id='$mostpop'";
$result1 = mysqli_query($conn,$query1);
$pop1=mysqli_fetch_assoc($result1);
$add=$pop1['photo_link'];
echo"<marquee  direction='left' scrollamount='15'><b><h2><font face='Comic Sans MS'><pre>Most Purchased Photograph</pre></font></h2></b>";
echo "<img src='$add' border='4' style='width:20%'; float:'left'; ><br><br></marquee><br><br><br>";
echo"<center>";

$sqlimage  = "SELECT * FROM photo_info where category='$category'";
$mysqli_result = mysqli_query($conn,$sqlimage);
echo '<form method="post">';
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	
	$id=$rows['photo_id'];
	$sqlimage  = "SELECT * FROM photo_add where photo_id='$id'";
    $ll = mysqli_query($conn,$sqlimage);
	$new=mysqli_fetch_assoc($ll);
	$price=$rows['price'];
	$name=$rows['p_name'];
	$image = $new['photo_link'];
	$cart='cart.png';
    echo "<img src='$image' style='width:50%' >";
	echo "<br> ";
	echo"<h3>";
	echo "<b>Clicked By:$name</b>";
	echo str_repeat("&nbsp;",45)."<b>Price:$$price</b>";
	echo"<br><br>";
	echo "<input type='image' src='$cart' style='width:10%' name='clicked[$id]'>";
	echo"</h3>";
	echo "<br><br>";
    echo "<br>";
	
}
echo"</form>";
session_start();
$username=$_SESSION['username'];
 if(isset($_POST["clicked"]))
 {
	    $keys = array_keys($_POST['clicked']);
        $clicked = $keys[0];
		$query2="select * from cart where username='$username' and photo_id='$clicked'";
		$mysqli_result = mysqli_query($conn,$query2);
		if($rows=mysqli_fetch_assoc($mysqli_result))
		{
		
			echo'<script type ="text/javascript">
		  window.onload=function(){alert("This Phototgraph already exist in your cart!");
		  }
		</script>';
		}
		else
		{
		
		$query="insert into cart values('$username','$clicked')";
		$success = $conn->query($query);
		if($success){
		echo'<script type ="text/javascript">
		  window.onload=function(){alert("Phototgraph Successfully Added To The Cart!");
		  }
		</script>';}
		}
 }

	
?>
</center>
</body>
</html>