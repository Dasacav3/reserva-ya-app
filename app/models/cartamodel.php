<?php

class CartaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        try{
            $query = $this->prepare("SELECT * FROM");
        }catch(Exception $e){
            return $e->getMessage();
        }
        return true;

        $this->close();
    }
}
