<!DOCTYPE html>
<html>
<body background=buy.jpeg>

<?php

error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$clicked=$_SESSION['clicked_id'];
$username=$_SESSION['username'];

if ($username=='')
{
	 exit("Please Login First");
}	

If(isset($_REQUEST['submit'])!=''){
$nameEr=$cardEr=$cvvEr=$yearEr=$monthEr="";
$name=$card=$cvv=$year=$month="";
$a=$b=$c=$d=$e="";






	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cname"])) {
    $nameEr = "Please Fill The Box";
	$a=0;
  } else {
    $name =$_POST["cname"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameEr = "Only letters and white space allowed";
     $a=0;
 	}
	else{
		$a=1;
	}
	
  }
}






	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["card"])) {
    $cardEr = "Please Fill The Box";
	$b=0;
  } else {
    $card =$_POST["card"];  
	if(!preg_match("/^[0-9]{16}+$/", $card)){
	 $cardEr="card number should be of length 16";
	$b=0;}
	else{
	$b=1;}
  }
  
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["cvv"])) {
    $cvvEr = "Please Fill The Box";
	$c=0;
  } else {
    $cvv =$_POST["cvv"];  
	if(!preg_match('/^[0-9]{3}+$/', $cvv)){
	 $cvvEr="cvv number should be of length 3";
	$c=0;}
	else
	{
		$c=1;
	}
  }
  
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["month"])) {
    $monthEr = "Please Fill The Box";
	$d=0;
  } else {
    $month =$_POST["month"];  
	if($month>12||$month<1){
	 $monthEr="enter valid month number";
	$d=0;}
	else{
		$d=1;
	}
 
  }}    

	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["year"])) {
    $yearEr = "Please Fill The Box";
	$e=0;
  } else {
    $year =$_POST["year"];  
	if($year<2018||$year>2025){
	 $yearEr="enter valid year";
	$e=0;}
	else{
		$e=1;
	}

  }}    
   
if($a &&	$b &&$c && $d &&	$e)
{
	mysqli_autocommit($conn, FALSE);
	$c=1;
	foreach($_SESSION['cart'] as $clicked){

     	
	   $query="update photo_info set profit=profit + price where photo_id= '$clicked'";
	   $success1 = $conn->query($query);
	   $query="update photo_count set count=count + 1 where photo_id= '$clicked'";
	   $success2 = $conn->query($query);
	   $query="insert into sold_details values('$clicked','$username',NOW())";
	   $success3 = $conn->query($query);
	   if(!$success1 or !$success2 or !$success3)
	   {
		   mysqli_rollback($conn);
		   echo'<script type ="text/javascript">
		  window.onload=function(){alert("unable to proceed due to server error");
		  }
		  </script>';
		  $c=0;
		  break;
	   }
	   else{
	   mysqli_commit($conn);	   
       echo'<script type ="text/javascript">
		  window.onload=function(){alert("Transaction Successful");
		  }
		  </script>';	   
	  
	   }
	   
	   

   
	
	}
	if($c==1){
		foreach($_SESSION['cart'] as $clicked){
			
		$query="delete from cart where username='$username' and photo_id='$clicked'";
	    $success = $conn->query($query);
	    if($success)
	    {
		   mysqli_commit($conn);
	    }
		else
		{
			 echo'<script type ="text/javascript">
		  window.onload=function(){alert("unable to proceed due to server error");
		  }
		  </script>';
		}
	}
}

}}
?>

















<center>
<form style="font-size:100%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
      <font size=20px face="Georgia"><center>Checkout Form</center></font>
	        <hr style="border: 2px solid #000" />​
      <font size=5px face="Georgia"><center>Your product is ready for checkout</center></font><br>

	   
      <b><font size=5px face="Courier">Name on Card</font><br></b>
      <input type="text"  name="cname"  size="25" style="height:30px;font-size:12pt;"><br>
	  <span class="error"> <?php echo $nameEr; echo"<br>";?></span><br>


      <b><font size=5px face="Courier">Credit card number</font><br></b>
      <input type="text"  name="card"  size="25" style="height:30px;font-size:12pt;"><br>
	  <span class="error"> <?php echo $cardEr;echo"<br>"?></span><br>
     

      
      <b><font size=5px face="Courier">Exp Month</font><br></b>
      <input type="text"  name="month"  size="25" style="height:30px;font-size:12pt;"><br>
	  <span class="error"> <?php echo $monthEr;echo"<br>"?></span><br>

  

      <b><font size=5px face="Courier">CVV</font><br></b>
      <input type="password"  name="cvv" id="cvv" size="25" style="height:30px;font-size:12pt;"><br>
	  <span class="error"> <?php echo $cvvEr;echo"<br>"?></span><br>

      <b><font size=5px face="Courier">Exp Year</font><br></b>
      <input type="text" name="year" id="year" size="25" style="height:30px;font-size:12pt;"><br>
	  <span class="error"> <?php echo $yearEr;echo"<br>"?></span><br><br>
     

      <input type="submit" value="SUBMIT" name="submit" size="25" style="height:30px;font-size:15pt;"/>&nbsp&nbsp&nbsp
	  <input type="reset" value="RESET" name="reset" size="25" style="height:30px;font-size:15pt;"/>
	  <br><br>
	  <a href="category.php">
	  <input type="button" value="Back To Homepage" size="25" style="height:30px;font-size:15pt;"/></a>
      <hr>
  </form>

</center>
</body>
</html>
