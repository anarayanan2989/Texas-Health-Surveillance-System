<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "Accidents in all cities  for year 2008";
$sql=mysqli_query($con,"select @total := sum(no_of_accidents) from accidents where year=2008;");
$sql1= mysqli_query($con,"select a.year AS year, b.name AS name , concat((no_of_accidents/@total)*100,'%') AS Accidents
from accidents AS a, location AS b
where a.L_ID=b.L_ID
and a.year=2008
group by b.name;");

echo "<table border='1'>
<tr>

<th>Year</th>
<th>Name</th>
<th>% of Accidents</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['Accidents'] . "</td>";
  echo "</tr>";
}

echo "</table>";

echo "Accidents in all cities for the year 2009";
$sql2= mysqli_query($con,"select a.year AS year, b.name AS name , concat((no_of_accidents/@total)*100,'%') AS Accidents
from accidents AS a, location AS b
where a.L_ID=b.L_ID
and a.year=2009
group by b.name;");

echo "<table border='1'>
<tr>
<th>Year</th>
<th>Name</th>
<th>% of Accidents</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['Accidents'] . "</td>";
  echo "</tr>";
}

echo "</table>";

echo "Accidents in all cities for the year 2010";
$sql3= mysqli_query($con,"select a.year AS year, b.name AS name , concat((no_of_accidents/@total)*100,'%') AS Accidents
from accidents AS a, location AS b
where a.L_ID=b.L_ID
and a.year=2010
group by b.name;");

echo "<table border='1'>
<tr>
<th>Year</th>
<th>Name</th>
<th>% of Accidents</th>
<tr>";

while($row = mysqli_fetch_array($sql3)){
  echo "<tr>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['Accidents'] . "</td>";
  echo "</tr>";
}

echo "</table>";
mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
