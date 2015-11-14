<?php

set_include_path(
        realpath("./lib") .
        PATH_SEPARATOR . get_include_path()
);

require_once 'CryptLib/bootstrap.php';
require_once 'GPG.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GPG2FA
 *
 * @author raed chammam
 */
class GPG2FA {

    private $token;
    private $factory;
    private $publicKey;

    public function GPG2FA() {
        $this->factory = new \CryptLib\Random\Factory;
        $this->token = $this->setToken();
    }

    private function setToken() {
        $generator = $this->factory->getLowStrengthGenerator();

        function make_seed() {
            list($usec, $sec) = explode(' ', microtime());
            return (float) $sec + ((float) $usec * 100000);
        }

        srand(make_seed());
        $randval = rand();
        $number = $generator->generate(8);

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
