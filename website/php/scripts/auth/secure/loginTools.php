<?php


function generateHash($password, $email) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        $pass = crypt($password, $salt);
        //Todo: use email in generating hashed password
        return $pass;

    }
}

function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function generateToken(){
  return substr(md5(rand()), 0, 18);
}
