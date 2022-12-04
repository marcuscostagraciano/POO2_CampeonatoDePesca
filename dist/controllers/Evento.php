<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\models\EventoModel;
use dist\utility\Retorno;
use Throwable;

class Evento{
    public function printView(){
        MainView::printView("evento");
    }

    public function puxarCampeonatos(){
        Retorno::ok(["rows" => EventoModel::puxarCampeonatos()]);
    }

    public function inscreverEvento(){
        try{
            EventoModel::inscreverEvento($_POST["id_campeonato"]);
            Retorno::ok();
        }
        catch(Throwable $e){
            Retorno::erro($e->getMessage());
        }
    }
}

?>