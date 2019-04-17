<?php
session_start();
$pagename="Smart Basket"; 
include("db.php");
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>"; 
echo "<body>";
include ("headfile.html"); 
echo "<h4>".$pagename."</h4>";

if (ISSET($_POST['rem_prodId']))
{
	$delprodid=$_POST['rem_prodId'];
	// echo $delprodid;
	unset($_SESSION['basket'][$delprodid]);
	echo "1 item removed from the basket";
}


if(ISSET($_POST['h_prodid']))
{
	echo "<p>1 item added to the basket</p>";
	$newprodid=$_POST['h_prodid'];
	$reququantity = $_POST['p_quantity'];
	
	//create a new cell in the basket session array. Index this cell with the new product id.
	//Inside the cell store the required product quantity
	$_SESSION['basket'][$newprodid]=$reququantity;

	
}
else
{
	// if (!(ISSET($_POST['rem_prodId'])))
	// {
		echo "<p>Current basket unchanged</p>";
	// }
}

echo "<table style='border: 0px'>";
	echo "<tr>";
	echo "<th>Product Name</td>";
	echo "<th>price</td>";
	echo "<th>Quantity</td>";
	echo "<th>Sub total</td><td>&nbsp;</td></tr>";
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
		echo "<td>&pound;".$value*$data['prodPrice']."</td>";

		echo "<td>
		<form action=basket.php method=POST>
			<input type=hidden name='rem_prodId' value=$key>
			<input type=submit value='Remove'>
		</form>
		</td>";

		$total = $total+( $value*$data['prodPrice']);
		echo "</tr>";
		
	}
	

		
	}
	
else
{
	echo "Empty basket";
}
echo "<tr>
			<th colspan=3 align='right'>Total</th>
			<th>&pound;$total</th>
			<td>&nbsp;</td>
		</tr>";
echo "</table>";

echo "<p><a href='clearbasket.php'>CLEAR BASKET</a>";
echo "<p></p>";
echo "<p>New homteq customers :<a href='#'>Sign up</a>";
echo "<p>Returning homteq customers :<a href='#'>Login</a>";
include("footfile.html"); //include head layout
echo "</body>";
?>
