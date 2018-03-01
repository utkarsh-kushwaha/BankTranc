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
        <form action="transfer.php">
            <table border="2" align="center">
       
        <tr style="background-color: red" align="center">
            <th>
            Transfer Details
            </th>
        </tr>
            </table>
        <table border="2" align="center">
            <tr style="background-color: pink" align="center"><td>
            Enter Receiver Id:<input type="text" name="text1" value="" /></tr>
           <tr style="background-color: pink" align="center">
            <td>Enter Your Amount : <input type="text" name="text2" value="" /><br>
           </td> </tr>
        <tr style="background-color: pink" align="center"><td>
            <input type="submit" value="Transfer" name="tnf" />
            <input type="button" value="Back" name="home"ONCLICK="window.location.href='home.php' ""/>
   
            <input type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/>
   </td></tr>
            
        </form>
        <?php
        session_start();
          $id=$_SESSION['user1'];
        if(isset($_GET['tnf']))
        {
            $aid=$_GET['text1'];
            $aamt=$_GET['text2'];
            $conn = new mysqli("xtreme.ceazc8sfrkye.ap-south-1.rds.amazonaws.com","root","kushwaha", "xtreme");
            //$x=mysql_query("SELECT ((SELECT intbalans FROM user WHERE id ='$id') + (SELECT COALESCE(SUM(amt),0) FROM  `totaltra` WHERE tratype =  'deposit' AND id ='$id') - ( SELECT COALESCE( SUM( amt ),0) FROM  `totaltra` WHERE tratype =  'withdraw' AND id ='$id' )) AS tbalance");
            $result = $conn->query("SELECT `id` FROM `user` WHERE id='$aid'");
            if(mysqli_num_rows($result) == 0) {
                echo '<td>Account No. Not Valid';
            } else
            {
                $conn->query("INSERT INTO `transfer`(`Toid`, `Fromid`, `amt`) VALUES ('$aid','$id','$aamt')");
                echo '<td>SuccessFully Transferred ';
                echo $aamt;
    // do other stuff...
            }
        }
        // put your code here
        ?>
    </body>
</html>
