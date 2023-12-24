<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>

    <title>Dice Roller Result</title>
</head>
<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
<div class="text-bg-secondary p-3">
<body class="container">
<h1 class="text-bg-dark p-3 p-3">Dice Roller Result</h1><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_of_dice = isset($_POST["no_of_dice"]) ? (int)$_POST["no_of_dice"] : 0;
    $no_of_faces = isset($_POST["no_of_faces"]) ? (int)$_POST["no_of_faces"] : 0;

    if ($no_of_dice > 0 && in_array($no_of_faces, [4, 6, 8, 12])) {
        echo "<h3>Number of dice rolled is $no_of_dice</h3><br>";
        echo "<h3>The type of dice rolled is d$no_of_faces</h3><br>";

        function roller($num, $faces) {
            $result = 0;
            echo '<h3 class= "text-bg-light p-3">Rolls<br>   ';

            for ($x = 0; $x < $num; $x++) {
                $a = rand(1, $faces);?>
                <img src="https://game-icons.net/icons/ffffff/000000/1x1/skoll/inverted-dice-<?php echo $a?>.svg" width = 90 height = 100>
                <?php
                echo  '      ';
                $result += $a;
            }
            echo '</h3> <br>';
            echo '<h3>Total count of rolls: ' . $result . '</h3>';
        }

        roller($no_of_dice, $no_of_faces);
    } else {
        echo '<h4>Please enter valid values for number of dice and faces.</h4>';
    }
} else {
    echo '<h4>Invalid request.</h4>';
}
?>
<form action="index.php" method="post">
    <br>
    <button type="submit" class="btn btn-success">Roll again</button>
</form>
</body>
</div>
</div>
</html>
