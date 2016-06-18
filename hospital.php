<html>
<body bgcolor="Rosybrown">

<?php

$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo "Count of hospitals in all locations based on year";

$sql1= mysqli_query($con,"SELECT location,year, count(type) FROM health_centers WHERE type LIKE 'Hospital'
GROUP BY year");

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

echo "Count of hospitals based on the location";

$sql2= mysqli_query($con,"SELECT location, count(type) FROM health_centers WHERE type LIKE 'Hospital'
GROUP BY location");

echo "<table border='1'>
<tr>
<th>Location</th>
<th>Count</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['count(type)'] . "</td>";
  echo "</tr>";
}
echo "</table>"; 
mysqli_close($con);
?>	

<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
