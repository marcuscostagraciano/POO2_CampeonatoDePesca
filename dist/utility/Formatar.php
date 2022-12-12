<?php

namespace dist\utility;

class Formatar{
    public static function cpfStringParaInt(string $cpf_string){
        return intval(preg_replace("/([\.\-])/", "", $cpf_string));
    }
}

?>