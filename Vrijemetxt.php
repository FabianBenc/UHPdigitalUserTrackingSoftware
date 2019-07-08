<!DOCTYPE html>
<html>

<body>
    <?php
    $time = intval($_POST['time']);
    if (!file_exists('vrijeme.txt')) {
        file_put_contents('vrijeme.txt', $time . "\n");
    } else {
        file_put_contents('vrijeme.txt', $time . "\n");
    }
    ?>

</body>

</html>