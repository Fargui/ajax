<?php

$users = [
    [
        'firstname' => "Guillaume",
        'lastname' => "Dumez",
        'tel_number' => "07.89.30.51.61"
    ],
    [
        'firstname' => "Thibault",
        'lastname' => "Dumez",
        'tel_number' => "07.62.21.86.71"
    ],
];

if (isset($_POST['name']))
{
    array_push($users, ['firstname' => $_POST['name']]); /* Reprend le name dans data */
}

header('content-type: application/json');
echo json_encode($users);

$query = $db->query('');
