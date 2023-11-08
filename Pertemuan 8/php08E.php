<!DOCTYPE html>
<html lang='en-GB'>
<head>
    <title>PHP 08E</title>
    <META name="description" content="php08E.php">
</head>
<body>
    <h1>Variable-length Argument Lists</h1>
    <?php
        function reduceOp(){
            $symbols = array('+','-','*');
            $arguments = func_get_args();
            $lastArgument = array_pop($arguments);
            if (!is_array($lastArgument)){
                throw new Exception ("TypeError");
            };
            $symbol = $lastArgument["op"];
            if (!in_array($symbol,$symbols)){
                throw new Exception ("ValueError");
            };
            if (func_num_args()==1){
                return null;
            };
            $result = array_shift($arguments);
            foreach ($arguments as $arg) {
                switch ($symbol) {
                case '+':
                    $result += $arg;
                    break;
                case '-':
                    $result -= $arg;
                    break;
                case '*':
                    $result *= $arg;
                    break;
                }
            }
            return $result;
        }
        

        try {
            echo "1: ", reduceOp(2,3), "<br>\n"; # throws an exception
        } catch (Exception $e) {
            echo "1: Exception ",$e->getMessage(),"<br>\n"; # 'TypeError'
        }
        
        try {
            echo "2: ",reduceOp(2,3,array('op' => '/')), # throws an exception
        "<br>\n";
        } catch (Exception $e) {
            echo "2: Exception ",$e->getMessage(),"<br>\n"; # 'ValueError'
        }

        echo "3: ",reduceOp(array('op'=>'+')), # should return NULL
        "<br>\n";
        echo "4: ",reduceOp(2,array('op' => '*')), # should return 2
        "<br>\n";
        echo "5: ",reduceOp(2,3,5,array('op' => '+')), # should return 10
        "<br>\n";
        echo "6: ",reduceOp(2,3,5,7,array('op' => '*')), # should return 210
        "<br>\n";
        echo "7: ",reduceOp(2,3,5,7,11,array('op' => '-')),# should return -24
        "<br>\n";
    ?>
</body>
</html>