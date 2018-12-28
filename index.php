<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("kaartmarathon.xls");
?>
<html>
<head>
<?php 
// wat is de getoonde pagina?
if ($waarde=="jokeren"){
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"60; URL=index.php\">\n";
}else{
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"60; URL=index.php?waarde=jokeren\">\n";
}
?>
<link rel="stylesheet" type="text/css" href="text.css" />
</head>

<body>
<H2>Kaartmarathon 2012</H2>
<?php
if  ($waarde=="klaverjassen" or $waarde==""){
  echo "<h3>Klaverjassen</h3>\n";
  echo "<table border=1 cellpadding=2>\n";
  echo "<tr>\n";

  // create the tableheaders
  for ($i=1; $i<10; $i++) {
    echo "<th>".$data->val(1,$i)."</th>\n";
  } 
  //Fill up the table cells per row -->
  for ($row=2; $row<30; $row++){
    echo "<tr>\n";
    echo "  <td class=\"koppel\">".$data->val($row,1)."</td>\n";
    for ($i=2; $i<10; $i++) {
      echo "<td class=\"getal\">".$data->val($row,$i)."</td>\n";
    }
    echo "</tr>\n";
  } 
  echo "</table>\n";
    
  
}else{
  echo "<h3>Jokeren</h3>\n";
  echo "<table border=1 cellpadding=2>\n";
  echo "<tr>\n";

  // create the tableheaders
  for ($i=1; $i<10; $i++) {
    echo "<th>".$data->val(1,$i,1)."</th>\n";
  } 
  //Fill up the table cells per row -->
  for ($row=2; $row<13; $row++){
    echo "<tr>\n";
    echo "  <td class=\"naam\">".$data->val($row,1,1)."</td>\n";
    for ($i=2; $i<10; $i++) {
      echo "<td class=\"getal\">".$data->val($row,$i,1)."</td>\n";
    }
    echo "</tr>\n";
  } 
  echo "</table>\n";
}

?>
</body>
</html>
