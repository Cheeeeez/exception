<?php
include_once "DivideByZeroException.php";
function divide($numerator, $denominator)
{
    if ($denominator == 0) {
        throw new DivideByZeroException();
    }
    return $numerator / $denominator;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numerator = $_REQUEST["numerator"];
    $denominator = $_REQUEST["denominator"];

}
?>
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
<form action="" method="post">
    <p>Nhập 2 phần tử để thực hiện phép chia</p>
    <label>Numerator</label>
    <input type="number" name="numerator">
    <label>Denominator</label>
    <input type="number" name="denominator">
    <button type="submit">Divide</button>
</form>
<?php
if (isset($numerator) && isset($denominator)) {
    try {
        $result = divide($numerator, $denominator);
        echo "$numerator : $denominator = $result";
    } catch (DivideByZeroException $e) {
        echo 'Error: ' . $e;
    }
}
?>
</body>
</html>
