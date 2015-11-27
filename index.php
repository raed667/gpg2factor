<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GPG2FA - Put Public Key -DEMO </title>
    </head>
    <body>
        <h1>GPG 2FA - DEMO</h1>
        <br>
        <b>Privacy conscious Two-factor authentication.</b>
        <br>
        Check the <a href="https://github.com/RaedsLab/gpgfactor_master_dev">Github project</a>.
        <br>

        <pre>
        Put any username in the form, and copy paste your public key. \n
        I don't store any kind of data form this demo. \n
        LICENSE : GPL V3
        </pre>

        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username"/>
            <br>
            <label for="publicKey">Public Key</label>
            <textarea required="required" name="publicKey"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
