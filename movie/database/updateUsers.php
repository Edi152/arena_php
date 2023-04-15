<?php

include_once('config.php');

if(isset($_POST['submit']))
	{
		$id = $_POST['id'];
        $emri = $_POST['emri']
        $username = $_POST['username']
		$email = $_POST['email'];




$sql = "UPDATE users SET id=:id, emri=:emri, username=:username, email=:email WHERE id=:id";

$getUsers=$con->prepare($sql);

$getUsers->bindParam(':id', $id);
$getUsers->bindParam(':emri', $emri);
$getUsers->bindParam(':username', $username);
$getUsers->bindParam(':email', $email);

$getUsers->execute();

header('Location:viewAllUsesrs.php');

?>