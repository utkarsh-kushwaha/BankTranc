<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <form action="withdraw.php">
        Enter Amount you want to withdraw:  <input type="text" name="text2" value="" /><br>
        <input type="submit" value="Submit" name="wtd" /><br>
        <input type="button" value="Back TO Home Page" name="home"ONCLICK="window.location.href='home.php' ""/>
        
    </form>
    <body>
        <?php
        session_start();
		echo 'Your Balance :'.$_SESSION['user'];
              
            $user=$_SESSION['login'];
            $pass=$_SESSION['login1'];

            $conn = new mysqli("35.154.10.91","root","kushwaha", "xtreme");
            
            if(isset($_GET['wtd']))
            {
                $withdraamt=($_SESSION['user']-$_GET['text2']);
                if($withdraamt>=0)
                {
                    $realwithdraamt= $conn->query("UPDATE user SET amt='$withdraamt' WHERE username='$user' and password='$pass';");
           
                    echo '<br>Your Balance is :','<b>',$withdraamt,'</b>';
                    $_SESSION['user']= $withdraamt;
                }
                else
                {
                    echo '<br>Not enough balance';
                
                    echo '<br>Please Enter valid amt:';
                }
            
            }
        // put your code here
        ?>
    </body>
</html>
