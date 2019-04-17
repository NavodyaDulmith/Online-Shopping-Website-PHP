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

if(isset($_POST['u_prodid']))
{
	
	$pridtobeupdated = $_POST['u_prodid'];
	$newprice = $_POST['newPrice'];
	$newqutoadd = $_POST['u_quantity'];
	
	$SQL="select prodQuantity from Product WHERE proId=$pridtobeupdated";
//	echo $SQL;
	$execute = mysqli_query($conn,$SQL);
//	echo 'asdasdasd'.$execute;
	$data=mysqli_fetch_array($execute);
	$stock = $data['prodQuantity'];
	
	$newqutoadd +=$stock;
	
	if(empty($newprice))
	{
		$sqlUpdate = "UPDATE product SET prodQuantity=$newqutoadd WHERE proId=$pridtobeupdated";
	}
	else
	{
		$sqlUpdate = "UPDATE product SET prodQuantity=$newqutoadd,prodPrice=$newprice WHERE proId=$pridtobeupdated";
	}
	
	$exeSQL = mysqli_query($conn,$sqlUpdate);
//	echo 'test';
}


$SQL="select proId, prodName,prodQuantity,prodPicNameSmall,prodDescripShort,prodPrice from Product";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";






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
echo "<p>".$data['prodDescripShort']." &</p>";
echo "<p><b>&pound;".$data['prodPrice']."</b></p>";
	
echo "<p>Current stock :".$data['prodQuantity']."</p>";
echo "<form method='POST' action='editproduct.php'>";
echo "New Price : <input type='text' name='newPrice'";
echo "<p>Add no of Items: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<select name=u_quantity>";
for($i=0;$i<=20;$i++)
{
    echo "<option value=$i>$i</option>";
        
}
echo "</select>";

echo "<input type='hidden' name='u_prodid' value=".$data['proId'].">";
echo "<input type='submit' value='Update'>";	
echo '</form>';
echo "</td>";



echo "</tr>";
}
echo "</table>";
// echo "<a href=aboutus.php?test='test'>";
include ("footfile.html");
echo "</body>";
?>