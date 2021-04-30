<?php

class Controller{

    public function __construct(){
        $this->view = new View();
    }

    public function loadModel($model){
        $url = 'app/models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName;
        }
    }

}