gpg_auth_master_dev
===================

#### GPG 2FA

GPG based 2 factor authentification

### Demo 
[Demo link](http://raed.it/gpg2fa/)

The 2 demo files are `index.php` and `login.php`.
I don't store anything that is passed to the demo.

### Why is it useful?
When you need 2FA for your website but:
* You don't want your users, *for privacy*,  to put phone-numbers (or even emails).
* You're too poor to buy such a phone based service.

#### How it works?

1- Logged-in user adds their public-key.

2- In the next log-in, the class generates a randon `token`.

3- The token is encrypted and displayed to the user.

5- User decrypts the token with their private key.

6- User submists the decrypted token and if it maches the original token they log-in. 

#### Demo
A working demo should be online soon, you can see the code in action in `demo.php`

### Version
0.2.0

### Tech

This is built and tested using the latest PHP and GnuPG versions. I don't really know about the rest.