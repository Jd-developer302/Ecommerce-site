<?php

if (!function_exists('encryptNumber')) {
    /**
     * Encrypt an integer number to an alphanumeric string.
     *
     * @param int $number
     * @return string
     */
    function encryptNumber($num)
    {
        $num = $num + 98765432;
        // Convert the number to an 8-digit string
        $encrypted_str = str_pad($num, 8, '0', STR_PAD_LEFT);
        // Replace digits with alphanumeric characters
        $encrypted_str = strtr($encrypted_str, '0123456789', 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ');
        return $encrypted_str;
    }
}

if (!function_exists('decryptNumber')) {
    /**
     * Decrypt an alphanumeric string to the original integer number.
     *
     * @param string $encrypted_str
     * @return int|null
     */
    function decryptNumber($encrypted_str)
    {
        // Replace alphanumeric characters with digits
        $decrypted_str = strtr($encrypted_str, 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ', '0123456789');
        // Convert back to integer
        $num = (int)$decrypted_str;
        // Subtract the constant value used for encryption
        $num = $num - 98765432;
        return $num;
    }
}
if (!function_exists('getPixelsValue')) {
    function getPixelsValue() {
        $setting = DB::table('settings')->first(); // Fetch the first row
        return $setting->pixels ?? null; // Return the 'pixels' column value, or null if not set
    }
}
