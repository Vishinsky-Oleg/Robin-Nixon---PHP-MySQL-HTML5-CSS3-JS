<?php
$f = $c = "";
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);

if (is_numeric($f)) {
    $c = intval((5/9) * ($f - 32));
    $out = "$f &deg;f equals $c &deg;c";
} elseif (is_numeric($c)) {
    $f = intval((9/5) * ($c + 32));
    $out = "$c &deg;f equals $f &deg;c";
} else $out = '';

echo <<<_END
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <pre>
    Enter either Fahrenheit or Celsius and click on Convert
    
    <b>$out</b>
    <form method="post" action="">
    <label>Fahrenheit<input type="text" name="f" size="7" required="required"></label>
    <label>Celsius<input type="text" name="c" size="7" autofocus="autofocus"></label>
    <input type="submit" value="Convert">
</form>
</pre>
</body>
</html>
_END;

function sanitizeString($string) {
    if (get_magic_quotes_gpc()) {
        $string =stripslashes($string);
    }
    $string = strip_tags($string);
    $string = htmlentities($string);
    return $string;
}


