<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "Percentage of smokers in FortWorth for different years";
$sql1= mysqli_query($con,"select city, b.year as year,concat((count(a.smoking)/b.population * 100),'%') AS Smokers
from location b, survey_details a
where a.l_id = b.l_id
and b.name = 'FortWorth'
and smoking like 'yes'
group by b.year;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>Year</th>
<th>% of Smokers</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['Smokers'] . "</td>";
  echo "</tr>";
}
 echo"</table>";
 
echo "Percentage of smokers in Arlington for different years";
$sql2= mysqli_query($con,"select city, b.year as year,concat((count(a.smoking)/b.population * 100),'%') AS Smokers
from location b, survey_details a
where a.l_id = b.l_id
and b.name = 'Arlington'
and smoking like 'yes'
group by b.year;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>Year</th>
<th>% of Smokers</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['Smokers'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo "Percentage of smokers in Dallas for different years";
$sql3= mysqli_query($con,"select city, b.year as year,concat((count(a.smoking)/b.population * 100),'%') AS Smokers
from location b, survey_details a
where a.l_id = b.l_id
and b.name = 'Dallas'
and smoking like 'yes'
group by b.year;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>Year</th>
<th>% of Smokers</th>
<tr>";

while($row = mysqli_fetch_array($sql3)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['Smokers'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo "Percentage of smokers in different cities for the year 2009";
$sql4= mysqli_query($con,"select city, concat((count(a.smoking)/b.population * 100),'%') AS Smokers
from survey_details a, location b
where a. l_id = b.l_id
and smoking like 'yes'
and
date like '2009%'
group by city;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>% of Smokers</th>
<tr>";

while($row = mysqli_fetch_array($sql4)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['Smokers'] . "</td>";
  echo "</tr>";
}
echo "</table>";


mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
