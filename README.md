gpg_auth_master_dev
===================

master-dev of the php plugin with gpg 2 factor authentification

<h1>Fonctionnement</h1>

1- Logged-in user adds his public-key

2- Next log-in system generates a randon string `pin`
3- System encrypts the string `pin` => `Enc-pin`
4- system displays the encrypted `pin` to the user 

5- User decrypts the message `Enc-pin`

6- User submists the decrypted message 

7- if `pin` = decrypted(`Enc-pin`) then users logs-in