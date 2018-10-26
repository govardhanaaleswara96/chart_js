<?php
header('Content-Type : application/json');

$cont = mysqli_connect('localhost','root','root','emp');

$listQuery = 'SELECT emp_id , name , salary * FROM emp ORDER BY emp_id';

$main =mysqli_query($cont,$listQuery);

$data = array();

foreach ($main as $row) {
	 $data[] = $row
}

mysql_close($cont);

echo json_encode($data);

?>