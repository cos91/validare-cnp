<?php

namespace App;

require_once('Validations.php');
require_once('CnpInterface.php');
require_once('Utils.php');

ini_set('display_errors', 1);


class Cnp implements CnpInterface
{

    public static function validate($cnp): string
    {
        return Validations::validate($cnp);
    }


}



$testCnpValid = Cnp::validate("5200725270010");
$testAnNastereDepasit = Cnp::validate("5270725270018");
$testJudetGresit = Cnp::validate("5200725990010");
$testVadilareNumeric = Cnp::validate("5a0075990010");
$testDimendiune = Cnp::validate("520072");


echo $testCnpValid;
echo "<br>";
echo $testAnNastereDepasit;
echo "<br>";
echo $testJudetGresit;
echo "<br>";
echo $testVadilareNumeric;
echo "<br>";
echo $testDimendiune;


