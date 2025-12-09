<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 3</title>
    <style>
        p{
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
    <?php
        for ($i = 1; $i <= 100; $i++) {
            if($i%2== 0){
                echo "<span style='color: red; font-weight: bold; margin-right: 12px;'>" . $i . "</span>";
            }else if($i%2!= 0){
                echo "<span style='color: green; font-style: Italic; font-weight: bold; margin-right: 12px;'>" . $i . "</span>";
            }
        }
    ?>
</body>
</html></html>