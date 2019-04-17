<?php
session_start();
include("db.php");
$pagename="“Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$email = $_POST['email'];
$password = $_POST['password'];

//echo $email." ".$password;
if(empty($email) || empty($password))
{
	echo "<p><b>Login failed</b></p>";
	echo "<p> Your login form is incomplete<br>
			Make sure you provide all the reqired details<p>";
	echo "<p>Go back to <a href='login.php'>login</a></p>";
}
else
{
	//$email = mysqli_real_escape_string($conn,$email);
	//$password = mysqli_real_escape_string($conn,$password);
	$SQL = "select * from `users` where `userEmail`='$email'";
	//$SQL1 = "SELECT * FROM `users` WHERE `userEmail`='sahandilshan@gmail.com'";
	$result = mysqli_query($conn,$SQL);
	$data = mysqli_fetch_array($result);
	
	if($data['userEmail'] != $email)
	{
		echo "<p><b>Login failed</b></p>";
		echo "<p> The email you entered was not recognized<p>";
		echo "<p>Go back to <a href='login.php'>login</a></p>";
	}
	else if($data['userPassword'] != $password)
	{
		echo "<p><b>Login failed</b></p>";
		echo "<p> The password you entered is not valid<p>";
		echo "<p>Go back to <a href='login.php'>login</a></p>";
	}
	
	else
	{
		 $_SESSION['userid'] = $data['userId'];
		 $_SESSION['usertype'] = $data['userType'];
		 $_SESSION['fname'] = $data['userFName'];
		 $_SESSION['sname'] = $data['userSName'];
		echo "<p><b>Login Success</b></p>";
		echo "<p> Hello, ".$data['userFName']." ".$data['userSName']."<p>";
		if($data['userType']=='C')
		{
			echo "<p> You have successfully logged in as a homteq Customer<p>";
			echo "<p>Continue to shopping for <a href='index.php'>Home Tech</a></p>";
			echo "<p>Go back to <a href='basket.php'>Shopping Cart Page</a></p>";
		}
		
	}
	
	
	
}




include("footfile.html"); //include head layout
echo "</body>";
?>