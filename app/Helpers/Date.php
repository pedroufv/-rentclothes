<?php
namespace App\Helpers;

class Date
{
    /**
     * @param $ano ano em que se quer calcular os feriados que não são fixos
     * @return array $holidays
     */
    public function getHolidays($ano)
    {
        $dia = 86400;
        $dates = array();
        $dates['pascoa'] = easter_date($ano);
        $dates['sexta_santa'] = $dates['pascoa'] - (2 * $dia);
        $dates['carnaval'] = $dates['pascoa'] - (47 * $dia);
        $dates['corpus_cristi'] = $dates['pascoa'] + (60 * $dia);
        $holidays = array (
            '01/01',
            date('d/m',$dates['carnaval']),
            date('d/m',$dates['sexta_santa']),
            date('d/m',$dates['pascoa']),
            '21/04',
            '01/05',
            date('d/m',$dates['corpus_cristi']),
            '12/10',
            '02/11',
            '15/11',
            '25/12',
        );

        return $holidays;
    }
}