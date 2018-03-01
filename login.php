<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <title></title>
    </head>
    <body>
        <form action="login.php">
        

	  <div class="w3-card-4" style = "width: 40%; margin-left: auto; margin-right: auto;">
	  <div class="w3-container"  align="center">
		<h2  align="center">Login Details</h2>
		  <form class="w3-container" action="/action_page.php">
				<p>      
					<label class="w3-text-brown"><b>Username</b></label>
					<input type="text" name="uname" value=""  class="w3-input w3-border"></p>
				<p>      
					<label class="w3-text-brown"><b>Password</b></label>
					<input type="password" name="psw" value=""  class="w3-input w3-border"></p>
				<input type="submit" value="Login" name="lgn" class="w3-brown w3-padding"><br>



        <table border="2" align="center">
       
        <!--
        <tr style="background-color: red" align="center">
            <th>
            Login Details
            </th>
        </tr>
        
        <table border="2" align="center">
       
       
        <tr style="background-color: pink" align="center"><td> Username:</td><td><input type="text" name="uname" value="" /><br>
        <tr style="background-color: pink" align="center">
        <td> Password:</td><td><input type="password" name="psw" value="" /><br>
        </tr>
        <td>
           <input type="submit" value="Login" name="lgn" />
           </td>
          -->
           
        </form>
        <?php
        session_start();
        if(isset($_GET['lgn']))
        {
            if((isset($_GET['uname']))=='' && (isset ($_GET['psw']))=='')
            {
                echo '<br>Plz Enter Value  <br> ';
            }
            else if($_GET['uname']=='' && $_GET['psw']=='')
            {
                echo '<br><td>Plz Enter Value 1  <br> ';
            }
                else if($_GET['uname'] && $_GET['psw']=='')
            {
                echo '<br><td>Plz Enter Value 2  <br> ';
            }
            else
            {
            $conn = new mysqli("35.154.10.91","root","kushwaha", "xtreme");
	
                $user=$_GET['uname'];
                $pass=$_GET['psw'];
                $_SESSION['login']=$user;
                $_SESSION['login1']=$pass;
            
	
                $Login= $conn->query("SELECT * FROM `user` WHERE username='$user' and password='$pass'");
                $count1= mysqli_num_rows($Login);
                $Amt1=  $conn->query("SELECT intbalans,id FROM user where username='$user' and password='$pass'");
                while($row=  mysqli_fetch_array($Amt1))
                {
                    echo 'Your Balance : ';
                    echo $row['intbalans'];
          
                    echo '<br>',$row['id'];
                    $_SESSION['user']=$row['intbalans'];
                    $_SESSION['user1']=$row['id'];
                    //$_SESSION['intamt']=$_SESSION['user'];
                    $_SESSION['intamt']=$row['intbalans'];
        
                }
 
                if($count1>0)
	            {
		
	        	// $_SESSION['user']=$Amt1;
                    header('location:home.php');
                
               
                }
                else
                {
                    echo "<td>login Faild" ;
                }
        
            }
        }
        // put your code here
    ?>
        
    </body>
</html>
