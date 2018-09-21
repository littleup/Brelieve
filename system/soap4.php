<?php   
		session_start();
		
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('soap4');
        $xcrud->unset_title();
        $xcrud->relation('full_name','clients','full_name','full_name');
        $xcrud->validation_required('full_name',3);
        $xcrud->change_type('activity_sheets', 'file','',array('not_rename'=>true));  
        $xcrud->columns('full_name,date,session_number,location,type_of_session,activity_sheets');                 
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

        <header class="site-header push">STEP Notes</header>

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
			<img src="img/thumbs/notes_small.png" width="75" height="75">
			<h2> &nbsp; SOAP Notes</h2>
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
