<html>
<body background=category1.jpeg>

<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 18.33%;
    padding: 10px;
}


img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
.container {
    padding: 12px 36px;
}
</style>



<?php
error_reporting(E_ERROR | E_PARSE);
include("connect.php");
session_start();
$username=$_SESSION["username"];
if ($username=='')
{
	 exit("Please Login First");
}	


echo"<center>
<img src='logo.png' />
</center>";
echo"<h2><p align='left'>Select A Category</p></h2>";  

    if( $_POST['rateButton'] ) {
        $keys = array_keys($_POST['rateButton']);
        $clicked = $keys[0];

		$_SESSION['varname'] = $clicked;
		header("Location:kk.php");
    }
?>




<br><br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="column">
<input type="image" src="thumbnail/animal.jpg" style="width:100%" name="rateButton[animal]">
<div class="container">
<b>Animal</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/vintage.jpg" style="width:100%" name="rateButton[vintage]">
<div class="container">
<b>Vintage</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/architecture.jpg" style="width:100%"name="rateButton[architecture]">
<div class="container">
<b>Architecture</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/black_white.jpg" style="width:100%"name="rateButton[black and white]">
<div class="container">
<b>Black and White</b>
</div>
</div>



<div class="column">
<input type="image" src="thumbnail/food.jpg" style="width:100%" name="rateButton[food]">
<div class="container">
<b>Food</b>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

<div class="column">
<input type="image" src="thumbnail/sports.jpg" style="width:100%" name="rateButton[sports]">
<div class="container">
<b>Sports</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/industrial.jpg" style="width:100%" name="rateButton[industrial]">
<div class="container">
<b>Industrial</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/street.jpg" style="width:100%" name="rateButton[street photography]">
<div class="container">
<b>Street Photography</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/nature.jpg" style="width:100%" name="rateButton[nature]">
<div class="container">
<b>Nature</b>
</div>
</div>

<div class="column">
<input type="image" src="thumbnail/rough_camera.jpg" style="width:100%" name="rateButton[rough camera]">
<div class="container">
<b>Rough Camera</b>
</div>
</div>






</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</form>
</body>
</html>
