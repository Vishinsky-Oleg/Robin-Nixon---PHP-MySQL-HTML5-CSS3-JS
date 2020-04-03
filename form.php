<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else $name = 'Not entered';

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
    Your name is: $name<br>
    <label method="post" action="form.php">
    What is Your name?
    <input type="text" name="name" value="Vladimir"><br>
    
    <textarea name="tex" cols="50" rows="15" wrap="hard">Textarea</textarea> <br>
    
    YES <input type="checkbox" name="check" value="15" checked="checked"><br>
    
    <label>Option 1 <input type="radio" name="rad" value="1"></label>
    <label>Option 2 <input type="radio" name="rad" value="2" checked="checked"></label>
    <label>Option 3 <input type="radio" name="rad" value="3"><br></label>
    
    <label>SELECT<select name="sel" size="1">
    <option value="1">$name</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    </select><br></label>
    
    <label><input type="url" name="site" list="links"> </label><br>
    <datalist id="links">
    <option label="GOOGLE" value="http://google.com"></option>
    <option label="yandex" value="http://yandex.com"></option>
    <option label="mail" value="http://mail.com"></option>
    <option label="yahoo" value="http://yahoo.com"></option>
</datalist>

    <label>Color <input type="color" name="color"></label><br>
    <input type="number" name="num"><br>
    <input type="range" name="num1" min="0" max="100" value="50" step="1"><br>
    <input type="date" name="date"><br>
    <input type="time" name="time"><br>

    <input type="submit">
</form>
</body>
</html>
_END;


