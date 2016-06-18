<html>
<title>Texas Health Surveillance System</title>
<head></head>
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$year=mysqli_real_escape_string($con,$_POST['year']);
$type=mysqli_real_escape_string($con,$_POST['type']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$capacity=mysqli_real_escape_string($con,$_POST['capacity']);
$specialization=mysqli_real_escape_string($con,$_POST['specialization']);

if(($city=="Arlington")&&($year=="2008")){
$l_id="108";}
else if(($city=="Arlington")&&($year=="2009")){
$l_id="109";}
else if(($city=="Arlington")&&($year=="2010")){
$l_id="110";}

else if(($city=="Dallas")&&($year=="2008")){
$l_id="208";}
else if(($city=="Dallas")&&($year=="2009")){
$l_id="209";}
else if(($city=="Dallas")&&($year=="2010")){
$l_id="210";}

else if(($city=="Fort Worth")&&($year=="2008")){
$l_id="308";}
else if(($city=="Fort Worth")&&($year=="2009")){
$l_id="309";}
else if(($city=="Fort Worth")&&($year=="2010")){
$l_id="308";}

if($l_id=="108"){
$c_id="1188";}
else if($l_id=="208"){
$c_id="2288";}
else if($l_id=="308"){
$c_id="3388";}
else if($l_id=="109"){
$c_id="1199";}
else if($l_id=="209"){
$c_id="2299";}
else if($l_id=="309"){
$c_id="3399";}
else if($l_id=="110"){
$c_id="1110";}
else if($l_id=="210"){
$c_id="2210";}
else
$c_id="3310";

if($l_id=="108"){
$a_id="11188";}
else if($l_id=="208"){
$a_id="22288";}
else if($l_id=="308"){
$a_id="33388";}
else if($l_id=="109"){
$a_id="11199";}
else if($l_id=="209"){
$a_id="22299";}
else if($l_id=="309"){
$a_id="33399";}
else if($l_id=="110"){
$a_id="11110";}
else if($l_id=="210"){
$a_id="22210";}
else
$a_id="33310";

if($l_id=="108"){
$h_id="11";}
else if($l_id=="208"){
$h_id="12";}
else if($l_id=="308"){
$h_id="13";}
else if($l_id=="109"){
$h_id="21";}
else if($l_id=="209"){
$h_id="22";}
else if($l_id=="309"){
$h_id="23";}
else if($l_id=="110"){
$h_id="31";}
else if($l_id=="210"){
$h_id="32";}
else
$h_id="33";

$carbon_dioxide=mysqli_real_escape_string($con,$_POST['co2']);
$accident=mysqli_real_escape_string($con,$_POST['acc']);
$type=mysqli_real_escape_string($con,$_POST['type']);
$population=mysqli_real_escape_string($con, $_POST['pop']);
$sql1= mysqli_query($con,"INSERT INTO health_centers(H_ID,year,type,location,capacity,specialization,L_ID) VALUES ('$h_id','$year','$type','$city','$capacity,'$specialization','$l_id')");
$sql2= mysqli_query($con,"INSERT INTO co2_level(C_ID,year,level,L_ID) VALUES ('$c_id','$year','$carbon_dioxide','$l_id')");
$sql3= mysqli_query($con,"INSERT INTO accidents(A_ID,year,no_of_accidents,L_ID) VALUES ('$a_id','$year','$accident','$l_id')");


mysqli_close($con);

?>
<body bgcolor="Rosybrown">
<p><img src="occpest_banner.jpg" style="margin-left:auto;margin-right:auto;display:block;"></p>
<p><font face = "Tahoma" size="10"><b>Data entered into survey table successfully</b></font></p>
<form action="insert.html" method="link"><input type="submit" style="margin-left:auto;margin-right:auto;display:block;" name="s" value="Go to previous page"></form>
<p><form action="hshome.php" method="link"><input type="submit" style="margin-left:auto;margin-right:auto;display:block;" name="s" value="Home"></form>
</body>
</html>
