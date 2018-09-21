<?php   
		session_start();
		 
        include('../xcrud/xcrud.php');
        $xcrud = Xcrud::get_instance();
        $xcrud->table('children_progress_note');
        $xcrud->relation('full_name','clients','full_name','full_name');
        $xcrud->validation_required('full_name',3);
        
        $xcrud->button('print_report.php?id={id}&table=children_progress_note','print report','glyphicon glyphicon-print'); 
        
        $xcrud->change_type('activity_sheets', 'file','',array('not_rename'=>true));  
        $xcrud->change_type('interventions', 'multiselect','','provided support,rapport-building,CBT,self-esteem building,psychoeducational,systems work,interpersonal process,therapist-client relationship,inter-relational,DBT,exposure,process,trauma work,insight,interpretation,dream analysis,confrontation of resistance,discussion of family of origin,solution focus,other');
        $xcrud->change_type('client_response_to_interventions','multiselect','','open,responsive,fearful,resistant,angry,tearful,quiet,other');
        $xcrud->change_type('physiological_signs','multiselect','','relaxed,restless,tearful,tense posture,agitated,decreased motor activity');
        $xcrud->change_type('manner_and_attitude','multiselect','','accessible,evasive,defensive,euphoric,suspicious,irritable,guarded,frightened,aggressive,optimistic,passive,resentful');
        $xcrud->change_type('orientation','multiselect','','time,place,person,situation');
        $xcrud->change_type('verbal','multiselect','','answers appropriate,rambling,detailed,circumstantial,repetitive,slow,rapid');
        $xcrud->change_type('thought_content','multiselect','','normal,hallucinations,delusions,obsessions,ruminating,flight of ideas');
        $xcrud->change_type('homeworks_given','multiselect','','bibliotherapy,journal,practice changing self-talk,practice target behaviors,reach out for support,exposure work');
        
        $xcrud->fields('full_name,session_number,session_date,time_started,time_finished,type_of_counseling,diagnosis,change_in_diagnosis,change_details,symptoms_topics_stressors_goals,interventions,other_interventions,client_response_to_interventions,other_response,functioning_or_participation_motivation,participation_comment,current_treatment_is_effective,goal_and_plan_for_next_few_sessions,homeworks_given,other_homework', false, 'Note');
        $xcrud->fields('suicide_risk,homicide_violence_risk,a_and_d_use,critical_assessment_details', false, 'Critical Assessments');
        $xcrud->fields('appearance,other_comment_on_appearance,physiological_signs,manner_and_attitude,other_comment_on_manner_attitude,orientation,verbal,thought_content', false, 'Mental Status Exam');
        $xcrud->fields('activity_sheets', false, 'Activity Sheets');
        
        $xcrud->columns(array('full_name','session_number','session_date','type_of_counseling','activity_sheets'));
         
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

        <header class="site-header push">Children Progress Notes</header>

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
			<h2> &nbsp; Children Progress Notes</h2>
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
