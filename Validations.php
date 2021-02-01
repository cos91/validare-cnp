<?php


namespace App;

use Exception;

require_once('Constants.php');
require_once('Utils.php');

class Validations
{


    public static function validate($cnpInput)
    {

        $cnpInputArray = str_split($cnpInput);

        $isValid = self::isValid($cnpInputArray);

        if ($isValid !== true) {
            return $isValid->getMessage();
        }

        return 'Cnp-ul este valid!';


    }

    public static function isValid($cnpInputArray)
    {
        try {

            self::validateLength($cnpInputArray);
            self::checkIfArrayIsNumeric($cnpInputArray);
            self::checkCountyExists($cnpInputArray[7] . $cnpInputArray[8]);
            self::validateUsingControlNumber($cnpInputArray);
            self::validateYear($cnpInputArray[0], $cnpInputArray[1] . $cnpInputArray[2]);

        } catch (Exception $exception) {
            return $exception;
        }
        return true;
    }

    public static function validateLength($cnp)
    {
        $cnpLength = count($cnp);
        $defaultLength = Constants::getRequiredCnpLength();

        if ($cnpLength != $defaultLength) {
            throw new Exception("Cnp-ul trebuie sa fie compus din {$defaultLength} caractere! (ati introdus {$cnpLength})");
        }
        return true;


    }

    private static function checkIfArrayIsNumeric($cnpSplitArray)
    {

        foreach ($cnpSplitArray as $value) {
            if (!is_numeric($value)) {
                throw new Exception("Toate caracterele trebuie sa fie numerice '{$value}' nu e numar !!!");
            }
        }

        return true;

    }

    private static function checkCountyExists($jj)
    {

        if (!isset(Constants::getCountyList()[$jj])) {
            throw new Exception("Secventa '{$jj}' care corespunde judetului nu este valida!");
        }

        return true;
    }

    private static function validateUsingControlNumber($cnpSplitArray)
    {
        $hashResult = 0;
        $validationArray = str_split(Constants::getValidationNumber());


        for ($i = 0; $i < Constants::getRequiredCnpLength(); $i++) {
            if ($i < Constants::getRequiredCnpLength() - 1) {
                $hashResult += (int)$cnpSplitArray[$i] * (int)$validationArray[$i];
            }
        }

        unset($validationArray, $i);
        $hashResult = $hashResult % 11;
        if ($hashResult == 10) {
            $hashResult = 1;
        }

        if ((int)$cnpSplitArray[12] !== $hashResult) {

            throw new Exception("Cnp-ul nu este valid!");
        }

        return true;


    }

    private static function validateYear($s, $aa)
    {

        $year = Utils::getYearOfBirthFromCnp($s, $aa);

        if ($year > date('Y')) {
            throw new Exception("Anul nasterii mai mare decat anul curent !");
        }

    }

}