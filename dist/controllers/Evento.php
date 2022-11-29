<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\models\EventoModel;

class Evento{
    public function printView(){
        MainView::printView("evento");
    }

    public function puxarCampeonatos(): array{
        return EventoModel::puxarCampeonatos();
    }
}

?>