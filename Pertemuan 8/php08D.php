<!DOCTYPE html>
<html>
<head>
    <title>PHP 08D</title>
</head>
<body>
    <h1>Associative Arrays</h1>
    <?php
        $dict1 = array('a' => 1, 'b' => 2);
        $dict2 = $dict1;
        $dict1['b'] = 4;
        echo "\$dict1['b'] = ", $dict1['b'],"<br>\n";
        echo "\$dict2['b'] = ", $dict2['b'],"<br>\n";

        echo "\$dict1['a'] = ", $dict1['a'],"<br>\n";
        echo "\$dict1['b'] = ", $dict1['b'],"<br>\n";
        foreach($dict1 as $x => $val) {
            echo "$x = $val<br>";
        }

        $string = "lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit";
        $dict = array();
        $words = explode(" ", $string);

        foreach ($words as $word) {
            if (array_key_exists($word, $dict)) {
                $dict[$word]++;
            } else {
                $dict[$word] = 1;
            }
        }
        
        foreach ($dict as $word => $count) {
            echo $word . ' -> ' . $count . '<br>';
        }

        echo "<br>";
        krsort($dict);
        arsort($dict);
        echo "<table>\n";
        echo "<tr><th>Kata</th><th> Jumlah Kemunculan </th> </tr>";
        foreach ($dict as $word => $count)
            echo "<tr><td class='left'>$word</td><td class='right' align='right'>$count</td><tr>";
        echo "</table>";
    ?>
</body>
</html>