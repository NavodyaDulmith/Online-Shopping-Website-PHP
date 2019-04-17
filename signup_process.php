<?php
session_start();
include("db.php");
$pagename="Your Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$isEmpty = empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['address']) 
            || empty($_POST['postcode']) || empty($_POST['telNo']) || empty($_POST['email'])
            || empty($_POST['password']) || empty($_POST['conPassword']) ;

// echo "<p>value :=$isEmpty</p>";

if(!$isEmpty)
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $postcode=$_POST['postcode'];
    $telNo=$_POST['telNo'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conPassword=$_POST['conPassword'];
    
    // echo "$fname,$lname,$address,$postcode,$telNo,$email,$password"; 
    
    if($password===$conPassword)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            $query="insert into `users` (`userFName`,`userSName`, `userAddress`, `userPostcode`, `userTelNo`, `userEmail`, `userPassword`) 
            VALUES ('$fname','$lname','$address','$postcode','$telNo','$email','$password')";

            if(mysqli_query($conn, $query))
            {
                echo "<p>Sign-up successful</p>";
                echo "To cintinue,Please <a href='login.php'>login</a>";
            }
            else
            {
                $errNo = mysqli_errno($conn);
                if($errNo == 1062)
                {
                    echo "<p><b>Sign-up failed</b></p>";
                    echo "<p>Email already in use.<br>
                    You may be already registered or try another email address.</p>
                    Go back to <a href='signup.php'>Sign up</a> .";
                }
                else if($errNo==1064)
                {
                    echo "<p><b>Sign-up failed</b></p>";
                    echo "<p>Invalid characters enterd in the form.<br>
                    Make sure you avoid the following characters: apostrophes like['] and backslashes[\].</p>
                    Go back to <a href='signup.php'>Sign up</a> .";
                }
            }
            // $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
            // echo $result;
        }
        else {
            echo "<p><b>Sign-up failed</b></p>";
            echo "<p>Email not vlaid.<br>
            Make sure you enter a correct email address.</p>
            Go back to <a href='signup.php'>Sign up</a> .";
        }
        
    
    }
    else
    {
        echo "<p><b>Sign-up failed</b></p>";
        echo "<p>The 2 passwords are not matching.<br>
            make sure you entered them correctly.</p>
        Go back to <a href='signup.php'>Sign up</a> .";
    }
    
    
    
}
else
{
    echo "<p><b>Sign-up failed</b></p>";
    echo "<p>Your signup form is incomplete and all fields are mandatory<br>
            Make sure you provide all the required details.</p>
        Go back to <a href='signup.php'>Sign up</a> .";
}


include("footfile.html"); //include head layout
echo "</body>";
?>