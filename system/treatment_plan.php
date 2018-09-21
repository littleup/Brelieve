<?php   
		session_start();
		 
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('treatment_plan');
        $xcrud->relation('full_name','clients','full_name','full_name');
        $xcrud->validation_required('full_name',3);
        
        //$xcrud->button('print_report.php?id={id}&table=children_progress_note','client page','icon-print'); 
        
               
        $xcrud->fields('full_name,first_contact_date,first_session_date,identifying_information,presenting_problem,situation_stressors,mental_status_exam,impaired_functioning_symptoms,strenths_and_assets,diagnosis,diagnosis_codes,diagnostic_comments', false, 'Diagnosis');
        $xcrud->fields('treatment_goals,treatment_plans_and_interventions', false, 'Treatment Plan');
                
        $xcrud->columns(array('full_name','first_contact_date','first_session_date','diagnosis_codes'));
         
        //$xcrud->columns(array('full_name','active','enroll_date','city','dob','age','annual_income','session_fee','original_registration_form'));
        //$xcrud->change_type('gender','radio','male','male,female,other');
        //$xcrud->button('byname.php?name={full_name}','client page','icon-drawer'); 
        //$xcrud->change_type('original_registration_form', 'file', '', array('not_rename'=>true,'text'=>'registration form'));
		$xcrud->unset_title();
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

        <header class="site-header push">Diagnosis and Treatment Plan</header>

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
			<img src="img/thumbs/treatment_small.png" width="75" height="75">
			<h2> &nbsp; Diagnosis and Treatment Plan</h2>
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
