<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function encrypt_password($plain_text) {
    $CI =& get_instance();
    $key = $CI->config->item('encryption_key');

    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($plain_text, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($iv . '::' . $encrypted);
}

function decrypt_password($encrypted_text) {
    $CI =& get_instance();
    $key = $CI->config->item('encryption_key');

    list($iv, $encrypted) = explode('::', base64_decode($encrypted_text), 2);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

