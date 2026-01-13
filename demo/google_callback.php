<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../config/db.php';

$client = new Google_Client();
$client->setClientId("YOUR_CLIENT_ID");
$client->setClientSecret("YOUR_CLIENT_SECRET");
$client->setRedirectUri("http://localhost/NovaShop/auth/google_callback.php");

if (!isset($_GET['code'])) {
    header("Location: ../auth/login.php");
    exit;
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

$oauth = new Google_Service_Oauth2($client);
$user = $oauth->userinfo->get();

$email = $user->email;
$name  = $user->name;
$google_id = $user->id;

/* เช็ค user ใน DB */
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$u = $stmt->fetch();

if (!$u) {
    $stmt = $conn->prepare(
        "INSERT INTO users (username,email,google_id) VALUES (?,?,?)"
    );
    $stmt->execute([$name,$email,$google_id]);
    $user_id = $conn->lastInsertId();
} else {
    $user_id = $u['id'];
}

/* login สำเร็จ */
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $name;

header("Location: ../index.php");
exit;
