<?php  session_start();   

$host = 'localhost';
$user = 'frank';
$pass = 'Trustno1$';
$db = 'brelieve';


$link = new mysqli($host, $user, $pass, $db);

if($link->connect_error){
	die("conneciton failed: ".$link->connect_error);
}

if(isset($_POST['client_list'])) $client_list = 1; else $client_list = 0;
if(isset($_POST['intake_form'])) $intake_form = 1; else $intake_form = 0;
if(isset($_POST['informed_consent'])) $informed_consent = 1; else $informed_consent = 0;
if(isset($_POST['children_progress'])) $children_progress = 1; else $children_progress = 0;
if(isset($_POST['step'])) $step = 1; else $step = 0;
if(isset($_POST['soap'])) $soap = 1; else $soap = 0;
if(isset($_POST['non_counseling'])) $non_counseling = 1; else $non_counseling = 0;
if(isset($_POST['termination'])) $termination = 1; else $termination = 0;
if(isset($_POST['treatment_plan'])) $treatment_plan = 1; else $treatment_plan = 0;
if(isset($_POST['treatment_update'])) $treatment_update = 1; else $treatment_update = 0;
if(isset($_POST['service_charge'])) $service_charge = 1; else $service_charge = 0;
if(isset($_POST['supberbill'])) $supberbill = 1; else $supberbill = 0;
if(isset($_POST['invoice'])) $invoice = 1; else $invoice = 0;
if(isset($_POST['expense_report'])) $expense_report = 1; else $expense_report = 0;

$sql = "UPDATE dashboard_items SET client_list='$client_list', intake_form='$intake_form', informed_consent='$informed_consent', children_progress='$children_progress', step='$step', soap='$soap', non_counseling='$non_counseling', termination='$termination', treatment_plan='$treatment_plan', treatment_update='$treatment_update', service_charge='$service_charge', supberbill='$supberbill', invoice='$invoice', expense_report='$expense_report' WHERE id='1'";



if($result = $link->query($sql)){
    header("Location:home.php");  
}else{
	die('There was an error running the query [' . $link->error . ']');
}


?>
<html>

<head>
<title> setup success </title>
</head>
<body>

success!! &nbsp;&nbsp;&nbsp;

<button onclick="location.href='home.php'">Back to Dashboard</button> 

<?php
    if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
    {
        header("Location:index.php");  
    }
?>








</body>
</html>

