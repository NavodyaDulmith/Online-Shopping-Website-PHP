<?php
include("db.php");
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
$prodid=$_GET['u_prod_id'];
// echo "<p>Selected product Id: ".$prodid;

$SQL="select proId, prodName, prodPicNameLarge,prodDescripLong,prodPrice,prodQuantity from Product where proId=".$prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $sss.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
// while ($data=mysqli_fetch_array($exeSQL))
// {
$data=mysqli_fetch_array($exeSQL);
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$data['proId'].">";
echo "<img src=images/".$data['prodPicNameLarge']." height=200 width=200></a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$data['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$data['prodDescripLong']."</p>";
echo "<p><b>&euro;".$data['prodPrice']."</b></p>";
echo "<p>Number left in stock :".$data['prodQuantity']."</p>";

echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<select name=p_quantity>";
for($i=1;$i<=$data['prodQuantity'];$i++)
{
    echo "<option value=$i>$i</option>";
        
}
echo "</select>";

echo "<input type=submit value='ADD TO BASKET'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";

echo "</td>";



echo "</tr>";
// }
echo "</table>";



include("footfile.html"); //include head layout
echo "</body>";
?>