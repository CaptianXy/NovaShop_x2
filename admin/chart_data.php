<?php
include '../config/db.php';
$r=$conn->query("SELECT DATE(created_at) d, SUM(total) t FROM orders GROUP BY d");
$labels=[]; $values=[];
while($row=$r->fetch_assoc()){
 $labels[]=$row['d'];
 $values[]=$row['t'];
}
echo json_encode(['labels'=>$labels,'values'=>$values]);
