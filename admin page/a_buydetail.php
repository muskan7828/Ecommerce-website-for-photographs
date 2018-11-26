<html>
<body background=a_buy.jpeg>
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

echo"<center>";
echo '<form method="post">';
echo"<select style='height:28px;font-size:15pt;' name='selected'>";
echo"<option value='select'>--------SELECT--------</option>
     <option value='desc'>Order By User(Desc)</option>
	 <option value='asc'>Order By User(Asc)</option>
	 <option value='photo_id'>Order By Photo</option>
	 </select>";
	 echo"&nbsp&nbsp&nbsp&nbsp&nbsp";
echo'<input type="submit" name="submit" value="SUBMIT"  style="height:27px;font-size:12pt;"/>';	 
echo '</form></center>';



if(isset($_POST['submit']))
{

$select=$_POST['selected'];	

if($select=='desc')
{
	$query='select * from sold_details group by username desc';
	$mysqli_result = mysqli_query($conn,$query);
    while($rows=mysqli_fetch_assoc($mysqli_result))
	{
		$name=$rows['username'];
		echo"<b><center>";
		echo"<hr style='border: 2px solid #000000' >​</hr>";
		echo "<b><font size=5px face='Verdana'> USERNAME - '$name'</font></b>";
		echo"<hr style='border: 2px solid #000000' >​</hr>";
		
		echo"</center></b>";
		
		$query1="select * from sold_details where username='$name'";
		$result = mysqli_query($conn,$query1);
		echo"<center>";
		
		while($rows1=mysqli_fetch_assoc($result))
		{
		  $id=$rows1['photo_id'];
          $query2="select photo_link from photo_add where photo_id='$id'";
          $result2 = mysqli_query($conn,$query2);
		  $row3=mysqli_fetch_assoc($result2);
		  $link=$row3['photo_link'];
		  echo"<img src='$link' style='width:28%'><br><br>";
		  $time=$rows1['time'];
		  echo"<br>";
		  echo "<h3>'$time'</h3>";
		  echo"<br><hr style='border: 1px solid #000000' >​</hr><br><br>";
		  
		
		  
			
			
		}
		echo"</center>";
		
		
		
	}
	echo"<br><br>";
	
	
	
	
	
}
else if($select=='asc')
{
	$query='select * from sold_details group by username ';
	$mysqli_result = mysqli_query($conn,$query);
    while($rows=mysqli_fetch_assoc($mysqli_result))
	{
		$name=$rows['username'];
		echo"<b><center>";
		echo"<hr style='border: 2px solid #000000' >​</hr>";
		echo "<b><font size=5px face='Verdana'> USERNAME - '$name'</font></b>";
		echo"<hr style='border: 2px solid #000000' >​</hr>";
		
		echo"</center></b>";
		
		$query1="select * from sold_details where username='$name'";
		$result = mysqli_query($conn,$query1);
		echo"<center>";
		
		while($rows1=mysqli_fetch_assoc($result))
		{
		  $id=$rows1['photo_id'];
          $query2="select photo_link from photo_add where photo_id='$id'";
          $result2 = mysqli_query($conn,$query2);
		  $row3=mysqli_fetch_assoc($result2);
		  $link=$row3['photo_link'];
		  echo"<img src='$link' style='width:28%'><br><br>";
		  $time=$rows1['time'];
		  echo"<br>";
		  echo "<h3>'$time'</h3>";
		  echo"<br><hr style='border: 1px solid #000000' >​<br><br>";
		  
		
		  
			
			
		}
		echo"</center>";
		
		
		
	}
	echo"<br><br>";
}

else if($select=='photo_id')
{
	echo"<center>";
	$query="select *from sold_details group by photo_id";
	$mysqli_result = mysqli_query($conn,$query);
    while($rows=mysqli_fetch_assoc($mysqli_result))
	{
	 $id=$rows['photo_id'];
	 $query1="select photo_link from photo_add where photo_id='$id'";
	 $mysqli_result1 = mysqli_query($conn,$query1);
	 $rows1=mysqli_fetch_assoc($mysqli_result1);
	 $link=$rows1['photo_link'];
	 echo"<br><br>";
	 echo"<img src='$link' style='width:28%'><br><br>";
	 $query2="select * from sold_details where photo_id='$id'";
	 $mysqli_result2 = mysqli_query($conn,$query2);
	 while($rows2=mysqli_fetch_assoc($mysqli_result2))
	 {
		 $name=$rows2['username'];
		 $time=$rows2['time'];
		 echo "<b><h2>Username- $name</h2></b>";
		 echo"&nbsp&nbsp&nbsp";
		 echo"<b><font size=3px face='Verdana'>Time- $time</font></b>";
		 echo"<br>";
	 }
	 echo"<br>";
	 echo"<hr style='border: 1px solid #000000' >​</hr>";
	 echo"<br>";
	 
     
     	 
	}
	echo"<center>";
	
}
}


	 ?>
	 
</body>
</html>  	

