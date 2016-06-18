<html>
<head></head>
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sid= rand();
$city=mysqli_real_escape_string($con,$_POST['city']);
$year=mysqli_real_escape_string($con,$_POST['year']);
$date=mysqli_real_escape_string($con,$_POST['year']."-". $_POST['month']."-".$_POST['day']);
$nutrition=mysqli_real_escape_string($con, $_POST['nutrition'].",".$_POST['nutrition1']);
$smoke=mysqli_real_escape_string($con,$_POST['smoke']);
$alc=mysqli_real_escape_string($con,$_POST['alc']);
$job=mysqli_real_escape_string($con,$_POST['job']);
$d_id=mysqli_real_escape_string($con,$_POST['disease']);
if($d_id=="1001"){
$d_name="Cancer";}
else if($d_id=="1002"){
$d_name="Asthma";}
else if($d_id=="1003"){
$d_name="Arthritis";}
else
$d_name="Diabetes";

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

$sql= mysqli_query($con,"INSERT INTO survey_details(S_Id,city,date,chronic_disease,occupation,nutrition,smoking,alcohol,L_ID,D_ID) VALUES ('$sid','$city','$date','$d_name','$job','$nutrition','$smoke','$alc','$l_id','$d_id')");

mysqli_close($con);
?>
<body bgcolor="red">
<p><img src="health_survey.jpg" style="text-align:center;"></p>
<p><font face = "Tahoma" size="10"><b>Data entered into survey table successfully</b></font></p>
<form action="insert.html" method="link"><input type="submit" style="margin-left:auto;margin-right:auto;display:block;" name="s" value="Go to previous page"></form>
<p><form action="hshome.php" method="link"><input type="submit" style="margin-left:auto;margin-right:auto;display:block;" name="s" value="Home"></form>
</body>
</html>
location.html
<html>
<head>
</head>
<h1><font face = "Verdana" align="center" color="black" style="margin-left:auto;margin-right:auto;display:block;"> Enter location details </font></h1>
<body>
<form action="location.php" method="POST">
<body bgcolor ="rosybrown" body>
<font face = "Calibri"><b> Survey date </b><hr align="left" width="200px"/>
<br><font face = "Calibri"><b> Year</b>
<select name="year">
<option value="default"></option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
</select>
</br><br><font face = "Calibri"><b> Location</b>
<select name="city">
  <option value=NULL></option>
  <option value="Dallas">Dallas</option>
  <option value="Fort Worth">Fort Worth</option>
  <option value="Arlington">Arlington</option>
</select></br>
<br><font face = "Calibri"><b>Health_Centre Code</b>
<select name="hid">
  <option value=NULL></option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="31">31</option>
  <option value="32">32</option>
  <option value="33">33</option>
</select></br>
<br><font face = "Calibri"><b> Population </b><input type = "text" name="pop"></br>
<br><font face = "Calibri"><b> CO2 level </b><input type = "text" name="co2"></br>
<br><font face = "Calibri"><b> Number of Accidents </b><input type = "text" name="acc"></br>
<br><b><font face = "Calibri">Choose whether Hospital or Rehabilitation Centre</font></b></br>
<br><input type="radio" name="type" value="Hospital"> Hospital </br>
<br><input type="radio" name="type" value="Rehabilitation_centre"> Rehabilitation Centre </br>
<br><b><font face = "Calibri">Health Centre Specialization</font></b>
<select name="specialization">
  <option value=NULL></option>
  <option value="Cancer">Cancer</option>
  <option value="General">General</option>
  <option value="Addiction">Addiction</option>
 </select></br>
<br><font face = "Calibri"><b>Capacity </b><input type = "text" name="capacity"></br>
<input type="submit"style="font-face: 'Comic Sans MS'; font-size: larger; color: white; background-color: #20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Submit">
</form>
<br></br><form action="insert.html" method="link"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: white; background-color: #20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Back"></form>
</body>
</html>
