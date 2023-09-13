<?php

namespace App\Utils;

class Utils
{
    /**
     * Responsável por substituir acentos e caracteres especiais
     *
     * @param  string $string
     * @return string
     */
    public static function removeAccentedChars($string)
    {
        // Tabela de substituição de caracteres acentuados
        $acentos = array(
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ñ' => 'n',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'ý' => 'y',
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ý' => 'Y',
        );

        // Substitui caracteres acentuados pela versão não acentuada
        $string = strtr($string, $acentos);

        // Remove caracteres especiais e substitui espaços por hífens
        $string = preg_replace('/[^a-zA-Z0-9\s-]/', '', $string);

        //Substitui espaços por hífens
        $string = str_replace('-', '', $string);
        
        // Remove múltiplos hífens consecutivos
        //$string = preg_replace('/-+/', '-', $string);

        // Converte para letras minúsculas
        $string = strtolower($string);

        return $string;
    }
}