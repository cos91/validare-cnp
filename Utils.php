<?php


namespace App;


use Exception;

class Utils
{
    public static function getYearOfBirthFromCnp($s, $aa): int
    {

        $year = $aa;

        try {
            switch ($s) {
                case 1 :
                case 2 :
                case 7 :
                case 8 :
                case 9 :
                    {
                        $year += 1900;
                    }
                    break;
                case 3  :
                case 4 :
                    {
                        $year += 1800;
                    }
                    break;
                case 5  :
                case 6 :
                    {
                        $year += 2000;
                    }
                    break;

                default :
                {
                    throw new Exception("Prima cifra nu este valida! ( Cifra introdusa: {$s} )");
                }
            }
        } catch (Exception $e) {
            return $e->getCode();
        }

        return $year;

    }

    public static function getGender($s): string
    {

        $gender = '';

        switch ($s) {
            case 1 :
            case 3 :
            case 5 :
            case 7 :
            case 9 :
                {
                    $gender = 'masculin';
                }
                break;
            case 2 :
            case 4 :
            case 6 :
            case 8 :
                {
                    $gender = 'feminin';
                }
                break;

            default :
            {
                $gender = "necunoscut";
            }
        }
        return $gender;

    }


    public static function getCountyOfBirth($jj): string
    {

        return Constants::getCountyList()[$jj];

    }

    public static function getMonthOfBirth($ll): string
    {
        return Constants::getMonthList()[$ll];

    }


}