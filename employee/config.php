<?php

session_start();
##### DB Configuration #####
$servername = "localhost";
$username = "root";
$password = "";
$db = "pizone";

##### Google App Configuration #####
$googleappid = "563873960380-66668e4e97pvja0906fj93tlncrjbneu.apps.googleusercontent.com";
$googleappsecret = "7CU1R_vB6mhxVFB6VZht6tTb";
//$redirectURL = "http://localhost/api/authenticate.php";
 $redirectURL = "http://localhost/employee1/employee/index1.php";

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
##### Required Library #####
include_once 'src/Google/Google_Client.php';
include_once 'src/Google/contrib/Google_Oauth2Service.php';

$googleClient = new Google_Client();
$googleClient->setApplicationName('Login to CodeCastra.com');
$googleClient->setClientId($googleappid);
$googleClient->setClientSecret($googleappsecret);
$googleClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($googleClient);

?>
