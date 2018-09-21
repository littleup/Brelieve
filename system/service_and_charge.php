<?php
		session_start();
		
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('service_and_charge');
        $xcrud->unset_title();
        $xcrud->relation('full_name','clients','full_name','full_name');
        $xcrud->validation_required('full_name',3);
        $xcrud->change_type('amount_due','price','',array('prefix'=>'$'));
        $xcrud->change_type('service_provided','multiselect','','90791 (Diagnostic Evaluation),90832 (Psychotherapy 30min),90834 (Psychotherapy 45min),90837 (Psychotherapy 60min),90839 (Crisis Therapy 1st 60min),90840 (Crisis Therapy additional 30min),90847 (Family Therapy w/pt. present),90846 (Family Therapy w/o pt. present),90785 (Interactive Add-on)');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Brelieve CRMS</title>
        <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/demo.css">
        <!-- Pushy CSS -->
        <link rel="stylesheet" href="css/pushy.css">
        
        <!-- jQuery -->
        
    </head>
    <body>
    
<?php
    if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
    {
        header("Location:index.php");
    }

 
?>

        <header class="site-header push">Services and Charges</header>

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
			<img src="img/thumbs/money_small.png" width="75" height="75">
			<h2> &nbsp; Services and Charges</h2>
			<br />
			
			<?php
				echo $xcrud->render();
    		?>
            
        </div>

        <footer class="site-footer push">Brelieve Counseling</footer>

        <!-- Pushy JS -->
        <script src="js/pushy.min.js"></script>

    </body>
</html>
