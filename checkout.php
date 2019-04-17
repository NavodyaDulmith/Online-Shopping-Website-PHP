<?php
//session_start();
include('db.php');
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include('detectlogin.php');
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

date_default_timezone_set('Asia/Colombo');
$dateTime = date('Y-m-d H:i:s');

$sql = "INSERT INTO orders ( `userId`, `orderDateTime`, `orderTotal`) VALUES (".$_SESSION['userid'].",'$dateTime',1)";

mysqli_query($conn,$sql);

$maxId = "SELECT MAX(orderNo) as orderNo FROM orders where userId=".$_SESSION['userid'];
$arrayord = mysqli_query($conn,$maxId) or die(mysqli_error());

$maxOrderNo = mysqli_fetch_array($arrayord);
//echo count($maxOrderNo);
$maxOrderNo = $maxOrderNo['orderNo'];
echo '<b>Successful Order</b> - ORDER REFERENCE NO:'.$maxOrderNo;

echo "<table style='border: 0px'>";
	echo "<tr>";
	echo "<th>Product Name</td>";
	echo "<th>price</td>";
	echo "<th>Quantity</td>";
	echo "<th>Sub total</th>";
	$total=0;

if(ISSET ($_SESSION['basket']))
{
	
	
	foreach ($_SESSION['basket'] as  $key => $value)
	{
		
		$SQL="select proId, prodName, prodPrice from Product where proId=".$key;
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
		
		
		$data=mysqli_fetch_array($exeSQL);
		echo "<tr>";
		echo "<td>".$data['prodName']."</td>";//display product name as contained in the array
		echo "<td>&pound;".$data['prodPrice']."</td>";
		echo "<td>".$value."</td>";
		$subTotal = $value*$data['prodPrice'];
		echo "<td>&pound;".$subTotal."</td>";

		
		$product = "INSERT INTO `order_line` (`orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
					($maxOrderNo,$key,$value,$subTotal)";
//		echo $product;
		mysqli_query($conn,$product) or die(mysqli_error($conn));
		$total = $total+$subTotal;
		echo "</tr>";
		
	}
}
echo "<tr>
			<th colspan=3 align='right'>Total</th>
			<th>&pound;$total</th>
			
		</tr>";
echo "</table>";

$update = "UPDATE orders SET orderTotal=$total WHERE userId=".$_SESSION['userid']." AND orderNo=$maxOrderNo";
mysqli_query($conn,$update);

include("footfile.html"); //include head layout
echo "</body>";
?>