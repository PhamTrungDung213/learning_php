<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 1</title>
</head>
<body>
    <h1>Tai lieu hoc lap trinh web</h1>
    <?php 
    echo"<hr>";
    ?>
    <p>Tai lieu hoc html</p>
    <p>Tai lieu hoc css</p>
    <?php 
    echo"<h2>Tai lieu hoc JavaScript</h2>";
    echo"<h3>Tai lieu hoc MySQL</h3>";
    echo"<h3>Tai lieu hoc PHP</h3>";
    ?>
    <hr>
    <?php 
    $text="Tu co ban"." "."den nang cao";
    echo $text;
    ?>
    <?php 
        function showValue(){
            $a=5;
            echo $a;
        }
        showValue();
        echo $a;
    ?>
    <br>  
</body>
</html></html>