<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>  body {
        background-color: #d0e4fe;
    }
u
{
    color: purple;
}
h2 {
    text-align: center;
}
        </style>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>
    </head>
<body>
    
    <form action="home.php">
    	<div class="w3-bar w3-border w3-card-4 w3-light-grey">
		    <input class="w3-bar-item w3-button w3-padding-24" type="submit" value="Transaction" name="trn" />
		    <input class="w3-bar-item w3-button w3-padding-24" type="button" value="Transfer Amount" name="home"ONCLICK="window.location.href='transfer.php' ""/>
	   
		    <input class="w3-bar-item w3-button w3-padding-24" type="submit" value="All Transaction" name="trs" />
		    <input class="w3-bar-item w3-button w3-padding-24" type="submit" value="All Transfer" name="tf" />
		    <input class="w3-bar-item w3-button w3-padding-24" type="submit" value="demo" name="demo" />
	   
		    <input class="w3-bar-item w3-button w3-padding-24" type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/>
	   </div>
	   
			    
    </form>
    <?php
        session_start();
            $conn = new mysqli("35.154.10.91","root","kushwaha", "xtreme");
        $id=$_SESSION['user1']; 

        $bb= $conn->query("SELECT  `intbalans` FROM `user` where id='$id'");
        while($row=  mysqli_fetch_array($bb))
        {
            echo '<h2 class="" align="center">Your Initial Balance : ';
            echo $row['intbalans'] + '</h2>';
        }

        $z= $conn->query("SELECT ((((SELECT intbalans FROM user WHERE id ='$id') + 
        (SELECT COALESCE(SUM(amt),0) FROM  `totaltra` WHERE tratype =  'deposit' AND id ='$id') - 
        (SELECT COALESCE( SUM( amt ),0) FROM  `totaltra` WHERE tratype =  'withdraw' AND id ='$id' ))+(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
          WHERE 
        Toid ='$id'))-(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
        WHERE 
        Fromid ='$id')) AS tbalance");
          
        $row = mysqli_fetch_array($z);
        $tbalance=$row["tbalance"];
		$_SESSION['z']=$row["tbalance"];
            echo '<h2 align="center">';
            echo "Your Last balance is = ".$tbalance;
                
        if(isset($_GET["trn"]))
        {
            header("location:transaction.php");
        }
        if(isset($_GET["demo"]))
        {
            header("location:Realbalance.php");
        }
        if(isset($_GET["tf"]))
        {
            header("location:totaltransfer.php");
        }
           if(isset($_GET["trs"]))
        {
            header("location:totaltra.php");
        }
        
           // session_destroy();
       
// put your code here
        ?>
    </body>
</html>
