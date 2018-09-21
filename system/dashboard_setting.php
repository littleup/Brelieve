<?php   
session_start();

$host = 'localhost';
$user = 'frank';
$pass = 'Trustno1$';
$db = 'brelieve';
$table = 'dashboard_items';


$link = new mysqli($host, $user, $pass, $db);

if($link->connect_error){
	die("conneciton failed: ".$link->connect_error);
}


$result = $link->query("SELECT * FROM ".$table);

$row = $result->fetch_assoc();
		
        
                             
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Brelieve CRMS</title>
        <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/demo.css">
        <!-- Pushy CSS -->
        <link rel="stylesheet" href="css/pushy.css">
        
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
        
        <header class="site-header push">Enable/Disable Dashboard Items</header>

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
			<img src="img/thumbs/intake_small.png" width="75" height="75">
			<h2> &nbsp; Dashboard Items Management</h2>
			<br />
												
			<form action="update_dashboard.php" method="post">
			<table class="table table-striped" cellspacing="0" cellpadding="0" style="outline: thin solid;">
			
			<tr>
   				<th>Items</th>
   				<th>show</th>
 			</tr>
			
			<tr>
				<td>
				Client Management
				</td>
				
				<td>
				<input type="checkbox" name="client_list" <?php if ($row['client_list'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Intake Forms
				</td>
				
				<td>
				<input type="checkbox" name="intake_form" <?php if ($row['intake_form'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Informed Consent
				</td>
				
				<td>
				<input type="checkbox" name="informed_consent" <?php if ($row['informed_consent'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Children Progress
				</td>
				
				<td>
				<input type="checkbox" name="children_progress" <?php if ($row['children_progress'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				STEP Notes
				</td>
				
				<td>
				<input type="checkbox" name="step" <?php if ($row['step'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				SOAP Notes
				</td>
				
				<td>
				<input type="checkbox" name="soap" <?php if ($row['soap'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Non-Counseling Notes
				</td>
				
				<td>
				<input type="checkbox" name="non_counseling" <?php if ($row['non_counseling'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Termination Summary
				</td>
				
				<td>
				<input type="checkbox" name="termination" <?php if ($row['termination'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Treatment Plan
				</td>
				
				<td>
				<input type="checkbox" name="treatment_plan" <?php if ($row['treatment_plan'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Treatment Update
				</td>
				
				<td>
				<input type="checkbox" name="treatment_update" <?php if ($row['treatment_update'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Service & Charge
				</td>
				
				<td>
				<input type="checkbox" name="service_charge" <?php if ($row['service_charge'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Superbill
				</td>
				
				<td>
				<input type="checkbox" name="supberbill" <?php if ($row['supberbill'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			<tr>
				<td>
				Invoices
				</td>
				
				<td>
				<input type="checkbox" name="invoice" <?php if ($row['invoice'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			
			<tr>
				<td>
				Expense Report
				</td>
				
				<td>
				<input type="checkbox" name="expense_report" <?php if ($row['expense_report'] == 1) echo "checked=\"checked\""; ?>>
				</td>
			</tr>
			
			
			</table>
			<input type="submit">
			</form>
</div>
        <footer class="site-footer push">Brelieve Counseling</footer>

        <!-- Pushy JS -->
        <script src="js/pushy.min.js"></script>

    </body>
</html>
