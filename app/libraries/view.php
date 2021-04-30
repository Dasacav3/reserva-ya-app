<?php

class View{

    public function __construct(){
        //echo "<p>Vista base</p>";
    }

    public function render($nombre){
        $path = 'app/views/' . $nombre . '.php';
        if(file_exists($path)){
            require $path;
        }else{
            $path = new Error_Manage();
        }

    }


}