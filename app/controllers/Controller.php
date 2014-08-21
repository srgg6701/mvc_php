<?php

class Controller{
    protected function redirect(){

    }
    protected function getModel($model_name){
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
                     'models' . DIRECTORY_SEPARATOR .
                     ucfirst($model_name) . 'Model.php';
        $modelName = $model_name . "Model";
        return new $modelName();
    }
    protected function create($post){

    }
    protected function read($model,$query,$id=NULL){
        echo "<div>" . __METHOD__ . "</div>";
        echo "<pre>"; var_dump($model); echo "</pre>";
        echo "<div>query: ".$query."</div>";
        echo "<div>id: ".$id."</div>";
    }
    protected function update($id){

    }
    protected function delete($id){

    }
}