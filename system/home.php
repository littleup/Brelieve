<?php   session_start();  

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

        <header class="site-header push">Brelieve Client Record Management System</header>

        <!-- Pushy Menu -->
        <?php include('menu.php');?>
        
        <!-- Site Overlay -->
        <div class="site-overlay"></div>

		
        
        <!-- Your Content -->
        <div id="container">
            <!-- Menu Button -->
            <button class="menu-btn">&#9776; Menu</button>
			
			<div id="homecontainer">
			<h2>Dashboard</h2>			
			
<?php
	if ($row["client_list"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"client_list.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Client_Management.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["intake_form"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"intake_forms.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Intake_Forms.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["children_progress"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"children_progress.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Progress_Notes.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["step"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"soap.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/SOAP_Notes.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["soap"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"soap4.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/soap4.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["non_counseling"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"non_counseling.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Non_Counseling_Notes.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["treatment_plan"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"treatment_plan.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Treatment_Plan.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["treatment_update"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"treatment_update.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Treatment_Update.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["informed_consent"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"informed_consent.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Informed_Consent.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["termination"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"termination_summary.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Termination_Summary.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["service_charge"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"service_and_charge.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/service_and_charge.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["invoice"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"invoice.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Invoices.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["supberbill"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"superbills.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Super_Bills.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}
	
	if ($row["expense_report"] === "1") {
		echo "<div class=\"col\">	\n";
		echo "<a href=\"expense.php\">\n";
		echo "<div class=\"hover01\">\n";
		echo "<figure><img src=\"img/icons/Expenses.png\" width=\"175\" height=\"175\" title=\"\" alt=\"\"></figure>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</div>";
	}



?>
			
					
			</div>			
		
		
		</div>
		
<?php
$result->close();
$link->close();
?>
		
		<div class="nofloat">
		<footer class="site-footer push">Brelieve Counseling</footer>	
		</div>	
            
        
        

        <!-- Pushy JS -->
        <script src="js/pushy.min.js"></script>

    </body>
</html>
