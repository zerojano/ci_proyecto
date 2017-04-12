template-desarrollo.php<?php
header("Expires: Thu, 12 Dic 1981 08:34:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP CI NO | Example</title>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    
  </head>
  <body class="nav-md">
          <?php
            $this->load->view($contenido);
          ?>
  </body>
</html>
