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
    <body>
        <form action="Deposit.php">
          Enter Amount You Want To Deposit:  <input type="text" name="text1" value="" />
            <br><input type="submit" value="Sumbit" name="dps" /><br>
            <input type="button" value="Back To Home Page" name="home"ONCLICK="window.location.href='home.php' ""/>
            <input type="BUTTON" value="WithDraw" name="wd">
            <input type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/>
        </form>
        <?php
            session_start();
		    echo 'Your Balance :',$_SESSION['user'];

            $id=$_SESSION['user1'];
            $conn = new mysqli("xtreme.ceazc8sfrkye.ap-south-1.rds.amazonaws.com","root","kushwaha", "xtreme");
            
            if(isset($_GET['dps']))
            {
                $depositamt=($_SESSION['user']+$_GET['text1']);
                $_SESSION['user']=$depositamt;
                $enamt=$_GET['text1'];
                echo $enamt;
                echo $id;
                $d='deposit';
                $conn->query("INSERT INTO `totaltra`(`id`, `tratype`, `amt`) VALUES ('$id','$d','$enamt')");
            //$intbl=  mysql_query("SELECT intbalans FROM `user` WHERE username='$user' and password='$pass'");
           // echo $intbl;
                echo '<br>Your Balance is:','<b>',$depositamt,'</b>';
            
            }
            if(isset($_GET['wd']))
            {
                $withdraamt=($_SESSION['user']-$_GET['text2']);
                if($withdraamt>=0)
                {
                    $realwithdraamt= $conn->query("UPDATE user SET amt='$withdraamt'
WHERE username='$user' and password='$pass';");
           
                    echo '<br>Your Balance is :','<b>',$withdraamt,'</b>';
                    $_SESSION['user']= $withdraamt;
                }
                else
                {
                    echo '<br>Not enough Balance';
                
                    echo '<br>Please Enter valid amount';
                }
            
            }
        ?>
    </body>
</html>
