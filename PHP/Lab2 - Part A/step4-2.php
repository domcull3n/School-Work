<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <h1>This page was rendered in PHP version <?php echo phpversion(); ?></h1>
        <h1>This is the version number of PHP's ZEND scripting <?php echo zend_version(); ?></h1>
        <h1><?php echo ini_get("default_mimetype"); ?></h1>
    </body>
</html>