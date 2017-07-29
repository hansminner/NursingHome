<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/18 0018
 * Time: 上午 9:33
 */
define("PBKDF2_HASH_ALGORITHM", "sha1");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 20);
define("PBKDF2_HASH_BYTE_SIZE", 20);

define("HASH_SECTIONS", 2);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

function create_hash($password)
{
    // format: algorithm:iterations:salt:hash
    $salt = get_rand_char(8);
    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" .
    bin2hex(pbkdf2(
        PBKDF2_HASH_ALGORITHM,
        $password,
        $salt,
        PBKDF2_ITERATIONS,
        PBKDF2_HASH_BYTE_SIZE,
        true
    ));
}

function validate_password($password, $correct_hash)
{
    $params = explode(":", $correct_hash);
    if(count($params) < HASH_SECTIONS)
        return false;
    $pbkdf2 = $params[HASH_PBKDF2_INDEX];
    $hash_password = bin2hex(pbkdf2(
        $params[HASH_ALGORITHM_INDEX],
        $password,
        $params[HASH_SALT_INDEX],
        (int)$params[HASH_ITERATION_INDEX],
        PBKDF2_HASH_BYTE_SIZE,
        true
    ));
    return slow_equals($hash_password, $pbkdf2)? true:false;
}

function slow_equals($a, $b)
{
    $diff = strlen($a) ^ strlen($b);
    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
    {
        $diff |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $diff === 0;
}

function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($count <= 0 || $key_length <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        // The output length is in NIBBLES (4-bits) if $raw_output is false!
        if (!$raw_output) {
            $key_length = $key_length * 2;
        }
        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
    }

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        // $i encoded as 4 bytes, big endian.
        $last = $salt . pack("N", $i);
        // first iteration
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        // perform the other $count - 1 iterations
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}
