<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GPG2FA - Put Public Key -DEMO </title>
    </head>
    <body>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username"/>
            <br>
            <label for="publicKey">Public Key</label>
            <textarea required="required" name="publicKey">
            </textarea>
            <br>
            <button type="submit">Submit</button>
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
