<?php
function encryptPolyalphabet($plaintext, $key)
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $encrypted_text = '';

    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];
        if (strpos($alphabet, $char) !== false) {
            $char_index = strpos($alphabet, $char);
            $key_Char = $key[$char_index % strlen($key)];
            $encrypted_text .= $key_Char;
        }
       
    }

    return $encrypted_text;
}

function decryptPolyalphabet($ciphertext, $key)
{
    $keyLength = strlen($key);
    $plaintext = "";

    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];
        $keyChar = $key[$i % $keyLength];
        $offset = ord($keyChar) - ord('A');
        $plaintext .= chr(((ord($char) - $offset - ord('A') + 26) % 26) + ord('A'));
    }

    return $plaintext;
}
?>
