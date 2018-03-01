<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title></title>
    </head>
    <body><form action="index.php">
  
	  <div class="w3-card-4" style = "width: 40%; margin-left: auto; margin-right: auto;">
	  <div class="w3-container"  align="center">
		<h2  align="center">Registation Details</h2>
		  <form class="w3-container" action="/action_page.php">
				<p>      
					<label class="w3-text-brown"><b>Username</b></label>
					<input type="text" name="uname" value=""  class="w3-input w3-border"></p>
				<p>      
					<label class="w3-text-brown"><b>Password</b></label>
					<input type="password" name="psw" value=""  class="w3-input w3-border"></p>
				<p>      
					<label class="w3-text-brown"><b>Amount</b></label>
					<input type="text" name="amt" value="" class="w3-input w3-border" name="last" type="text"></p>
				<input type="submit" value="Acc. Open." name="act" class="w3-btn w3-brown w3-padding"><br>
					<button  name="login" ONCLICK="window.location.href='login.php'" class="w3-btn w3-brown w3-padding">Login</button></p>
		  </form>
	  </div>
	</div>
    <?php
        if(isset($_GET['act']))
        {
            $conn = new mysqli("35.154.10.91","root","kushwaha", "xtreme");
            if(isset($_GET['act']))
            {
                $Name=$_GET['uname'];
		        $Password=$_GET['psw'];
                $Amt=$_GET['amt'];
	            $conn->query("INSERT INTO `user`(`username`, `password`,intbalans) VALUES('$Name','$Password','$Amt')");
                header("location:login.php");
         
            }
        }
        // put your code here
    ?>
    </body>
</html>
