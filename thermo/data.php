<?php
header('Content-Type:application/json');

$cont = mysqli_connect('localhost','root','root','gova');

$sqlQuery ="SELECT thermo FROM thermo";

$result =mysqli_query($cont,$sqlQuery);

$data =  array();

foreach ($result as $key) {
     $data[] = $key;
}
mysqli_close($cont);

echo json_encode($data);

?>

