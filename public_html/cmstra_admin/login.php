<?php
// (A) LOGIN CHECKS
//require '2-check.php';
define('check', true);
require __DIR__ . '/../../CMStra_db/2-check.php';
 
// (B) LOGIN PAGE HTML
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Security-Policy" content="connect-src 'self'; font-src 'self'; frame-src 'self'; object-src 'none'; prefetch-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'">
  <meta name="robots" content="noindex, nofollow, noimageindex, noarchive, nosnippet, nocache, nositelinkssearchbox, nopagereadaloud, notranslate, noodp, noydir, noyaca">
  <title>CMStra</title>
  <meta charset="utf-8">
  <style>
    body {
      font-family: sans-serif;
    }

    div.login {
      padding: 10px;
      margin: auto;
      max-width: 400px;
      text-align: right;
    }

    div.login p.img {
      text-align: center;
    }

    div.login p img {
      height: 48px;
    }

    p a.refresh-captcha img {
      height: 28px;
    }

    #bad-login {
      color: red;
      font-size: 1.4em;
    }
  </style>
</head>

<body> 
  <div class="login">
    <p class="img"><img src="logo.png" alt="CMStra"></p>
    <?php if (isset($failed)) { ?>
      <p id="bad-login">Invalid captcha, user or password.</p>
    <?php } ?>

    <form id="login-form" method="post" target="_self">
      <fieldset id="login">
        <legend>Login</legend>
        <p><label for="user">User <input type="text" id="user" name="user" required></label></p>
        <p><label for="password">Password <input type="password" id="password" name="password" required></label></p>
        <p><label for="captcha">Write the letters <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}"></label></p>
        <p><img src="captcha.php" alt="CAPTCHA" class="captcha-image"> <a href="#" class="refresh-captcha"><img src="reload.png" alt="refresh"></a>
        <p>

          <input type="submit" value="Login">
      </fieldset>
    </form>
  </div>

  <script>
    var refreshButton = document.querySelector(".refresh-captcha");
    refreshButton.onclick = function() {
      document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
    }
  </script>

</body>

</html>