<?php
		session_start();
		 
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('clients');
        $xcrud->columns(array('full_name','other_name_used','active','enroll_date','city','dob','age','annual_income','session_fee','payment_type'));
        //$xcrud->change_type('gender','radio','male','male,female,other');
        $xcrud->button('byname.php?name={full_name}','client page','glyphicon glyphicon-file');
        $xcrud->change_type('annual_income','price','',array('prefix'=>'$'));
        $xcrud->change_type('session_fee','price','',array('prefix'=>'$'));
        
        $xcrud->validation_required('enroll_date',1);
        $xcrud->validation_required('full_name',1);
        $xcrud->validation_required('address',1);
        $xcrud->validation_required('city',1);
        $xcrud->validation_required('state',1);
        $xcrud->validation_required('zip',1);
        $xcrud->validation_required('phone',1);
        //$xcrud->validation_required('email',1);
        $xcrud->validation_required('dob',1);
        $xcrud->validation_required('annual_income');
        $xcrud->validation_required('session_fee');
        
        //$xcrud->validation_pattern('city', 'alpha');
        $xcrud->validation_pattern('state', 'alpha');
        $xcrud->validation_pattern('zip', 'integer');
        $xcrud->validation_pattern('phone', 'alpha_dash');
        $xcrud->validation_pattern('email', 'email');
        //$xcrud->validation_pattern('annual_income', 'integer');
        //$xcrud->validation_pattern('session_fee', 'integer');
        
        $xcrud->change_type('original_registration_form', 'file', '', array('not_rename'=>true,'text'=>'registration form'));
		$xcrud->unset_title();
		$xcrud->unset_remove();
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

        <header class="site-header push">Client List</header>

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
			<img src="img/thumbs/people_file.png" width="75" height="75">
			<h2> &nbsp; Client List</h2>
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
