<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>好きな数値は何？</title>
</head>

<body>
    <form action="" method="post">
        <label>好きな数値を入力してください：
            <input type="number" id="cal" name="cal" />
        </label>
        <input type="submit">
    </form>
    <p>2倍の数値です：
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $_POST['cal'] * 2;
        }
        ?>
    </p>

</body>

</html>
