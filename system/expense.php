<?php   
		session_start();
		 
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('expense');
        $xcrud->unset_title();
        $xcrud->change_type('type_of_goods','select','','rent,deposit,insurance,fees,software,license,toy,supplies,service,furniture,gift,food,equipment,marketing,stationary,tax,venue,catering,transportation,gas,car,hotel,training and education');
        $xcrud->change_type('receipt', 'file','',array('not_rename'=>true));

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Brelieve Finance System</title>
        <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="../system/css/normalize.css">
        <link rel="stylesheet" href="../system/css/demo.css">
        <!-- Pushy CSS -->
        <link rel="stylesheet" href="../system/css/pushy.css">
        
        <!-- jQuery -->
        <script src="../xcrud/plugins/jquery.min.js"></script>
    
    </head>
    <body>

<?php
    if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
    {
        header("Location:index.php");  
    }

?>


        <header class="site-header push">Expenses</header>

        <!-- Pushy Menu -->
        <?php include('menu.php');?> 

        <!-- Site Overlay -->
        <div class="site-overlay"></div>

        <!-- Your Content -->
		<div id="container">
            <!-- Menu Button -->
            <button class="menu-btn">&#9776; Menu</button>
            
            <span style="float: right">
        	<button class="btn btn-info" onclick="location.href='home.php'">Back to Dashboard</button> 
			</span>
            			
			<br />
			<img src="../system/img/thumbs/money_small.png" width="75" height="75">
			<h2> &nbsp; Expenses</h2>
			<br />
			<?php
        		echo $xcrud->render();
    		?>
    		<form action="chart.php">
  					print out report from
  					<input type="date" name="from"> (excluded)
  					to
  					<input type="date" name="to"> (inclluded)
  					<input type="submit">
  					
			</form>     
        </div>

        <footer class="site-footer push">Brelieve Counseling</footer>

        <!-- Pushy JS -->
        <script src="../system/js/pushy.min.js"></script>

    </body>
</html>
