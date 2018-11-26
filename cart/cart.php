<html>
<body background=category.jpg>

<?php
include("connect.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$username=$_SESSION['username'];
if ($username=='')
{
	 exit("Please Login First");
}	
$query="select * from cart where username='$username'";
$mysqli_result = mysqli_query($conn,$query);
echo"<center><h2>Your Cart contains Following Photographs</h2>";
echo '<form method="post">';
$sum=0;
while($rows=mysqli_fetch_assoc($mysqli_result))
{
	echo"<br><br>";
	$id=$rows['photo_id'];
    $query2="select price from photo_info where photo_id='$id'";
    $result = mysqli_query($conn,$query2);
	$res=mysqli_fetch_assoc($result);
	$price=$res['price'];
	$query3="select photo_link from photo_add where photo_id='$id'";
	$result2 = mysqli_query($conn,$query3);
	$res2=mysqli_fetch_assoc($result2);
	$add=$res2['photo_link'];
    $sum=$sum+$price;
	echo "<img src='$add' style='width:38%' >";
	
	echo"<br><br>";
	echo"<input type='checkbox' name='check_list[]' value='$id'>";
	echo"<b>Price :- $$price </b>";
	echo"</input>";
	echo"<br><br>";
	
}
echo"<h3>Final Price is :- $sum</h3>";
 
	

echo'<input type="submit" name="submit" value="BUY" size="25" style="height:30px;font-size:15pt;"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' ;
echo'<input type="submit" name="delete" value="DELETE" size="25" style="height:30px;font-size:15pt;"/>';
echo"</form>";
echo"</center>";

if(isset($_POST['submit']))
 {
	 if(!empty($_POST['check_list']))
	 {

		session_start();
		$_SESSION['cart'] = array();
         foreach($_POST['check_list'] as $selected)
		 {
          $_SESSION['cart'][] = $selected;
		}	
		if (count($_SESSION['cart']) > 0)
		{
		header("Location:buy.php");
		}
	
		
	}
		else
		{
			
			echo'<script type ="text/javascript">
		  window.onload=function(){alert("Please select a Photograph!");
		                           }
		</script>';
		}
 }
 
 if(isset($_POST['delete']))
 {
  if(!empty($_POST['check_list'])){
		 foreach($_POST['check_list'] as $selected){
			$query="select * from photo_info where photo_id='$selected'";
			$result = mysqli_query($conn,$query);
	        $res=mysqli_fetch_assoc($result);
			$id=$res['photo_id'];
			$query="delete from cart where photo_id='$id'";
			$success1 = $conn->query($query);
			if($success1){

		       header("Location:cart.php");
			}
			
			
			 
 }
 }}
?>
</body>
</html>		