<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>for print output</title>

<style>
.space { 
	margin:0; 
	padding:0; 
	height:20px; 
} 

body {
	font-size: 12px;
}
</style>

</head>
<body>


<?php

$host = 'localhost';
$user = 'frank';
$pass = 'Trustno1$';
$db = 'brelieve';
$session_number = $_GET['session_number'];
$table = $_GET['table'];
$full_name = $_GET['name'];
$today = date();

$link = new mysqli($host, $user, $pass, $db);

if($link->connect_error){
	die("conneciton failed: ".$link->connect_error);
}


$result = $link->query("SELECT * FROM ".$table." WHERE session_number=".$session_number." AND full_name="."'".$full_name."'");

$row = $result->fetch_assoc();
?>

<div class="container">

<div class="row">
<img src="img/thumbs/logo.png" width="50" height="50">
<div style='vertical-align:middle; display:inline; font-size: 35px;'>
    Brelieve Counseling
</div>
</div>

<div class="space"></div>

<div class="row">
<h5>Children Progress Note</h5> 
&nbsp;&nbsp;&nbsp;
<p><button onclick="window.print()">print</button></p>

<form action="print_report.php" method="get" id="form_1">
<?php
	$next_session = $session_number + 1;
?>
<input type="hidden" name="session_number" value="<?php echo $next_session; ?>">
<input type="hidden" name="name" value="<?php echo $full_name; ?>">
<input type="hidden" name="table" value="<?php echo $table; ?>">  					
</form>

<form action="print_report.php" method="get" id="form_2">
<?php
	$previous_session = $session_number - 1;
?>
<input type="hidden" name="session_number" value="<?php echo $previous_session; ?>">
<input type="hidden" name="name" value="<?php echo $full_name; ?>">
<input type="hidden" name="table" value="<?php echo $table; ?>">  					
</form>

<div align="center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" form="form_2" value="Submit">&#706;&#706;&#706;&nbsp;&nbsp;Previous Record</button>
&nbsp;&nbsp;&nbsp;
<button type="submit" form="form_1" value="Submit">Next Record&nbsp;&nbsp;&#707;&#707;&#707;</button>
</div>


</div>

<?php
if( !$row ) {

	echo "<h2>NO RECORD AVAILABLE</h2>";

}
?>

<div class="row">
<table class="table table-striped" style="outline: solid;">
    <tbody>
        <tr>
            <td width="120" valign="top">
                
                    <strong>Client name</strong>
                
            </td>
            <td colspan="2" width="120" valign="top">
                
                    <?php echo $row['full_name']; ?>
                
            </td>
            <td colspan="2" width="119" valign="top">
                
                    <strong>date</strong>
                
            </td>
            <td colspan="2" width="117" valign="top">
                
                    <?php echo $row['session_date']; ?>
                
            </td>
            <td colspan="2" width="118" valign="top">
                
                    <strong>Session#</strong>
                
            </td>
            <td width="125" valign="top">
                
                    <?php echo $row['session_number']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="120" valign="top">
                
                    <strong>Time started</strong>
                
            </td>
            <td colspan="2" width="120" valign="top">
                
                    <?php echo $row['time_started']; ?>
                
            </td>
            <td colspan="2" width="119" valign="top">
                
                    <strong>Time finished</strong>
                
            </td>
            <td colspan="2" width="117" valign="top">
                
                    <?php echo $row['time_finished']; ?>
                
            </td>
            <td colspan="2" width="118" valign="top">
                
                    <strong>Next schedule</strong>
                
            </td>
            <td width="125" valign="top">
                
                    <?php echo $row['next_appointment']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="5" width="359" valign="top">
                
                    <strong>Type of counseling</strong>
                
            </td>
            <td colspan="5" width="360" valign="top">
                
                    <?php echo $row['type_of_counseling']; ?>
                
            </td>
        </tr>
        
       	<tr style="outline: thin solid;"></tr>
       	<tr></tr>
        <tr>
            <td colspan="3" rowspan="3" width="239" valign="top">
                
                    <strong>Critical assessments</strong>
                
            </td>
            <td colspan="4" width="237" valign="top">
                
                    <strong>Suicide risk</strong>
                
            </td>
            <td colspan="3" width="243" valign="top">
                
                    <?php echo $row['suicide_risk']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="4" width="237" valign="top">
                
                    <strong>Homicide/violence risk</strong>
                
            </td>
            <td colspan="3" width="243" valign="top">
                
                    <?php echo $row['homicide_violence_risk']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="4" width="237" valign="top">
                
                    <strong>A&amp;D Use</strong>
                
            </td>
            <td colspan="3" width="243" valign="top">
                
                    <?php echo $row['a_and_d_use']; ?>
                
            </td>
        </tr>        
        <tr>
            <td colspan="4" width="335" valign="top">
                
                    <strong>
                        If “yes” to any of the above, describe in detail
                    </strong>
                
            </td>
            <td colspan="6" width="384" valign="top">
                
                    <?php echo $row['critical_assessment_details']; ?>
                
            </td>
        </tr>
        <tr style="outline: thin solid;"></tr>
        <tr></tr>
        
        <tr>
            <td width="120" valign="top">
                
                    <strong>diagnosis</strong>
                
            </td>
            <td colspan="2" width="120" valign="top">
                
                    <?php echo $row['diagnosis']; ?>
                
            </td>
            <td colspan="2" width="119" valign="top">
                
                    <strong>Change in diagnosis</strong>
                
            </td>
            <td colspan="2" width="117" valign="top">
                
                    <?php echo $row['change_in_diagnosis']; ?>
                
            </td>
            <td colspan="2" width="118" valign="top">
                
                    <strong>If yes, describe</strong>
                
            </td>
            <td width="125" valign="top">
                
                    <?php echo $row['change_details']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>
                        Current symptoms/topics/stressors/goals for session
                    </strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['symptoms_topics_stressors_goals']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>interventions</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['interventions']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Other Intervention </strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['other_interventions']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Client’s response to interventions</strong>
                
            </td>
            <td colspan="4" width="161" valign="top">
                
                    <?php echo $row['client_response_to_interventions']; ?>
                
            </td>
            <td colspan="2" width="160" valign="top">
                
                    <strong>Other response</strong>
                
            </td>
            <td colspan="2" width="167" valign="top">
                
                    <?php echo $row['other_response']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>
                        Level of client functioning or participation/motivation
                    </strong>
                
            </td>
            <td colspan="4" width="161" valign="top">
                
                    <?php echo $row['functioning_or_participation_motivation']; ?>
                
            </td>
            <td colspan="2" width="160" valign="top">
                
                    <strong>comment</strong>
                
            </td>
            <td colspan="2" width="167" valign="top">
                
                    <?php echo $row['participation_comment']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Current treatment is effective</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['current_treatment_is_effective']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>
                        Overall treatment plan and/or goals for next few
                        sessions
                    </strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['goal_and_plan_for_next_few_sessions']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Homework give this session</strong>
                
            </td>
            <td colspan="4" width="161" valign="top">
                
                    <?php echo $row['homeworks_given']; ?>
                
            </td>
            <td colspan="2" width="160" valign="top">
                
                    <strong>other</strong>
                
            </td>
            <td colspan="2" width="167" valign="top">
                
                    <?php echo $row['other_homework']; ?>
                
            </td>
        </tr>
        
        <tr style="outline: thin solid;"></tr>
        <tr></tr>
        <tr>
            <td colspan="10" width="719">
                <p align="center">
                    <strong>Mental status exam</strong>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>appearance</strong>
                
            </td>
            <td colspan="4" width="161" valign="top">
                
                    <?php echo $row['appearance']; ?>
                
            </td>
            <td colspan="2" width="160" valign="top">
                
                    <strong>other</strong>
                
            </td>
            <td colspan="2" width="167" valign="top">
                
                    <?php echo $row['other_comment_on_appearance']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Physiological signs</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['physiological_signs']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Manner and attitude</strong>
                
            </td>
            <td colspan="4" width="161" valign="top">
                
                    <?php echo $row['manner_and_attitude']; ?>
                
            </td>
            <td colspan="2" width="160" valign="top">
                
                    <strong>other</strong>
                
            </td>
            <td colspan="2" width="167" valign="top">
                
                    <?php echo $row['other_comment_on_manner_attitude']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>orientation</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['orientation']; ?>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>verbal</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['verbal']; ?>
                
            </td>
        </tr>    
        <tr>
            <td colspan="2" width="231" valign="top">
                
                    <strong>Thought content</strong>
                
            </td>
            <td colspan="8" width="488" valign="top">
                
                    <?php echo $row['thought_content']; ?>
                
            </td>
        </tr>
        
    </tbody>
</table>
</div>

<div class="row" align="center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" form="form_2" value="Submit">&#706;&#706;&#706;&nbsp;&nbsp;Previous Record</button>
&nbsp;&nbsp;&nbsp;
<button type="submit" form="form_1" value="Submit">Next Record&nbsp;&nbsp;&#707;&#707;&#707;</button>
</div>

<div class="space"></div>

<div class="row">
	<strong>Therapist Signature</strong> _________________________________________________
	<?php echo date("Y/m/d"); ?>    	              
</div>


</div>

<?php
$result->close();
$link->close();
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>