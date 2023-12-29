<?php

function prevent_redirect_loop()
{
    $_SESSION['redirectCount'] = 0;

    // Kode mencegah redirect loop
    $redirectCount = (isset($_SESSION['redirectCount'])) ? $_SESSION['redirectCount'] : 0;

    if ($redirectCount > 10) {
        throw new Exception('Too many redirects');
    }
    $_SESSION['redirectCount'] = $redirectCount + 1;

    // Clear browser cache and cookies
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);

    // Cek konfigurasi redirect
    // ....

}