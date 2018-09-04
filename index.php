
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Website</title>
</head>
<body>
    <h1 id="top-header">Welcome to my awesome website</h1>
    <div id="img-container">
        <img src="img/photo.jpeg">
    </div>
    <audio autoplay>
        <source src="audio/intro.mp3" type="audio/mpeg">
    </audio>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Awesomeness</th>
        </thead>
        <tbody>
            <?php
            $file = fopen('users.txt', 'a') or die('Unable to open file');
            $entries = preg_split('\n', fread($file));
            echo $entries;
            foreach ($entries as $entry) {
                $splitted = preg_split(',', $entry);
                $name = $splitted[0];
                $email = $splitted[1];
                $awesomeness = $splitted[2];
                echo "<tr>";
                echo "<th>$name</th>";
                echo "<th>$email</th>";
                echo "<th>$awesomeness</th>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>