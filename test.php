<?php

function encryption($input_data) {
    $ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "Shopssy_Data_Encryption_By_Admin";
    $encryption_data = openssl_encrypt($input_data, $ciphering, $encryption_key, $options, $encryption_iv);
    return $encryption_data;
    }
    function decryption($input_data) {
        $ciphering = "AES-128-CTR";
        $decryption_key = "Shopssy_Data_Encryption_By_Admin";
        $options = 0;
        $decryption_iv = '1234567891011121';
        $dec = openssl_decrypt($input_data, $ciphering, $decryption_key, $options, $decryption_iv);
       return $dec;
        }
$endata = encryption("Ompra@123");

echo $endata." ";
$decdata = decryption($endata);
echo $decdata;
?>