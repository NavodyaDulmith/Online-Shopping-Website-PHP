<?php
//session_start();
	
	if(ISSET($_SESSION['userid']))
	{
		$fname = $_SESSION['fname'];
		$sname = $_SESSION['sname'];
		$userType;
		if($_SESSION['usertype']=='C')
			$userType = 'Customer';
		else
			$userType = 'Administrator';
		$userid = $_SESSION['userid'];
		
		echo "<div style='text-align: right;'><i>
				 $fname $sname / $userType No :$userid </i></div>";
	}

?>