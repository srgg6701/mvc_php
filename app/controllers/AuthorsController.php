<?php
class AuthorsController extends Controller {
    public function __construct($method_name,$entity_id=NULL){
        // получить экземпляр модели
        $model = $this->getModel('Authors'); //echo "<pre>"; var_dump($model); echo "</pre>";
        $method_to_call = "_".$method_name; //echo "<div>file: " . __FILE__ . " : " . __LINE__ . "<HR>method_to_call: ".$method_to_call."</div>";
        $this->$method_to_call($model,$entity_id);
    }
    private function _read($model,$entity_id=NULL){
        // set query
        $query = "SELECT * FROM authors";
        if($entity_id)
            $query.=" WHERE id = " . $entity_id;
        parent::read($model,$query,$entity_id);
        return "<div>" . __METHOD__ . "</div>";
    }
} 