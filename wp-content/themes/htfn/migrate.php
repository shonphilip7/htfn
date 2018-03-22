<?php
require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/wp-load.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htfn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

SELECT u.position, u.email, u.member_id, u.branch, m.ID FROM wp_users_extra u, wp_member_extra m WHERE u.member_id=m.member_id AND u.branch=m.branch
		
$conn->close();
