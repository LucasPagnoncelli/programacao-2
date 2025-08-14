<?php

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    function subtrair($num1, $num2) {
        $subtrair = $num1 - $num2;
        return $subtrair;
    }

    echo subtrair($num1,$num2);
?>