<html>
<body background=admin.jpg>
<?php
session_start();
$username=$_SESSION['username'];
if ($username!='admin')
{
	 exit("Please Login First");
}	
?>

<style>
table,th,td{
	border:1px solid black;
}
</style>
<center><h1>Welcome Administrator</h1></center><br><br>
<center>
<table style="width:50%">
<tr>
<th><h2>S.no</h2></th>
<th><h2>Commands</h2></th>
</tr>
<tr>
<td>1</td>
<td align="center"><a href='a_insert.php'><h3>Add a photo</h3></a></td>
</tr>
<tr>
<td>2</td>
<td align="center"><a href='a_delete.php'><h3>Remove a photo</h3></a></td>
</tr>
<tr>
<td>3</td>
<td align="center"><a href='a_profit.php'><h3>Check profit</h3></a></td>
</tr>
<tr>
<td>4</td>
<td align="center"><a href='a_user.php'><h3>Count Total Number Of Users</h3></a></td>
</tr>
<tr>
<td>5</td>
<td align="center"><a href='a_cp.php'><h3>Count Total Number Of Photographs</h3></a></td>
</tr>
<tr>
<td>6</td>
<td align="center"><a href='a_cpg.php'><h3>Count Total Number Of Photographers With Name</h3></a></td>
</tr>
<tr>
<td>7</td>
<td align="center"><a href='a_pindividual.php'><h3>Contribution by a selected photographers</h3></a></td>
</tr>
<tr>
<td>8</td>
<td align="center"><a href='a_sold.php'><h3>Number Of Photographs Sold</h3></a></td>
</tr>
<td>9</td>
<td align="center"><a href='a_buydetail.php'><h3>Buyer's Details</h3></a></td>
</tr>


</table>
</center>
</body>
</html>