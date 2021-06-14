<?php
    interface IModel{
        
        public function save($array);
        public function getAll($search);
        public function get($id);
        public function delete($id);
        public function update($array);
        // public function from($array);
    }
