<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "Number of health centres based on year";
$sql1= mysqli_query($con,"SELECT location,year, count(type) FROM health_centers WHERE type LIKE 'Rehab'
GROUP BY location");

echo "<table border='1'>
<tr>
<th>Location</th>
<th>Year</th>
<th>Count</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['count(type)'] . "</td>";
  echo "</tr>";
}

echo "</table>";

echo "Number of health centres according to type";
$sql2= mysqli_query($con,"SELECT distinct count(b.type) AS count,b.type AS type,b.location AS location FROM location AS a,health_centers AS b
WHERE a.l_id=b.l_id
GROUP BY b.type,b.location");

echo "<table border='1'>
<tr>
<th>Count of health centres</th>
<th>Type of Health Centres</th>
<th>Location</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['count'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "</tr>";
}

echo "</table>";


mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
