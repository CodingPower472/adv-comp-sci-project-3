
<?php

$host = 'tcp:luke-bousfield-database.database.windows.net, 1433';
$username = 'codingpower472@luke-bousfield-database';
$password = 'lukebousfieldcodingpower$&@sql-_-database472';
$db_name = 'adv-comp-sci';

$connOps = array(
    "Database" => $db_name,
    "UID" => $username,
    "PWD" => $password
);

$conn = sqlsrv_connect($host, $connOps);

if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}

?>

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
    <h1 id="top-header">
    <?php
        $isPost = ($_SERVER['REQUEST_METHOD'] === 'POST');
        $info = array();
        if (!$isPost) {
            $info = array(
                name => $_POST["name"],
                email => $_POST["email"],
                awesomeness => $_POST["awesomeness"]
            );
        }
    ?>
    </h1>
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
            // insert into database
            if ($isPost) {
                $name = $info["name"];
                $email = $info["email"];
                $awesomeness = $info["awesomeness"];
                $query = "INSERT INTO users (name, email, awesomeness) VALUES (" . mysql_real_escape_string("'$name', '$email', '$awesomeness'") . ")";
                if (sqlsrv_query($conn, $query) !== false) {
                    echo "Query succeeded";
                } else {
                    echo "Query unsuccessful";
                }
            }
            $entries = array(
                array(
                    name => "Luke",
                    email => "alphawaves@icloud.com",
                    awesomeness => 5.0
                )
            );
            echo $entries;
            foreach ($entries as $entry) {
                $name = $entry["name"];
                $email = $entry["email"];
                $awesomeness = $entry["awesomeness"];
                echo "<tr>";
                echo "<th>$name</th>";
                echo "<th>$email</th>";
                echo "<th>$awesomeness</th>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <form action="/" method="POST">
        <label>
            Name: 
            <input name="name">
        </label>
        <br>
        <label>
            Email:
            <input name="email">
        </label>
        <br>
        <label>
            Awesomeness:
            <input name="awesomeness" type="number">
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>