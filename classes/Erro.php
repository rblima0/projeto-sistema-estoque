<?php

class Erro {
    public static function trataErro(Exception $e) {
        if(DEBUG){
            echo '<pre>';
            print_r($e);
            echo $e->getMessage();
        } else {
            echo $e->getMessage();
        }
        exit;
    }
}