<?php
session_start();
$pagename="Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
?>
<form action="login_process.php" method="POST">
<table style="border:none">
    <tr >
        <td style="border:none;">*Email</td>
        <td style="border:none;"><input type="text" name="email">
    </tr>
    
    <tr >
        <td style="border:none;">*Password</td>
        <td style="border:none;"><input type="password" name="password">
    </tr>
    

    <tr>
        <td style="border:none;"><input  type="submit" value="Login"></td>
        <td style="border:none;"><input type="reset" value="Clear Form"></td>
    </tr>
</table>

    
</table>
</form>


<?php
include("footfile.html"); //include head layout
echo "</body>";
?>