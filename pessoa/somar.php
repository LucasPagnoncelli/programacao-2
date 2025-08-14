<?php

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    function somar ($num1, $num2) {
        $soma = $num1 + $num2;
        return $soma;
    }

    echo somar($num1,$num2);
?>