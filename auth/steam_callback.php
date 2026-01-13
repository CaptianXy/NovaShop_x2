<?php
session_start();
require_once "../config/db.php";

if (!isset($_GET['openid_claimed_id'])) {
  die("Steam login failed");
}

preg_match("/\/id\/(\d+)$/", $_GET['openid_claimed_id'], $matches);
$steamid = $matches[1];

// 👉 ดึงข้อมูลผู้ใช้ Steam
$apiKey = "STEAM_API_KEY"; // ใส่ของคุณ
$json = file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=$apiKey&steamids=$steamid");
$data = json_decode($json, true);
$player = $data['response']['players'][0];

$username = $player['personaname'];
$avatar = $player['avatarfull'];

// 👉 ตรวจ DB
$stmt = $conn->prepare("SELECT id FROM users WHERE steam_id=?");
$stmt->execute([$steamid]);

if ($stmt->rowCount() == 0) {
  $stmt = $conn->prepare("
    INSERT INTO users (username, steam_id, avatar)
    VALUES (?,?,?)
  ");
  $stmt->execute([$username, $steamid, $avatar]);
}

$_SESSION['user'] = [
  'username' => $username,
  'steam_id' => $steamid,
  'avatar' => $avatar
];

header("Location: ../index.php");
exit;
