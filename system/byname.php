<?php
		session_start();
 
        include('../xcrud/xcrud.php');
                                
        $xcrud = Xcrud::get_instance();
        $xcrud_informed_consent = Xcrud::get_instance();
        $xcrud_soap = Xcrud::get_instance();
		$xcrud_soap4 = Xcrud::get_instance();
        $xcrud_nonCounseling = Xcrud::get_instance();
        $xcrud_treatment_update = Xcrud::get_instance();
        //$xcrud_activitySheets = Xcrud::get_instance();
        $xcrud_terminationSummary = Xcrud::get_instance();
        $xcrud_childrenProgress = Xcrud::get_instance();
        $xcrud_superbills = Xcrud::get_instance();
        $xcrud_service_and_charge = Xcrud::get_instance();
        $xcrud_treatmentPlan = Xcrud::get_instance();
        $xcrud_invoice = Xcrud::get_instance();

        
        $xcrud->table('intake');
        $xcrud_informed_consent->table('informed_consent');
        $xcrud_soap->table('soap');
		$xcrud_soap4->table('soap4');
        $xcrud_nonCounseling->table('non_counseling_activity');
        $xcrud_treatment_update->table('treatment_update');
        //$xcrud_activitySheets->table('activity_sheets');
        $xcrud_terminationSummary->table('termination_summary');
        $xcrud_childrenProgress->table('children_progress_note');
        $xcrud_superbills->table('superbills');
        $xcrud_service_and_charge->table('service_and_charge');
        $xcrud_treatmentPlan->table('treatment_plan');
	$xcrud_invoice->table('invoice');


	$xcrud_soap->order_by('id','desc');
	$xcrud_soap4->order_by('id','desc');
	//$xcrud_treatmentPlan->order_by('id','desc');
	$xcrud_nonCounseling->order_by('id','desc');
	$xcrud_treatment_update->order_by('id','desc');
	$xcrud_childrenProgress->order_by('id','desc');
	$xcrud_service_and_charge->order_by('id','desc');


        
        $xcrud->validation_required('full_name',1);
        $xcrud_informed_consent->validation_required('full_name',1);
        $xcrud_soap->validation_required('full_name',1);
		$xcrud_soap4->validation_required('full_name',1);
        $xcrud_nonCounseling->validation_required('full_name',1);
        $xcrud_treatment_update->validation_required('full_name',1);
        //$xcrud_activitySheets->validation_required('full_name',1);
        $xcrud_terminationSummary->validation_required('full_name',1);
        $xcrud_childrenProgress->validation_required('full_name',1);
        $xcrud_superbills->validation_required('full_name',1);
        $xcrud_service_and_charge->validation_required('full_name',1);
        $xcrud_treatmentPlan->validation_required('full_name',1);
        $xcrud_invoice->validation_required('full_name',1);
        
        $xcrud->validation_required('file_name',1);
        $xcrud_informed_consent->validation_required('file_name',1);
        $xcrud_terminationSummary->validation_required('file_name',1);
        $xcrud_superbills->validation_required('file_name',1);
        $xcrud_invoice->validation_required('file_name',1);

               
        $xcrud->where('full_name =', $_GET['name']);
        $xcrud_informed_consent->where('full_name =', $_GET['name']);
        $xcrud_soap->where('full_name =', $_GET['name']);
		$xcrud_soap4->where('full_name =', $_GET['name']);
        $xcrud_nonCounseling->where('full_name =', $_GET['name']);
        $xcrud_treatment_update->where('full_name =', $_GET['name']);
        //$xcrud_activitySheets->where('full_name =', $_GET['name']);
        $xcrud_terminationSummary->where('full_name =', $_GET['name']);
        $xcrud_childrenProgress->where('full_name =', $_GET['name']);
        $xcrud_superbills->where('full_name =', $_GET['name']);
        $xcrud_service_and_charge->where('full_name =', $_GET['name']);
        $xcrud_treatmentPlan->where('full_name =', $_GET['name']);
        $xcrud_invoice->where('full_name =', $_GET['name']);
       
        $xcrud->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_informed_consent->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_soap->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
		$xcrud_soap4->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_nonCounseling->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_treatment_update->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        //$xcrud_activitySheets->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_terminationSummary->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_childrenProgress->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_superbills->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_service_and_charge->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
        $xcrud_treatmentPlan->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));
	$xcrud_invoice->relation('full_name','clients','full_name','full_name',array('full_name' => $_GET['name']));

        //$xcrud_soap->modal('client_description,subjective_complaint,objective_findings,assessment_of_progress,assessment_of_progress,plans_for_next_session,needs_for_supervision');
        //$xcrud_soap->column_cut(500,'client_description');
        
        $xcrud->change_type('file_name', 'file','',array('not_rename'=>true));
        $xcrud_informed_consent->change_type('file_name', 'file','',array('not_rename'=>true));
        //$xcrud_activitySheets->change_type('file_name', 'file','',array('not_rename'=>true));
        $xcrud_terminationSummary->change_type('file_name', 'file','',array('not_rename'=>true));
        $xcrud_superbills->change_type('file_name', 'file','',array('not_rename'=>true));
        $xcrud_service_and_charge->change_type('amount_due','price','',array('prefix'=>'$'));
        $xcrud_soap->change_type('activity_sheets', 'file','',array('not_rename'=>true));
		$xcrud_soap4->change_type('activity_sheets', 'file','',array('not_rename'=>true));
        $xcrud_childrenProgress->change_type('activity_sheets', 'file','',array('not_rename'=>true));
        $xcrud_invoice->change_type('file_name', 'file','',array('not_rename'=>true));
                      
        $xcrud->columns(array('file_name'));
        $xcrud_informed_consent->columns(array('file_name'));
        $xcrud_soap->columns(array('date','time','session_number','length_of_session','type_of_session','cpt_code','evaluation_and_assessment','activity_sheets'));
        $xcrud_soap4->columns(array('date','session_number','type_of_session','activity_sheets'));
		$xcrud_nonCounseling->columns(array('date','time','person_contacted','contact_count','notes'));
        $xcrud_treatment_update->columns(array('date','treatment_update'));
        //$xcrud_activitySheets->columns(array('file_name'));
        $xcrud_terminationSummary->columns(array('file_name'));
        $xcrud_superbills->columns(array('file_name'));
        $xcrud_childrenProgress->columns(array('session_number','session_date','type_of_counseling','activity_sheets'));
        $xcrud_service_and_charge->columns(array('paid','amount_due','session_number','session_date','service_provided','duration','note'));
        $xcrud_treatmentPlan->columns(array('full_name','first_contact_date','first_session_date','diagnosis_codes'));
        $xcrud_invoice->columns(array('invoice_number','file_name','paid'));
        
        $xcrud_childrenProgress->button('print_report.php?session_number={session_number}&name={full_name}&table=children_progress_note','print report','glyphicon glyphicon-print','',array('target'=>'_blank'));
        $xcrud_soap->button('print_STEP_report.php?session_number={session_number}&name={full_name}&table=soap','print report','glyphicon glyphicon-print','',array('target'=>'_blank'));
		
        $xcrud_childrenProgress->change_type('interventions', 'multiselect','','provided support,rapport-building,CBT,self-esteem building,psychoeducational,systems work,interpersonal process,therapist-client relationship,inter-relational,DBT,exposure,process,trauma work,insight,interpretation,dream analysis,confrontation of resistance,discussion of family of origin,solution focus,other');
        $xcrud_childrenProgress->change_type('client_response_to_interventions','multiselect','','open,responsive,fearful,resistant,angry,tearful,quiet,other');
        $xcrud_childrenProgress->change_type('physiological_signs','multiselect','','relaxed,restless,tearful,tense posture,agitated,decreased motor activity');
        $xcrud_childrenProgress->change_type('manner_and_attitude','multiselect','','accessible,evasive,defensive,euphoric,suspicious,irritable,guarded,frightened,aggressive,optimistic,passive,resentful');
        $xcrud_childrenProgress->change_type('orientation','multiselect','','time,place,person,situation');
        $xcrud_childrenProgress->change_type('verbal','multiselect','','answers appropriate,rambling,detailed,circumstantial,repetitive,slow,rapid');
        $xcrud_childrenProgress->change_type('thought_content','multiselect','','normal,hallucinations,delusions,obsessions,ruminating,flight of ideas');
        $xcrud_childrenProgress->change_type('homeworks_given','multiselect','','bibliotherapy,journal,practice changing self-talk,practice target behaviors,reach out for support,exposure work');
        
        $xcrud_childrenProgress->fields('full_name,session_number,session_date,time_started,time_finished,type_of_counseling,diagnosis,change_in_diagnosis,change_details,symptoms_topics_stressors_goals,interventions,other_interventions,client_response_to_interventions,other_response,functioning_or_participation_motivation,participation_comment,current_treatment_is_effective,goal_and_plan_for_next_few_sessions,homeworks_given,other_homework', false, 'Note');
        $xcrud_childrenProgress->fields('suicide_risk,homicide_violence_risk,a_and_d_use,critical_assessment_details', false, 'Critical Assessments');
        $xcrud_childrenProgress->fields('appearance,other_comment_on_appearance,physiological_signs,manner_and_attitude,other_comment_on_manner_attitude,orientation,verbal,thought_content', false, 'Mental Status Exam');
        $xcrud_childrenProgress->fields('activity_sheets', false, 'Activity Sheets');

        $xcrud_treatmentPlan->fields('full_name,first_contact_date,first_session_date,identifying_information,presenting_problem,situation_stressors,mental_status_exam,impaired_functioning_symptoms,strenths_and_assets,diagnosis,diagnosis_codes,diagnostic_comments', false, 'Diagnosis');
        $xcrud_treatmentPlan->fields('treatment_goals,treatment_plans_and_interventions', false, 'Treatment Plan');


        $xcrud_service_and_charge->change_type('service_provided','multiselect','','90791 (Diagnostic Evaluation),90832 (Psychotherapy 30min),90834 (Psychotherapy 45min),90837 (Psychotherapy 60min),90839 (Crisis Therapy 1st 60min),90840 (Crisis Therapy additional 30min),90847 (Family Therapy w/pt. present),90846 (Family Therapy w/o pt. present),90875 (Interactive Add-on)');
        
        
        $xcrud->unset_view();
        $xcrud_informed_consent->unset_view();
        //$xcrud_activitySheets->unset_view();
        $xcrud_terminationSummary->unset_view();
        $xcrud_superbills->unset_view();
        $xcrud_invoice->unset_view();


        $xcrud->unset_csv();
        $xcrud_informed_consent->unset_csv();
        $xcrud_soap->unset_csv();
		$xcrud_soap4->unset_csv();
        $xcrud_nonCounseling->unset_csv();
        $xcrud_treatment_update->unset_csv();
        //$xcrud_activitySheets->unset_csv();
        $xcrud_terminationSummary->unset_csv();
        $xcrud_childrenProgress->unset_csv();
        $xcrud_superbills->unset_csv();
        $xcrud_service_and_charge->unset_csv();
        $xcrud_treatmentPlan->unset_csv();
        $xcrud_invoice->unset_csv();

        $xcrud->unset_print();
        $xcrud_informed_consent->unset_print();
        $xcrud_soap->unset_print();
		$xcrud_soap4->unset_print();
        $xcrud_nonCounseling->unset_print();
        //$xcrud_activitySheets->unset_print();
        $xcrud_terminationSummary->unset_print();
        $xcrud_childrenProgress->unset_print();
        $xcrud_superbills->unset_print();
        $xcrud_service_and_charge->unset_print();
        $xcrud_treatmentPlan->unset_print();
        $xcrud_invoice->unset_print();
        
        $xcrud->unset_search();
        $xcrud_informed_consent->unset_search();
        $xcrud_soap->unset_search();
		$xcrud_soap4->unset_search();
        $xcrud_nonCounseling->unset_search();
        $xcrud_treatment_update->unset_search();
        //$xcrud_activitySheets->unset_search();
        $xcrud_terminationSummary->unset_search();
        $xcrud_childrenProgress->unset_search();
        $xcrud_superbills->unset_search();
        $xcrud_service_and_charge->unset_search();
        $xcrud_treatmentPlan->unset_search();
        $xcrud_invoice->unset_search();
        
        $xcrud->unset_title();
        $xcrud_informed_consent->unset_title();
        $xcrud_soap->unset_title();
		$xcrud_soap4->unset_title();
        $xcrud_nonCounseling->unset_title();
        $xcrud_treatment_update->unset_title();
        //$xcrud_activitySheets->unset_title();
        $xcrud_terminationSummary->unset_title();
        $xcrud_childrenProgress->unset_title();
        $xcrud_superbills->unset_title();
        $xcrud_service_and_charge->unset_title();
        $xcrud_treatmentPlan->unset_title();
        $xcrud_invoice->unset_title();
        
        $xcrud->unset_numbers();
        $xcrud_informed_consent->unset_numbers();
        $xcrud_terminationSummary->unset_numbers();
        $xcrud_childrenProgress->unset_numbers();
        $xcrud_superbills->unset_numbers();
	$xcrud_invoice->unset_numbers();
	$xcrud_soap->unset_numbers();
	$xcrud_soap4->unset_numbers();
	$xcrud_nonCounseling->unset_numbers();
	$xcrud_treatment_update->unset_numbers();
	$xcrud_service_and_charge->unset_numbers();
	
        
        $xcrud->unset_pagination();
        $xcrud_informed_consent->unset_pagination();
        $xcrud_terminationSummary->unset_pagination();
        $xcrud_childrenProgress->unset_pagination();
        $xcrud_superbills->unset_pagination();
        $xcrud_invoice->unset_pagination();
        
        $xcrud->unset_limitlist();
        $xcrud_informed_consent->unset_limitlist();
        $xcrud_terminationSummary->unset_limitlist();
        //$xcrud_childrenProgress->unset_limitlist();
        $xcrud_superbills->unset_limitlist();
        $xcrud_invoice->unset_limitlist();
        
        //$xcrud->unset_add();
        //$xcrud_informed_consent->unset_add();
        
        $xcrud->unset_edit();
        $xcrud_informed_consent->unset_edit();
        //$xcrud_activitySheets->unset_edit();
        $xcrud_terminationSummary->unset_edit();
        $xcrud_superbills->unset_edit();
        $xcrud_invoice->unset_edit();
        
        //$xcrud->unset_remove();
        //$xcrud_informed_consent->unset_remove();
                
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

<script>

function collapseAll(className) {
	
	var elements = document.getElementsByClassName(className);
	
	for (var i = 0; i < elements.length; i++){
       	elements[i].style.display = "none";
    }
  
}

function expandAll(className) {
	
	var elements = document.getElementsByClassName(className);
	
	for (var i = 0; i < elements.length; i++){
       	elements[i].style.display = "block";
    }
  
}

function myFunction(id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

</script>


        
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    background: #fff3d2;
}

img {
    float: none;
}


/* Create two unequal columns that floats next to each other */
.cmn {
    float: left;
    padding: 20px;
    
}

.left {
  width: 25%;
  padding: 5px;
  margin: 5px;
  
}

.right {
  width: 73%;
  padding: 5px;
  margin: 5px;
  
}

/* Clear floats after the columns */
.rw:after {
    content: "";
    display: table;
    clear: both;
}

</style>
        
    </head>

<body>
    
<?php
    if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
    {
        header("Location:index.php");
    }
?>

        <header class="site-header push">Client Details</header>

        <!-- Pushy Menu -->
        <?php include('menu.php');?>

        <!-- Site Overlay -->
        <div class="site-overlay"></div>

        <!-- Your Content -->
        <div id="container">
            <!-- Menu Button -->
            <button class="menu-btn">&#9776; Menu</button>
                      
			<span style="float: right">
            <button class="btn btn-warning" onclick="expandAll('tables')">expand all</button>
            <button class="btn btn-warning" onclick="collapseAll('tables')">collapse all</button>
            <button class="btn btn-info" onclick="location.href='home.php'">Back to Dashboard</button>
            </span>
			
			<br />
			<img src="img/thumbs/person_file.png" width="75" height="75" style="float: left;">
			&nbsp;
			<h2><?php echo "&nbsp".$_GET['name']."&nbsp;Records"; ?></h2>
						
		    <div class="rw">
			<div class="cmn left">
				
				
				<img src="img/thumbs/intake_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Intake Form</span>
			    <br />
			 	<button onclick="myFunction('intake')">show / hide</button>
			 	<div class="tables" id="intake" style="display: none">
			 	<?php
			    echo $xcrud->render();
			    ?>
			    </div>
			    <hr />
			    
			   	
			    <img src="img/thumbs/files_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Informed Consent Form</span>
			    <br />
			    <button onclick="myFunction('informed_consent')">show / hide</button>
			    <div class="tables" id="informed_consent" style="display: none">
			    <?php
			    echo $xcrud_informed_consent->render();
			    ?>
			    </div>
			    <hr />
			    
			    <img src="img/thumbs/files_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Termination Summary</span>
			    <br />
			    <button onclick="myFunction('termination')">show / hide</button>
			    <div class="tables" id="termination" style="display: none">
			    <?php
			    echo $xcrud_terminationSummary->render();
			    ?>
			    </div>
			    <hr />

			    <img src="img/thumbs/money_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Superbills</span>
			    <br />
			    <button onclick="myFunction('superbill')">show / hide</button>
			    <div class="tables" id="superbill" style="display: none">
			    <?php
			    echo $xcrud_superbills->render();
			    ?>
			    </div>
			    <hr />
			    
			    <img src="img/thumbs/money_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Invoices</span>
			 	<br />
			 	<button onclick="myFunction('invoice')">show / hide</button>
			 	<div class="tables" id="invoice" style="display: none">
			 	<?php
			    echo $xcrud_invoice->render();
			    ?>
			    </div>
			    <hr />
				
			</div>
			
			<div class="cmn right">
			  			    			    
			    <img src="img/thumbs/treatment_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Diagnosis and Treatment Plan</span>
			    <button onclick="myFunction('treatmentPlan')">show / hide</button>
			    <br />
				<div class="tables" id="treatmentPlan" style="display: none">
				<?php
			    echo $xcrud_treatmentPlan->render();
			    ?>
			    </div>
			    
			    <br />
				<hr />

				<img src="img/thumbs/treatment_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Treatment Updates</span>
			    <button id="" onclick="myFunction('treatmentUpdate')">show / hide</button>
				<div class="tables" id="treatmentUpdate" style="display: none">
				<?php
			    echo $xcrud_treatment_update->render();
			    ?>
			    <form action="treatment_update_printout.php">
  					print out report from
  					<input type="date" name="from"> (excluded)
  					to
  					<input type="date" name="to"> (inclluded)
  					<input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
  					<input type="submit">
  					
				</form>
			    </div>
			    
			    
			    
			    <br />
				<hr />


			    <img src="img/thumbs/notes_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; STEP Notes</span>
			   	<button id="" onclick="myFunction('soap')">show / hide</button>
			   	<br />
				<div class="tables" id="soap" style="display: none">
				<?php
			    echo $xcrud_soap->render();
			    ?>
			    </div>
			    
			    <br />
			    <hr />
			  	
			  	<img src="img/thumbs/notes_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; SOAP Notes</span>
			   	<button id="" onclick="myFunction('soap4')">show / hide</button>
			   	<br />
				<div class="tables" id="soap4" style="display: none">
				<?php
			    echo $xcrud_soap4->render();
			    ?>
			    </div>
			    
			    <br />
			    <hr />
				
				
			  	<img src="img/thumbs/notes_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Children Progress Notes</span>
			    <button id="" onclick="myFunction('childrenNotes')">show / hide</button>
			    <br />
				<div class="tables" id="childrenNotes" style="display: none">
				<?php
			    echo $xcrud_childrenProgress->render();
			    ?>
			    </div>
			    
			    <br />
				<hr />
			  	
			  				  				  		
				<img src="img/thumbs/notes_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Non-Counseling Notes</span>
			    <button id="" onclick="myFunction('nonCounseling')">show / hide</button>
			    <br />
				<div class="tables" id="nonCounseling" style="display: none">
				<?php
			    echo $xcrud_nonCounseling->render();
			    ?>
			    </div>
			    
			    <br />
				<hr />
				
				
				
								
				<img src="img/thumbs/money_small.png" width="50" height="50">
			    <span style="font-size:20px; font-weight: bold;"> &nbsp; Services and Charges</span>
			   	<button id="" onclick="myFunction('service')">show / hide</button>
			   	<br />
				<div class="tables" id="service" style="display: none">
				<?php
			    echo $xcrud_service_and_charge->render();
			    ?>
			    <input type="button" onclick="location.href='print_invoice.php?id=<?php echo $_GET['name']; ?>'" value="print invoice for unpaid items" />
			   	<input type="button" onclick="location.href='print_superbill.php?id=<?php echo $_GET['name']; ?>'" value="generate superbill" />
			    </div>
			    
			    <br />
			    <hr />
					    
					    
				
			</div>
			</div>
			
			
			
			
    		    		            
        </div>

        <footer class="site-footer push">Brelieve Counseling</footer>
		
        <!-- Pushy JS -->
        <script src="js/pushy.min.js"></script>

</body>
</html>
