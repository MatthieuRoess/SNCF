<?php 
    class modeleFonction{
        public static function getJson($file){
            $json = file_get_contents($file);
            $listeCd = json_decode($json);
            return $listeCd;
        }
    }
?>