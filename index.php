<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader/excel_reader.php';
// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;
$excel->read('kaartmarathon.xls');

// Trek de waarde uit de varaibele die is verstuurd

$waarde = $_GET["waarde"];

// wat is de getoonde pagina en zorg voor de juiste reload van de pagina
if ($waarde=="jokeren"){
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"60; URL=index.php\">\n";
  $sheet=1;
}else{
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"60; URL=index.php?waarde=jokeren\">\n";
  $sheet=0;
}
?>

<html>
<head>
<style type="text/css">
table {
 border-collapse: collapse;
}        
td {
 border: 1px solid black;
 padding: 0 0.5em;
}
body{ 
  font-family: verdana, sans-serif;
  color: #000000;
  letter-spacing: 0pt;
  background-color: #FFd700;
}
</body>     
</style>
</head>

<body>
<H2>Kaartmarathon 2012</H2>

<?php

// this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
function sheetData($sheet) {
  $re = '<table>';     // starts html table

  $x = 1;
  while($x <= $sheet['numRows']) {
    $re .= "<tr>\n";
    $y = 1;
    while($y <= $sheet['numCols']) {
      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
      $re .= " <td>$cell</td>\n";  
      $y++;
    }  
    $re .= "</tr>\n";
    $x++;
  }

  return $re .'</table>';     // ends and returns the html table
}


$nr_sheets = count($excel->sheets);       // gets the number of sheets
$excel_data = '';              // to store the the html tables with data of each sheet


// traverses the number of sheets and sets html table with each sheet data in $excel_data
$excel_data .= sheetData($excel->sheets[$sheet]) .'<br/>';  

// displays tables with excel file data
echo $excel_data;
?>    
</body>
</html>
