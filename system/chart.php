<?php
// tested
// Database credentials
$dbHost = 'localhost';
$dbUsername = 'frank';
$dbPassword = 'Trustno1$';
$dbName = 'brelieve';
$date_from = $_GET['from'];
$date_to = $_GET['to'];
$sum = 0.00;

// Create connection and select db
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get data from database

$q= "SELECT type_of_goods, SUM(price) as total FROM expense  WHERE purchase_date BETWEEN '".$date_from."' AND '".$date_to."' GROUP BY type_of_goods";

$q2= "SELECT  SUM(amount_due) as income FROM service_and_charge  WHERE paid='1' AND session_date BETWEEN '".$date_from."' AND '".$date_to."'";


if(!$result = $db->query($q)){
    die('There was an error running the query [' . $db->error . ']');
}

if(!$result2 = $db->query($q)){
    die('There was an error running the query [' . $db->error . ']');
}

if(!$result3 = $db->query($q2)){
    die('There was an error running the query [' . $db->error . ']');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
.space {
    margin:0;
    padding:0;
    height:50px;
}

body {
    font-size: 15px;
}

.center {
    text-align: center;
    border: 3px solid orange;
}

.box {
    border: 10px solid orange;
    padding: 25px;
    margin: 25px;
    text-align: center;
    font-size: 30px;
}

</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['type of expense', 'price'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['type_of_goods']."', ".$row['total']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Expense Distribution Pie Chart',
        width: 700,
        height: 500,
        //is3D: true,
        pieHole: 0.4,
    };
    
    var formatter = new google.visualization.NumberFormat({
        prefix: '$'
    });
    
    formatter.format(data, 1);

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>

<div class="container">

<div class="row">
<p><button onclick="window.print()">print</button></p>
</div>

<div class"row">
<img src="../system/img/thumbs/logo.png" width="75" height="75">
                <div style='vertical-align:middle; display:inline; font-size: 35px;'>
                     Brelieve Counseling
                </div>
</div>

 <div class="center" style='font-size: 20px;'>
                    <?php
                        echo "Expense Report from &nbsp;<strong> ".$date_from." </strong> &nbsp; to &nbsp; <strong> ".$date_to." </strong>";
                     ?>
</div>

<div class="row">
    <!-- Display the pie chart -->
    <div id="piechart" class="col-sm"></div>
    
    <div class="col-sm">
    <div class="space"></div>
    <strong>Expenses by Catagory</strong>
    <div class="space"></div>
    <table class="table table-striped" width="100%" cellspacing="0" cellpadding="0" style="outline: thin solid;">
    <tbody>
        <tr style="outline: thin solid;">
            <td>
                <p>
                    <strong>CATAGORY</strong>
                </p>
            </td>

            <td>
                <p>
                    <strong>EXPENSE</strong>
                </p>
            </td>
          
        </tr>
  

        
        <?php
       
        while($row2 = $result2->fetch_assoc()){
        $sum = $sum + $row2['total'];
        echo "<tr>";
            echo "<td>".$row2['type_of_goods']."</td>";
            echo "<td>$".$row2['total']."</td>";
        echo "</tr>";
        }
               
        
        ?>
        
        <tr style="outline: thin solid;">
            
            <td>
                <p>
                    <strong>TOTAL EXPENSE</strong>
                </p>
            </td>
            <td>
                <?php echo "$".(float)$sum; ?>
            </td>
           
        </tr>
    	
        
        
    </tbody>
</table>

    </div>
    
</div>

 <div class="center" style='font-size: 20px;'>
                    <?php
                        echo "Balance Sheet from &nbsp;<strong> ".$date_from." </strong> &nbsp; to &nbsp; <strong> ".$date_to." </strong>";
                     ?>
</div>

<div class="row">

<div class="col-sm">
<div class="box">
<h4>earning</h4>

<?php
$row3 = $result3->fetch_assoc();
echo "$".$row3['income'];
?>
</div>
</div>



<div class="col-sm">
<div class="box">
<h4>spending</h4>
<?php
echo "$".$sum;
?>
</div>
</div>



<div class="col-sm">
<div class="box">
<h4>balance</h4>
<?php

$balance = $row3['income'] - $sum;
if($balance > 0){
    echo "<span style='font-weight:bold;color:green;'>$".$balance."</span>";
}else{
    echo "<span style='font-weight:bold;color:red;'>$".$balance."</span>";
}
?>
</div>
</div>

</div>

</div>

<?php
$result->free();
$result1->free();
$result2->free();
$db->close();
?>



</body>
</html>
