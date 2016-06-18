<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "CO2 levels for different years of same city";
$sql1= mysqli_query($con,"select a.name AS city, b.year AS year, concat((level/sum(level)*100),'%') AS carbon_dioxide
from location AS a, co2_level AS b
where a.l_id = b.l_id
group by a.year");

echo "<table border='1'>
<tr>
<th>City</th>
<th>Year</th>
<th>CO2 Level</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['carbon_dioxide'] . "</td>";
  echo "</tr>";
}

echo "</table>";

echo "CO2 levels for same year of different cities";
$sql2= mysqli_query($con,"SELECT b.name AS city,a.year AS year, concat((level/sum(level)*100),'%') AS carbon_dioxide
FROM co2_level AS a, location AS b
WHERE a.l_id=b.l_id
GROUP BY b.name");

echo "<table border='1'>
<tr>
<th>Location</th>
<th>Year</th>
<th>CO2 level</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['carbon_dioxide'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
