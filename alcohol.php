<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "Alcoholics for different cities for the year 2009";
$sql1= mysqli_query($con,"select city, concat((count(a.alcohol)/b.population * 100) , '%') AS Alcoholics_2009
from survey_details a, location b
where a. l_id = b.l_id
and alcohol like 'yes'
and
date like '2009%'
group by city;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>% of Alcoholics</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['Alcoholics_2009'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo "Alcoholics in different cities for the year 2010";
$sql2= mysqli_query($con,"select city, concat((count(a.alcohol)/b.population * 100) , '%') AS Alcoholics_2010
from survey_details a, location b
where a. l_id = b.l_id
and alcohol like 'yes'
and
date like '2010%'
group by city;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>% of Alcoholics</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['Alcoholics_2010'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo "Alcoholics in the same city through different years";
$sql3= mysqli_query($con,"select city,year,concat((count(a.alcohol)/b.population * 100),'%') AS Alcoholics
from location b, survey_details a
where a.l_id = b.l_id
and b.name = 'Dallas'
and alcohol like 'yes'
group by b.year;");

echo "<table border='1'>
<tr>

<th>City</th>
<th>Year</th>
<th>% of Alcoholics</th>
<tr>";

while($row = mysqli_fetch_array($sql3)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['Alcoholics'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
