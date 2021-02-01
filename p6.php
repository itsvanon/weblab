<html>
    <head><title>Program 6</title></head>
    <body>
        <h2>Welcome to my webpage</h2>
        <?php 
            session_start(); 
            if(isset($_SESSION['v'])) 
	            $_SESSION['v'] = $_SESSION['v']+1; 
            else
	            $_SESSION['v']=1; 	
            echo"<p class='visitor'>Visitors</p>".$_SESSION['v']; 
        ?>
    </body>
</html> 