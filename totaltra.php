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
    <body><form action="totaltra.php">
            <table border="2" align="auto">
                
           <tr><td> 
                   <input type="button" value="Back" name="home"ONCLICK="window.location.href='home.php' ""/>
   <input type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/>
   </table>
        </form>
        <?php
         session_start();
        
      
        
	       $id=$_SESSION['user1'];
            $conn = new mysqli("xtreme.ceazc8sfrkye.ap-south-1.rds.amazonaws.com","root","kushwaha", "xtreme");
            $total=  $conn->query("SELECT `tratype`, `amt`, `id` FROM `totaltra` WHERE id='$id'");

          
echo '</br>';
        echo '<table border="2" align="center">';
       
        echo '<tr style="background-color: red">';
        echo '<td>Your Total Transaction: <br></td>';
        echo '<tr style="background-color: pink"><td>';
        echo 'Deposit/Withdraw';
        echo '</td>';

        echo '<td>';
        echo 'Amount';
        echo '</td>';


        echo '</tr>';           
while($row=  mysqli_fetch_array($total))
           {
                echo '<tr>';
           

            echo '<td>';
            echo $row['tratype'];
            echo '</td>';

            echo '<td>';
            echo $row['amt'];
            echo '</td>';


            echo '</tr>';
                
                
                
              
           }
// put your code here
        ?>
    </body>
</html>
