<?php
    require "class/algorithms.php";
    $algorithms = new algorithms();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Algorithms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class=" text-center">
    <h1>Algorithms</h1>
</div>
<div class="container">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h1>ამოცანა 1</h1>
            <p>
                <?php
                    echo $algorithms->taskOne('bitcoin take over the world maybe who knows perhaps')."<br/>";
                    echo $algorithms->taskOne('turns out random test cases are easier than writing out basic ones');
                ?>
            </p>
        </li>
        <li class="list-group-item">
            <h1>ამოცანა 2</h1>
            <div>
                <p>
                    <?php
                       $arr = [1, 2, [3, 4, [5]]];
                       echo $algorithms->taskTwo($arr);
                    ?>
               </p>
            </div>
        </li>
        <li class="list-group-item">
            <h1>ამოცანა 3</h1>
            <div>
                <p>
                    <?php  echo $algorithms->taskThree('Success');  ?>
                </p>
            </div>
        </li>

        <li class="list-group-item">
            <h1>ამოცანა 4</h1>
            <div>
                <p>
                    <?php   echo $algorithms->taskFour('3(ab)"');  ?>
                </p>
            </div>
        </li>


        <li class="list-group-item">
            <h1>ამოცანა 5</h1>
            <div>
                <p>
                    <?php   echo $algorithms->rangeExtraction([-6,-3,-2,-1,0,1,3,4,5,7,8,9,10,11,14,15,17,18,19,20]);  ?>
                </p>
            </div>
        </li>

        <li class="list-group-item">
            <h1>ამოცანა 6</h1>
            <div>
                <pre>
                    <?php   print_r( $algorithms->taskSix([[1,2,3],
                            [8,9,4],
                            [7,6,5] ]));  ?>
                </pre>
            </div>
        </li>
    </ul>

</div>
</body>
</html>
