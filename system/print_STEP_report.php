<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>STEP for print layout</title>

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

<div class="row">
<h5>STEP Note</h5> 
&nbsp;&nbsp;&nbsp;
<p><button onclick="window.print()">print</button></p>

<form action="print_STEP_report.php" method="get" id="form_1">
<?php
	$next_session = $session_number + 1;
?>
<input type="hidden" name="session_number" value="<?php echo $next_session; ?>">
<input type="hidden" name="name" value="<?php echo $full_name; ?>">
<input type="hidden" name="table" value="<?php echo $table; ?>">  					
</form>

<form action="print_STEP_report.php" method="get" id="form_2">
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
            <td width="78" valign="top">
                
                    <strong>Name</strong>
                
            </td>
            <td colspan="2" width="283" valign="top">
                
                    <?php echo $row['full_name']; ?>
                
            </td>
            <td width="108" valign="top">
                
                    <strong>Session #</strong>
                
            </td>
            <td colspan="2" width="252" valign="top">
                
                    <?php echo $row['session_number']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="78" valign="top">
                
                    <strong>Date</strong>
                
            </td>
            <td width="223" valign="top">
                
                    <?php echo $row['date']; ?>
                
            </td>
            <td width="60" valign="top">
                
                    <strong>Time</strong>
                
            </td>
            <td width="108" valign="top">
                
                    <?php echo $row['time']; ?>
                
            </td>
            <td width="78" valign="top">
                
                    <strong>Duration</strong>
                
            </td>
            <td width="174" valign="top">
                
                    <?php echo $row['length_of_session']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="78" valign="top">
                
                    <strong>Location</strong>
                
            </td>
            <td colspan="2" width="283" valign="top">
                
                    <?php echo $row['location']; ?>
                
            </td>
            <td width="108" valign="top">
                
                    <strong>Type of Session</strong>
                
            </td>
            <td colspan="2" width="252" valign="top">
                
                    <?php echo $row['type_of_session']; ?>
                
            </td>
        </tr>
        <tr>
            <td rowspan="2" width="78" valign="top">
                
                    <strong>CPT Codes</strong>
                
            </td>
            <td colspan="2" rowspan="2" width="283" valign="top">
                
                    <?php echo $row['cpt_code']; ?>
                
            </td>
            <td rowspan="2" width="108" valign="top">
                
                    <strong>Add-on Codes</strong>
                
            </td>
            <td width="78" valign="top">
                
                    <strong>90875</strong>
                
            </td>
            <td width="174" valign="top">
                
					<?php echo $row['add_on_90875']; ?>
			 
            </td>
        </tr>
        <tr>
            <td width="78" valign="top">
                
                    <strong>90840</strong>
                
            </td>
            <td width="174" valign="top">
             
					<?php echo $row['add_on_90840']; ?>
                
            </td>
        </tr>
        
    </tbody>
</table>
</div>

<div class="row">
<table class="table table-striped" style="outline: solid;">
    <tbody>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Subjects &amp; Symptoms</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['subjects_and_symptoms']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Emotional Symptoms</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['emotional_symptoms']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Behavioral Symptoms</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['behavioral_symptoms']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Cognitive Symptoms</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['cognitive_symptoms']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Physical Symptoms</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['physical_symptoms']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Therapeutic Tools &amp; Interventions</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['therapeutic_tools_and_interventions']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Evaluation &amp; Assessment</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['evaluation_and_assessment']; ?>
                
            </td>
        </tr>
        <tr>
            <td width="234" valign="top">
                
                    <strong>Plan</strong>
                
            </td>
            <td width="487" valign="top">
                
                    <?php echo $row['plan']; ?>
                
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
<div class="space"></div>
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