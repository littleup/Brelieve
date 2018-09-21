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
    height:50px; 
} 

body {
    font-size: 15px;
}

</style>

</head>
<body>

<?php

$host = 'localhost';
$user = 'frank';
$pass = 'Trustno1$';
$db = 'brelieve';
$name =$_GET['id'];
//$id = $_GET['id'];
$table = "service_and_charge"; 
//$_GET['table'];
$today = date("Y/m/d");
$serial = date("Ymdgis");  


$link = new mysqli($host, $user, $pass, $db);

if($link->connect_error){
    die("conneciton failed: ".$link->connect_error);
}

$sql = "SELECT session_date, service_provided, duration, amount_due FROM ".$table." WHERE full_name='".$name."' AND paid='0'";

if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');
}


$sql2= "SELECT sum(amount_due) as total FROM ".$table." WHERE full_name='".$name."' AND paid='0'";
if(!$result2 = $link->query($sql2)){
    die('There was an error running the query [' . $link->error . ']');
}

$row2 = mysqli_fetch_assoc($result2);

$sql3= "SELECT address, suite, city, state, zip FROM clients WHERE full_name='".$name."'";
if(!$result3 = $link->query($sql3)){
    die('There was an error running the query [' . $link->error . ']');
}

$row3 = mysqli_fetch_assoc($result3);

?>


<div class="container">

<div class="row">
<p><button onclick="window.print()">print</button></p>
</div>

<div class="row">

<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td rowspan="2" width="361" valign="top">
                <img src="img/thumbs/logo.png" width="75" height="75">
                <div style='vertical-align:middle; display:inline; font-size: 35px;'>
                     Brelieve Counseling
                </div>
                
              
               
                    <br />
                    1525 McCarthy Blvd Suite 1086, Milpitas, CA 95035
                    <br />
                    Phone: (833) 427-7988
                    <br />
                    E-Mail: nkuomft@gmail.com
               
                
            </td>
            <td width="359" valign="top">
                 <div style='vertical-align:middle; display:inline; font-size: 48px;'>
                     THERAPY INVOICE
                </div>
            </td>
        </tr>
        <tr>
            <td width="359" valign="bottom">
                <p align="left">
                    <strong>Invoice #</strong> <?php echo $serial; ?>
                </p>
                <p align="left">
                    <strong>Date:</strong> <?php echo $today; ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>

</div>

<div class="space"></div>
<div class="row">



<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td width="360" valign="top">
                <h2>
                    To:
                </h2>
                <p>
                    <strong>Customer Name:</strong> <?php echo $name; ?>
                </p>
                <p>
                    <strong>Address:</strong> <?php echo $row3['address']." ".$row3['suite']." ,".$row3['city']." ,".$row3['state']." ".$row3['zip']; ?>
                </p>
            </td>
            <td width="360" valign="top">
                
            </td>
        </tr>
    </tbody>
</table>

</div>
<div class="row">


<table class="table table-striped" width="100%" cellspacing="0" cellpadding="0" style="outline: thin solid;">
    <tbody>
        <tr style="outline: thin solid;">
            <td width="191">
                <p>
                    <strong>SESSION DATE</strong>
                </p>
            </td>

            <td width="250">
                <p>
                    <strong>SERVICE PROVIDED</strong>
                </p>
            </td>

            <td width="220">
                <p>
                    <strong>TIME</strong>
                </p>
            </td>
            
            <td width="125">
                <p>
                    <strong>AMOUNT DUE</strong>
                </p>
            </td>
        </tr>
        
        
        <?php
        

        
        while($row = $result->fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row['session_date']."</td>";
            echo "<td>".$row['service_provided']."</td>";
            echo "<td>".$row['duration']."</td>";
            echo "<td>$".$row['amount_due']."</td>";
            /*foreach($row as $field) {
                echo "<td>";
                echo $field;
                echo "</td>";
            }*/
        echo "</tr>";
        }
               
        
        ?>
        
        <tr style="outline: thin solid;">
            
            <td width="191">
            </td>
            <td width="250">
            </td>
            <td width="220" align="right">
                <p>
                    <strong>TOTAL DUE</strong>
                </p>
            </td>
            <td width="125">
                <?php echo "$".$row2['total']; ?>
            </td>
           
        </tr>
    </tbody>
</table>

</div>

<div class="row">

<p>
    Make all checks payable to <strong>Brelieve Counseling</strong>
<br />
    Total due in 15 days upon invoice issued date above.
<br />
    Thank you!
</p>

</div>

</div>


<?php
$result->free();
$link->close();

$result2->free();
$link2->close();

$result3->free();
$link3->close();
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>