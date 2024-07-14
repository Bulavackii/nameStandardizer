<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Name Standardizer</title>
</head>
<body>

<?php
function ucfirst_utf8($str) {
    return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $patronymic = trim($_POST['patronymic']);

    $firstName = ucfirst_utf8($firstName);
    $lastName = ucfirst_utf8($lastName);
    $patronymic = ucfirst_utf8($patronymic);

    $fullName = "$lastName $firstName $patronymic";

    $surnameAndInitials = "$lastName " . mb_substr($firstName, 0, 1) . "." . mb_substr($patronymic, 0, 1) . ".";

    $fio = mb_substr($lastName, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($patronymic, 0, 1);

    echo "<p>Полное имя: '$fullName'</p>";
    echo "<p>Фамилия и инициалы: '$surnameAndInitials'</p>";
    echo "<p>Аббревиатура: '$fio'</p>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="lastName">Фамилия:</label><br>
    <input type="text" id="lastName" name="lastName" required><br>
    <label for="firstName">Имя:</label><br>
    <input type="text" id="firstName" name="firstName" required><br>
    <label for="patronymic">Отчество:</label><br>
    <input type="text" id="patronymic" name="patronymic" required><br><br>
    <input type="submit" value="Отправить">
</form>

</body>
</html>