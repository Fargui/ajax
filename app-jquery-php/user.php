<?php
 require './config/database.php';



 $firstname = $_POST['firstname'] ?? null;
 $lastname = $_POST['lastname'] ?? null;
 
 
 
 $user = [
 
 ];
 
 $i = $db->query('SELECT * FROM user');
 
 foreach($i as $users){
 
     array_push($user, [
         'lastname' => $users['lastname'],
         'firstname' => $users['firstname'],
     ]);
 };
 
 if (isset($_POST['firstname'], $_POST['lastname']))
 {
 
     $query = $db->prepare('INSERT INTO user (`firstname`,`lastname`) VALUES (:firstname , :lastname)');
     $query->bindValue(':firstname', $firstname);
     $query->bindValue(':lastname', $lastname);
     
     $query->execute();
 
     array_push($user, [
         'lastname' => $lastname,
         'firstname' => $firstname
     ] );
 }
 
 header(('content-type: application/json'));
 echo json_encode($user);