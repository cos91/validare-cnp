<?php


namespace App;


class Constants
{

    private const DEFAULT_VALIDATION_NUMBER = "279146358279";
    private const CNP_LENGTH = 13;
    private const  COUNTY_LIST = [
        "01" => "Alba",
        "02" => "Arad",
        "03" => "Argeș",
        "04" => "Bacău",
        "05" => "Bihor",
        "06" => "Bistrița-",
        "07" => "Botoșani",
        "08" => "Brașov",
        "09" => "Brăila",
        "10" => "Buzău",
        "11" => "Caraș-",
        "12" => "Cluj",
        "13" => "Constanța",
        "14" => "Covasna",
        "15" => "Dâmbovița",
        "16" => "Dolj",
        "17" => "Galați",
        "18" => "Gorj",
        "19" => "Harghita",
        "20" => "Hunedoara",
        "21" => "Ialomița",
        "22" => "Iasi",
        "23" => "Ilfov",
        "24" => "Maramureș",
        "25" => "Mehedinți",
        "26" => "Mureș",
        "27" => "Neamț",
        "28" => "Olt",
        "29" => "Prahova",
        "30" => "Satu Mare",
        "31" => "Sălaj",
        "32" => "Sibiu",
        "33" => "Suceava",
        "34" => "Teleorman",
        "35" => "Timiș",
        "36" => "Tulcea",
        "37" => "Vaslui",
        "38" => "Vâlcea",
        "39" => "Vrancea",
        "40" => "București",
        "41" => "București",
        "42" => "București",
        "43" => "București",
        "44" => "București",
        "45" => "București",
        "46" => "București",
        "51" => "Călărași",
        "52" => "Giurgiu",

    ];

    private const  MONTH_LIST = [
        "01" => "Ianuarie",
        "02" => "Februarie",
        "03" => "Martie",
        "04" => "Aprilie",
        "05" => "Mai",
        "06" => "Iunie",
        "07" => "Iulie",
        "08" => "August",
        "09" => "Septembrie",
        "10" => "Octombrie",
        "11" => "Noiembrie",
        "12" => "Decembrie"
    ];


    public static function getValidationNumber(): string
    {
        return self::DEFAULT_VALIDATION_NUMBER;
    }

    public static function getRequiredCnpLength(): int
    {
        return self::CNP_LENGTH;
    }

    public static function getCountyList(): array
    {
        return self::COUNTY_LIST;
    }

    public static function getMonthList(): array
    {
        return self::MONTH_LIST;
    }


}