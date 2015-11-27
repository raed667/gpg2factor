<?php
session_start();

require './GPG2FA.php';

$hastoken = FALSE;
$publickey = "";
$username = "";

if (isset($_SESSION['encyrpted_token']) && isset($_SESSION['token'])) {
    $hastoken = TRUE;

    if (isset($_POST['token'])) {
        if ($_POST['token'] == $_SESSION['token']) {
            echo "<script>alert(\"Welcome " . $_SESSION['username'] . "\")</script>";
            session_destroy();
        } else {
            echo "<script>alert(\"ERROR ! \")</script>";
        }
    }
}

if ((isset($_POST['publicKey']) && isset($_POST['username']))) {

    if ($_POST['publicKey'] == "" || $_POST['username'] == "") {
        die('error submitting the form please go back and fill the 2 needed inputs.');
    }
    $publickey = $_POST['publicKey'];
    $username = $_POST['username'];

    $gpg2fa = new GPG2FA();
    $clear_text_token = $gpg2fa->getToken();

    try {
        $gpg2fa->setPublicKey($publickey);
        $encyrpted_token = $gpg2fa->getEncryptedToken();

        $_SESSION['token'] = $clear_text_token;
        $_SESSION['encyrpted_token'] = $encyrpted_token;
        $_SESSION['username'] = $username;
        $hastoken = TRUE;
    } catch (Exception $exc) {
        // echo $exc->getTraceAsString();
        die('error occured with the given key.');
    }

    /////
} else {
    if (!$hastoken) {
        die('error submitting the form please go back and fill the 2 needed inputs.');
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GPG2FA - Login</title>
    </head>
    <body>
        <?php
        if ($hastoken) {
            echo "<pre>" . $_SESSION['encyrpted_token'] . "</pre>";

            echo '<br> Just decrypt the previous message with the key you have submitted, then copy-paste the output here:';


            echo '<form action="login.php" method="post">'
            . '<input type="text" placeholder="token" required="required" name="token"/>'
            . '<button type="submit">Submit</button>'
            . '</form>  ';
        }
        ?>
    </body>
</html>