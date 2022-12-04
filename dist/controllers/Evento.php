<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\models\EventoModel;
use dist\utility\Retorno;

class Evento{
    public function printView(){
        MainView::printView("evento");
    }

    public function puxarCampeonatos(){
        Retorno::ok(["rows" => EventoModel::puxarCampeonatos()]);
    }
}

?>