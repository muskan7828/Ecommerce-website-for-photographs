<!DOCTYPE html>
<html>
<body background=back.jpeg>
<style>
.button {
  border-radius: 20px;
  background-color: #FEF5E7;
  border: none;
  color: teal;
  align:right;
  text-align: center;
  font-size: 28px;
  font-color:#CD6155;
  padding: 10px;
  width: 200px;
  curs
  
}

.button span {
  
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: .0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style><center><br>
<img src="logo.png" /></center>

<div align="right"><br><br><br><br><br><br>
<button class="button" align="right"><span><a  href="login.php">LOG IN</a></span></button><br><br><br><br>
<button class="button" align="right"><span><a  href="sign.php">SIGN UP</a></span></button><br><br>
</div>
</body>
</html>
