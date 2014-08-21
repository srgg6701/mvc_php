<?php
class AuthorsController extends Controller {

    private $entity_name='Authors';
    public $content=NULL;

    public function __construct($method_name,$entity_id=NULL){

            $this->temp_data=showMethodName(__METHOD__);

        // создать экземпляр модели в родительском контроллера
        $this->setModel($this->entity_name);

            ob_start();
                echo "<pre>"; var_dump($this->model); echo "</pre>";
                $this->temp_data.=ob_get_contents();
            ob_end_clean();

        // назначить имя вызываемого метода
        $method_to_call = "_".$method_name;
        // получить данные из модели, передать во view
        $this->$method_to_call($entity_id);
    }
    private function _read($entity_id=NULL){

            $this->temp_data.=showMethodName(__METHOD__);

        // set query
        $query = "SELECT * FROM authors";
        if($entity_id)
            $query.=" WHERE id = " . $entity_id;

        // получить данные из модели и сохранить как член класса
        parent::read($query,$entity_id);
        $this->_setView('read',$entity_id);
        return true;
    }
    private function _setView($method_name,$entity_id=NULL){

        $this->temp_data.=showMethodName(__METHOD__);

        $view=parent::setView($this->entity_name);
        $this->content=$view->$method_name($this->modelData);

            $this->content=$this->temp_data . $this->content;
    }
} 