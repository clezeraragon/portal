<?php

class Util
{

    /**
     * @param $value = data no formato Mysql
     * @return date no formato brasileiro
     */
    public static function toView($value)
    {
        if ($value) {
            return date('d/m/Y', strtotime($value));
        }
    }

    /**
     * @param $value = data e hora no formato Mysql
     * @return date e hora no formato brasileiro
     */
    public static function toTimestamps($value)
    {
        return date('d/m/Y - H:i:s', strtotime($value));
    }

    /**
     * @param $value = data no formato Brasileiro
     * @return date = no formato MySQL
     */
    public static function toMySQL($value)
    {
        $date = explode('/', $value);
        return $date[2] . '-' . $date[1] . '-' . $date[0];
    }

    public static function truncate($string, $height)
    {
        return current(explode('\n', wordwrap($string, $height, ' ...\n')));
    }

    public static function number($value, $decimal)
    {
        return number_format($value, $decimal, ',', '.');
    }

    public static function formatBoolean($value)
    {

        return ($value) ? "Sim" : "Não";

    }

    public static function formatStatus($value)
    {
        return ($value) ? "Ativo" : "Inativo";
    }

    public static function formatStatusUso($value)
    {
        return ($value) ? "Usado" : "Pendente";
    }

    /**
     * @param $string do usuario
     * @return string da pronizada, sem acento e caracteres especiais
     * RGS-001
     */
    public static function formatUrl($string)
    {
        $url_formatada = null;
        $url_formatada = static::removerAcento(trim($string));
        $url_formatada = preg_replace('/[^a-zA-Z0-9- ]/', '', $url_formatada);
        $url_formatada = preg_replace('/[ ]/', '-', $url_formatada);
        $url_formatada = preg_replace('/([-*]+)/', '-', $url_formatada);
        return strtolower($url_formatada);
    }

    public static function removerAcento($str)
    {
        $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
        $to = "aaaaeeiooouucAAAAEEIOOOUUC";

        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        return strtr($str, $mapping);
    }

    public static function numberToMySQL($number)
    {
        $number = preg_replace('/R\$/', "", $number);
        return trim(preg_replace("/,/", ".", preg_replace("/\./", "", $number)));
    }

    public static function formataDataCadastro($date)
    {

        $date = new \DateTime($date);

        $meses = $date->format('m');


        $result = array('1' => ($meses == '01' ? 'Janeiro' : null),
            '2' => ($meses == '02' ? 'Fevereiro' : null),
            '3' => ($meses == '03' ? 'Março' : null),
            '4' => ($meses == '04' ? 'Abril' : null),
            '5' => ($meses == '05' ? 'Maio' : null),
            '6' => ($meses == '06' ? 'Junho' : null),
            '7' => ($meses == '07' ? 'Julho' : null),
            '8' => ($meses == '08' ? 'Agosto' : null),
            '9' => ($meses == '09' ? 'Setembro' : null),
            '10' => ($meses == '10' ? 'Outubro' : null),
            '11' => ($meses == '11' ? 'Novembro' : null),
            '12' => ($meses == '12' ? 'Dezembro' : null),


        );

        foreach ($result as $mes) {

            if ($mes != null) {
                return 'Membro desde '.$mes.' de '.$date->format('Y');
            }
        }


    }
    public static function shuffle_assoc(&$array)
    {
        $keys = array_keys($array);

        shuffle($keys);

        foreach ($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return $array;
    }


}