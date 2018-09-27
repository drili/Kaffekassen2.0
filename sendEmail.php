<?php
header("refresh:5;url=./place_order.php");
echo "<h1>Vent venligst</h1>";
echo $_POST["email"];

$to = $_POST["email"];
$ordrenr = rand(10000,99999);
$subject = "KaffeKassen ordrebekræftelse ". $ordrenr;

$message = "
<html>
  <head>
    <title>Din ordre  - ordrenr.: ". $ordrenr ." </title>
    <style>
    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 60px;
      width: 50vw;
    }
    h1, h2, h3, h4, h5, p, th, td {
      font-family: roboto;
      text-align: center;
    }
    h1 {
      margin-top: 40px;
      margin-bottom: 40px;
      font-size: 2.45vw;
    }
    h3 {
      margin-top: 60px;
      background-color:
    }
    /* table */
    table.blueTable {
      width: 50%;
      text-align: left;
      margin: 0 auto;
    }
    table.blueTable td, table.blueTable th {
      padding: 8px 4px;
      text-align: left;
    }
    table.blueTable tbody td {
      font-size: 13px;
    }
    table.blueTable tr:nth-child(even) {
      background: #EDEDED;
    }
    table.blueTable thead {
      background: #030E14;
      background: -moz-linear-gradient(top, #424a4f 0%, #1c262b 66%, #030E14 100%);
      background: -webkit-linear-gradient(top, #424a4f 0%, #1c262b 66%, #030E14 100%);
      background: linear-gradient(to bottom, #424a4f 0%, #1c262b 66%, #030E14 100%);
    }
    table.blueTable thead th {
      font-size: 15px;
      font-weight: bold;
      color: #FFFFFF;
      text-align: left;
    }
    table.blueTable tfoot {
      font-size: 14px;
      font-weight: bold;
      color: #FFFFFF;
      background: #D0E4F5;
      background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
      background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
      background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
      border-top: 2px solid #444444;
    }
    table.blueTable tfoot td {
      font-size: 14px;
    }
    table.blueTable tfoot .links {
      text-align: right;
    }
    table.blueTable tfoot .links a{
      display: inline-block;
      background: #1C6EA4;
      color: #FFFFFF;
      padding: 2px 8px;
      border-radius: 5px;
    }
    </style>
  </head>
  <body>
    <img src='http://www.christianbengstrom.dk/img/logo.svg' alt='logo'>
    <h1>Hej ".$_POST['navn'].". Tak for din bestilling med ordrenr.: " . $ordrenr . "</h1>

    <p>Dine kaffe varianter vil blive pakket og sendt snarest.</p>
    <p>Vi sender dig en mail når varene er på vej.</p>

    <h3>Din ordre består af følgende vare:</h3>



    <table class='blueTable'>
      <thead>
        <tr>
          <th>SKU</th>
          <th>Vare</th>
          <th>Antal</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>cell1_1</td><td>cell2_1</td><td>cell3_1</td></tr>
        <tr>
          <td>cell1_2</td><td>cell2_2</td><td>cell3_2</td></tr>
        <tr>
          <td>cell1_3</td><td>cell2_3</td><td>cell3_3</td></tr>
        <tr>
          <td>cell1_4</td><td>cell2_4</td><td>cell3_4</td></tr>
      </tbody>
      </tr>
    </table>
  </body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <contact@christianbengstrom.dk>' . "\r\n";
// $headers .= 'Cc: mathias.ravnnielsen@yahoo.dk' . "\r\n";

mail($to,$subject,$message,$headers);

?>

<script type="text/javascript">
    window.location = "./place_order.php";
</script>
