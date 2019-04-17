<?php
session_start();
$pagename="Add a New Product"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
?>
<form action="addprodcut_conf.php" method="POST">
<table style="border:none">
    <tr >
        <td>*Product Name</td>
		<td><input type="text" size="40" name="prodName"></td>
    </tr>
    
    <tr >
        <td>*Small Picture Name</td>
		<td><input type="text" size="40" name="smallPicName"></td>
    </tr>
	
	<tr >
        <td>*Large Picture Name</td>
		<td><input type="text" size="40" name="largePicName"></td>
    </tr>
	
	<tr >
        <td>*Short Description</td>
		<td><input type="text" size="40" name="shortDesc"></td>
    </tr>
	
	<tr >
        <td>*Long Description</td>
		<td><input type="text" size="40" name="longDesc"></td>
    </tr>
	
	<tr >
        <td>*Price</td>
		<td><input type="text" size="40" name="price"></td>
    </tr>
	
	<tr >
        <td>*Initial Stock Quantity</td>
		<td><input type="text" size="40" name="qty"></td>
    </tr>
    

    <tr>
        <td><input  type="submit" value="Add Product"></td>
       <td><input type="reset" value="Clear Form"></td>
    </tr>
</table>

</form>


<?php
include("footfile.html"); //include head layout
echo "</body>";
?>