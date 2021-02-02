<html>
    <head>
        <title>Program 9</title>
    </head>
    <body>
        <h1>State search</h1>
        <?php 
            include("states.php");
            echo "<hr />";

            preg_match('/\b(\w*xas)\b/', $states, $match);
            $statesList[0] = $match[0];

            preg_match('/\b(k\w*s)\b/i', $states, $match);
            $statesList[1] = $match[0];

            preg_match('/\b(M\w*s)\b/', $states, $match);
            $statesList[2] = $match[0];

            preg_match('/\b(\w*a)\b/', $states, $match);
            $statesList[3] = $match[0];

            list($a, $b, $c, $d) = $statesList;

            echo "<h4>State ending with xas</h4>";
            echo $a;

            echo "<h4>State beginnig with k and ending with s</h4>";
            echo $b;

            echo "<h4>State beginning with M and ending with s</h4>";
            echo $c;

            echo "<h4>State ending with a</h4>";
            echo $d;
        ?>
    </body>
</html>