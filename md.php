<?php
$res = '';
if (file_exists($_GET['file'] . '.md')) {
  require_once('Parsedown.php');
  $parsedown = new Parsedown();

  // gets file content
  $md = file_get_contents($_GET['file'] . '.md');
  $res .= $parsedown->parse($md);

  // get page title
  preg_match('/<h1>(.*)<\/h1>/', $res, $matches);
  $title = $matches[1];

  // footer
  $res .= '<footer>&copy; Julien Sébire 2011-' . date('Y') . '</footer>';
} else {
  $res .= 'File not found: ' . $_GET['file'] . '.md';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?> | Julien Sébire's Dev Doc</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<style type="text/css">
    body{background:#fff;font-family:Sans-Serif;font-size:1em;}
    h2{border-bottom:1px solid #666;}
    pre{border:1px solid #ccc;background:#ccc;border-radius:10px;color:#300;padding:5px;}
    pre code.language-content{color:#099;}
    footer {border-top:1px solid #ccc;text-align:center;font-size:0.8em;}
    strong {color:#f00;}
</style>
</head>
<body>
    <?php echo $res; ?>
</body>
</html>
