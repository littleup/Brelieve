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
    height:30px; 
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
$table = "service_and_charge"; 
$today = date("Y/m/d");
$serial = date("Ymdgis");  


$link = new mysqli($host, $user, $pass, $db);
if($link->connect_error){
    die("conneciton failed: ".$link->connect_error);
}


$sql = "SELECT session_date, service_provided, duration, amount_due FROM ".$table." WHERE full_name='".$name."' AND add_to_superbill='1'";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');
}


$sql2= "SELECT sum(amount_due) as total FROM ".$table." WHERE full_name='".$name."' AND add_to_superbill='1'";
if(!$result2 = $link->query($sql2)){
    die('There was an error running the query [' . $link->error . ']');
}

$row2 = mysqli_fetch_assoc($result2);

$sql3= "SELECT dob FROM clients WHERE full_name='".$name."'";
if(!$result3 = $link->query($sql3)){
    die('There was an error running the query [' . $link->error . ']');
}

$row3 = mysqli_fetch_assoc($result3);

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
<h5>Insurance Superbill</h5> 
&nbsp;&nbsp;&nbsp;
<button onclick="window.print()">print</button>
</div>

<div class="space"></div>

<div class="row">
<strong>Patient Name:</strong> <?php echo $name;?> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Patient Date of Birth:</strong> <?php echo $row3['dob'];?>
</div>

<div class="space"></div>

<div class="row">
<strong>Name of Policy Holder:</strong>
<input type="text" name="policy_holder">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Policy Holder Date of Birth:</strong>
<input type="date" name="holder_dob">
</div>

<div class="space"></div>

<div class="row">
<strong>Name of Insurance Plan:</strong>
<input type="text" name="policy_holder">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Plan ID# (Policy#):</strong>
<input type="text" name="policy_number">
</div>

<div class="space"></div>


<div class ="row">
<h6>Procedures (CPT Codes):</h6>
</div>

<div class="row">
<table class="table table-striped" cellspacing="0" cellpadding="0" style="outline: thin solid;">
    <tbody>
        <tr style="outline: thin solid;">
            <td valign="top" width="7%">                
                    <strong>Code</strong>
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    <strong>Procedure</strong>
            </td>
            <td valign="top" width="7%">
                    <strong>Code</strong>
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    <strong>Procedure</strong>
            </td>
            <td valign="top" width="7%">
                    <strong>Code</strong>
            </td>
            <td valign="top" width="14%">
                    <strong>Procedure</strong>
            </td>
        </tr>
        <tr>
            <td valign="top" width="7%">
                    90791
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Diagnostic Evaluation
            </td>
            <td valign="top" width="7%">
                    90837
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Psychotherapy 60min
            </td>
            <td valign="top" width="7%">
                    90875
            </td>
            <td valign="top" width="14%">
                    Interactive Add-on
            </td>
        </tr>
        <tr>
            <td valign="top" width="7%">       
                    90832
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Psychotherapy 30min
            </td>
            <td valign="top" width="7%">
                    90839
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Crisis Therapy, 1<sup>st</sup> 60min
            </td>
            <td valign="top" width="7%">
                    90847
            </td>
            <td valign="top" width="14%">
                    Family Therapy w/pt. present
            </td>
        </tr>
        <tr>
            <td valign="top" width="7%">
                    90834
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Psychotherapy 45min
            </td>
            <td valign="top" width="7%">
                    90840
            </td>
            <td valign="top" width="17%" style="border-right: thin solid;">
                    Crisis Therapy, ea. Additional 30min
            </td>
            <td valign="top" width="7%">
                    90846
            </td>
            <td valign="top" width="14%">
                    Family Therapy w/o pt. present
            </td>
        </tr>
    </tbody>
</table>

</div>

<div class="space"></div>

<div class="row">

<table class="table table-striped" cellspacing="0" cellpadding="0" width="100%" style="outline: thin solid;">
    <tbody>
        <tr style="outline: thin solid;">
            <td valign="top" width="20%">
                    <strong>Date of Service</strong>
            </td>
            <td valign="top" width="50%">
                    <strong>Procedure (CPT Code)</strong>
            </td>
            <td valign="top" width="30%">
                    <strong>Fee</strong>
            </td>
        </tr>
        
        <?php
       
        while($row = $result->fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row['session_date']."</td>";
            echo "<td>".$row['service_provided']."</td>";
            echo "<td>$".$row['amount_due']."</td>";
        echo "</tr>";
        }    
       
        ?>
        
        <tr style="outline: thin solid;">
            
            <td>
            </td>
            <td align="right">
                <p>
                    <strong>TOTAL DUE</strong>
                </p>
            </td>
            <td>
                <?php echo "$".$row2['total']; ?>
            </td>
           
        </tr>
        
    </tbody>
</table>

</div>


<div class="space"></div>

<div class="row">
<strong>Patient's Diagnosis (ICD-10 Code):</strong>
<input type="text" name="diagnosis_code">
</div>

<div class="space"></div>

<div class="row">
<strong>Provider Name:&nbsp;</strong>                   
<u>Nien-Tzu Kuo</u>
</div>

<div class="row">
<strong>License Type:&nbsp;</strong>                      
<u>CA LMFT 103988</u>
</div>

<div class="row">
<strong>Provider EIN# (Tax ID#):&nbsp;</strong>  
<u>82-3985161</u>
</div>

<div class="row">
<strong>Provider NPI#:&nbsp;</strong>                 
<u>1891203840</u>
</div>

<div class="space"></div>

<div class="row">
<strong>Provider Address:</strong>
</div>

<div class="row">
<u>1525 McCarthy Blvd. Suite 1086, Milpitas, CA 95035</u>
</div>

<div class="space"></div>

<div class="row">
<strong>Phone:&nbsp;</strong> 
<u>1-833-427-7988</u>
</div>

<div class="space"></div>
<div class="space"></div>
<div class="row">
Signature of Provider:&nbsp;________________________________________________&nbsp;&nbsp;&nbsp;Date: <?php echo $today; ?>
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