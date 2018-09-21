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
$name = $_GET['name'];
$date_from = $_GET['from'];
$date_to = $_GET['to'];
$table = 'treatment_update';
$today = date("Y/m/d");


$link = new mysqli($host, $user, $pass, $db);

if($link->connect_error){
    die("conneciton failed: ".$link->connect_error);
}


$result = $link->query("SELECT * FROM ".$table." WHERE full_name='".$name."' AND date BETWEEN '".$date_from."' AND '".$date_to."'");

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
<h5>Treatment Update Summary Report</h5> 
&nbsp;&nbsp;&nbsp;
<p><button onclick="window.print()">print</button></p>
</div>

<div class="row">
<p>
    <strong>Client name:</strong>
</p>
<p>
    <strong> <?php echo "&nbsp;".$name; ?> </strong>
</p>
</div>

<div class="row">
<p>
    <strong>Report date:</strong>
</p>
<p>
    <strong><?php echo "&nbsp;".$today; ?></strong>
</p>
</div>

<div class="row">
    <strong>Problem:</strong>
</div>
<div class="row">
    <textarea rows="2" cols="90" name="problem"></textarea>
</div>

<div class="space"></div>

<div class="row">
    <strong>Goal:</strong>
</div>
<div class="row">
    <textarea rows="2" cols="90" name="goal"></textarea>
</div>

<div class="space"></div>

<div class="row">
    <strong>Session Updates:</strong>
</div>



<div class="row">
<table class="table table-striped" width="100%" cellspacing="0" cellpadding="0" border="1">
    <tbody>
        <tr>
            <td width="102" valign="top">
                <p>
                    <strong>Session Date</strong>
                </p>
            </td>
            <td width="522" valign="top">
                <p>
                    <strong>updates</strong>
                </p>
            </td>
        </tr>
        
        <?php
                
        while($row = $result->fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['treatment_update']."</td>";
        echo "</tr>";
        }
               
        
        ?>


    </tbody>
</table>
</div>

<div class="row">
    <strong>Comment/Summary on Progress so far:</strong>
</div>
<div class="row">
    <textarea rows="2" cols="90" name="problem"></textarea>
</div>

<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

<div class="row">
<p>
    <strong>Client/Guardian Signature_____________________________ </strong>
</p>

</div>

<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

<div class="row">
<p>    
    <strong>Therapist Signature___________________________________</strong>
</p>

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