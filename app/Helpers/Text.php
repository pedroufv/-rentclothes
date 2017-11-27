<?php

namespace App\Helpers;

class Text {
    public function urlFriendly($text, $delimiter = '-')
    {
        setlocale(LC_CTYPE, 'en_US.UTF-8');

        // replace non letter or digits by -
        $text = preg_replace('#[^\\pL\d]+#u', $delimiter, $text);

        // trim
        $text = trim($text, $delimiter);

        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);

        return $text;
    }

    public function money($valor = 0) {
        $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");

        $z=0;
        $rt='';

        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        for ($i = 0; $i < count($inteiro); $i++)
            for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++)
                $inteiro[$i] = "0" . $inteiro[$i];

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por ","
        $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
        for ($i = 0; $i < count($inteiro); $i++) {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count($inteiro) -1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($valor == "000")
                $z++;
            elseif ($z > 0)
                $z--;
            if (($t == 1) && ($z > 0) && ($inteiro[0] > 0))
                $r .= (($z > 1) ? " de " : "") . $plural[$t];
            if ($r)
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : "") . $r;
        }

        return ($rt ? trim($rt) : "zero");
    }

    public function onlyDigits($text)
    {
        return preg_replace('/\D/', '', $text);
    }

    public function formatCPF($string)
    {
        $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) .
            '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);

        return $string;
    }

    public function formatCNPJ($string)
    {
        $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
            '.' . substr($string, 5, 3) . '/' . substr($string, 8, 4) .
            '-' . substr($string, 12, 2);

        return $string;
    }

    public function formatRG($string)
    {
        $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
            '.' . substr($string, 5, 3);

        return $string;
    }

    public function formatPhone($string)
    {
        if (strlen($string) > 10)
            $string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 1) .
                '.' . substr($string, 3, 4) . '-' . substr($string, 7, 4);
        else
            $string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 4) .
                '-' . substr($string, 6, 4);

        return $string;
    }
}
