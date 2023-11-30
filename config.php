<?php 
require_once './vendor/autoload.php';
$google_client= new Google_Client();

$google_client->setClientId('79724901113-h4v5u64imsdglp0d8l3uilnl9i9k436l.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost:82/signin%20with%20google/index.php');

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();



?>