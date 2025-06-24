<?php 

echo "Cookies" . "<br>";
setcookie(
    "user_token",            // name
    "abc123",                // value
    time() + (86400 * 7),    // expires in 7 days
    "/",                     // path (root of site)
    "",                      // domain (default is current)
    true,                    // secure (only over HTTPS)
    true                     // httponly (not accessible via JavaScript)
);

print_r(PHP_SESSION_ACTIVE);