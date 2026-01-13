<?php
session_start();

$realm = "http://localhost/NovaShop/";
$return_to = $realm . "auth/steam_callback.php";

$params = [
  'openid.ns' => 'http://specs.openid.net/auth/2.0',
  'openid.mode' => 'checkid_setup',
  'openid.return_to' => $return_to,
  'openid.realm' => $realm,
  'openid.identity' => 'http://specs.openid.net/auth/2.0/identifier_select',
  'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select'
];

$query = http_build_query($params);
header("Location: https://steamcommunity.com/openid/login?$query");
exit;
