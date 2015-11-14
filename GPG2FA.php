<?php

/*
 * Licence:  GPL
 * Author : Raed CHAMMAM
 * 
 * For used libs check /lib 
 */

set_include_path(
        realpath("./lib") .
        PATH_SEPARATOR . get_include_path()
);

require_once 'CryptLib/bootstrap.php';
require_once 'GPG.php';

class GPG2FA {

    private $token;
    private $publicKey;

    public function GPG2FA() {
        $this->token = $this->setToken();
    }

    private function setToken() {

        function make_seed() {
            list($usec, $sec) = explode(' ', microtime());
            return (float) $sec + ((float) $usec * 100000);
        }

        $factory = new \CryptLib\Random\Factory;
        $generator = $factory->getLowStrengthGenerator();
        $number = $generator->generate(8);

        srand(make_seed());
        $randval = rand();

        switch ($randval % 3) {
            case 0:
                $token = bin2hex($number);
                break;
            case 1:
                $token = base64_encode($number);
                break;
            default: {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyz' .
                            'ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&;<>?';
                    $token = $generator->generateString(16, $characters);
                    break;
                }
        }
        return $token;
    }

    public function getToken() {
        return $this->token;
    }

    public function setPublicKey($public_key_ascii) {
        $this->publicKey = $public_key_ascii;
    }

    public function getEncryptedToken() {
        $gpg = new GPG();
        if ($this->publicKey != NULL) {
            $pub_key = new GPG_Public_Key($this->publicKey);
            return $gpg->encrypt($pub_key, $this->token);
        } else {
            return NULL;
        }
    }

}
