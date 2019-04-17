<?php
session_start();
include ("db.php"); //include db.php file to connect to DB
$pagename="Make your home smart"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select proId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from Product";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($data=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$data['proId'].">";
echo "<img src=images/".$data['prodPicNameSmall']." height=200 width=200></a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$data['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$data['prodDescripShort']."</p>";
echo "<p><b>&pound;".$data['prodPrice']."</b></p>";

echo "</td>";



echo "</tr>";
}
echo "</table>";
// echo "<a href=aboutus.php?test='test'>";
include ("footfile.html");
echo "</body>";
?>