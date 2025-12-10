<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Test</title>
</head>
<body>
    <form action="../php/process.php" method="GET">
        <input type="text" name="search" placeholder="Your name :"><br>
        <button type="submit">Send</button>
    </form>
    <hr>
    <form action="../php/process.php" method="POST">
        <input type="text" name="fullname" placeholder="Your name :"><br>
        <button type="submit">Send</button>
    </form>
</body>
</html></html>