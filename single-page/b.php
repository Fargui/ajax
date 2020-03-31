<?php

$cars = [
    "Tesla",
    "Ford",
    "Toyota",
    "Doge"
];


?>




<?php
header(('content-type: application/json'));
echo json_encode($cars); 
?>