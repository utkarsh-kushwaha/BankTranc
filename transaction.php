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
        <form action="transaction.php">
            <table border="2" align="center">
       
        <tr style="background-color: pink" align="center">
            <th>
            Transaction Details
            </th>
        </tr>
        </table>
        <table border="2" align="center">
        <tr>
            <td>
           Enter Amount You Want to withdraw:
        </td>
        
        <td>
        <input type="text" name="text1" value="" />
          </td><br></tr>
        <table border="2" align="center">
            <tr>
        <td> <INPUT Type="submit" VALUE="Deposit" name="ds"> 
   <input type="submit" value="WithDraw" name="wd">
   <input type="button" value="Back" name="home"ONCLICK="window.location.href='home.php' ""/>
   
   <input type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/></td>
   </tr>
        </table>
        </form>
        <?php
        
            session_start();
            $i=$_SESSION['intamt'];

            $conn = new mysqli("35.154.10.91","root","kushwaha", "xtreme");
            $id=$_SESSION['user1'];
            $_SESSION['user']= $conn->query("SELECT ((((SELECT intbalans FROM user WHERE id ='$id') + 
(SELECT COALESCE(SUM(amt),0) FROM  `totaltra` WHERE tratype =  'deposit' AND id ='$id') - 
(SELECT COALESCE( SUM( amt ),0) FROM  `totaltra` WHERE tratype =  'withdraw' AND id ='$id' ))+(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
WHERE 
Toid ='$id'))-(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
WHERE 
Fromid ='$id')) AS tbalance");
            $row = mysqli_fetch_array($_SESSION['user']);
            $tbalance=$row["tbalance"];
		    $_SESSION['user']=$tbalance;
            echo '<table border="2" align="center">';
            echo "<td>Your Last balance is=".$tbalance;

            if(isset($_GET['ds']))
            {
                $depositamt=($_SESSION['user']+$_GET['text1']);
                $enamt=$_GET['text1'];
                $d='deposit';
                $conn->query("INSERT INTO `totaltra`(`id`, `tratype`, `amt`) VALUES ('$id','$d','$enamt')");
                echo '<br>Your Initial balance:'.$i;
                echo '<br>Your Current balance is:','<b>',$depositamt,'</b>';
            }
            if(isset($_GET['wd']))
            {
                 
                $withdraamt=($_SESSION['user']-$_GET['text1']);
                $enamt=$_GET['text1'];
                $_SESSION['user'];
                if($tbalance>=0)
                {
                 //$realwithdraamt=mysql_query("UPDATE user
//SET amt='$withdraamt'
//WHERE username='$user' and password='$pass';");
                    $d='withdraw';
                    $conn->query("INSERT INTO `totaltra`(`id`, `tratype`, `amt`) VALUES ('$id','$d','$enamt')");
                    echo '<br>Your Initial balance:'.$i;
                    echo '<br>Your current Balance is :','<b>',$withdraamt,'</b>';
          //$_SESSION['user']= $withdraamt;
                }
                else
                {
                    echo '<br>Not enough amount balance';
                
                    echo '<br>Please Enter valid amount ';
                }
            
            }
        
        // put your code here
        ?>
    </body>
</html>
