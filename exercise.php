<html>
<body bgcolor="Rosybrown">
<?php
$con=mysqli_connect("localhost","root","adithya","healthcare"); //$db_con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "Number of people who don't exercise in the year 2008 for different cities";
$sql1= mysqli_query($con,"select city, concat((count(a.nutrition)/b.population * 100),'%') as Do_Not_Exercise
from survey_details a, location b
where a. l_id = b.l_id
and nutrition like 'No%'
and
date like '2008%'
group by city;");

echo "<table border='1'>
<tr>

<th>City</th>
<th># People who don't exercise</th>
<tr>";

while($row = mysqli_fetch_array($sql1)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['Do_Not_Exercise'] . "</td>";
  echo "</tr>";
}
 echo"</table>";
 
echo "Number of people who exercise in Dallas for different years";
$sql2= mysqli_query($con,"select city, b.year as year,concat((count(a.nutrition)/b.population * 100),'%') Ppl_Exercise
from location b, survey_details a
where a.l_id = b.l_id
and b.name = 'Dallas'
and nutrition like '%exercise%'
group by b.year;
");

echo "<table border='1'>
<tr>

<th>City</th>
<th>Year</th>
<th># People Exercise</th>
<tr>";

while($row = mysqli_fetch_array($sql2)){
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['Ppl_Exercise'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>	
<br><form action="surveypage.html" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="s" value="Previous page"></form></br>
<br><form action="hshome.php" method="link"><input type="submit" style="font-face: 'Comic Sans Ms'; font-size: larger; color:white;background-color:#20B2AA;margin-left:auto;margin-right:auto;display:block;" name="h" value="Home"></form></br>
</body>
</html>
