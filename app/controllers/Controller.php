<?php

class Controller{
    // экземпляр модели
    protected $model=NULL;
    // данные модели
    protected $modelData=NULL;

    // исключительно для тестирования:
    public $temp_data;

    protected function redirect(){

    }

    /**
     * Создать экземпляр нужной модели и сохранить как член класса
     * @param $model_name
     */
    protected function setModel($model_name){

        $this->temp_data.=showMethodName(__METHOD__, 'sky');

        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .
                                  '..' . DIRECTORY_SEPARATOR .
                              'models' . DIRECTORY_SEPARATOR .
                                        ucfirst($model_name) . 'Model.php';
        $modelName = $model_name . "Model";
        $this->model= new $modelName();
        return true;
    }

    /**
     * Создать экземпляр нужного представления вернуть дочернему классу
     * @param $view_name
     */
    protected function setView($view_name){

            $this->temp_data.=showMethodName(__METHOD__, 'sky');

        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .
                                  '..' . DIRECTORY_SEPARATOR .
                               'views' . DIRECTORY_SEPARATOR .
                                         ucfirst($view_name) . 'View.php';
        $viewName = $view_name . "View";
        return new $viewName();
    }

    protected function create($post){

    }

    /**
     * Получить данные модели
     * @param $query
     * @param null $id
     * @return string
     */
    protected function read($query,$id=NULL){

            $this->temp_data.=showMethodName(__METHOD__, 'sky');

            $data = "<div>query = $query</div>";
            if($id) $data.= "<div>id = $id</div>";
            $data.= "<div>Model data will come here...</div>";

        // сохранить данные, полученные из модели как член класса
        $this->modelData=$data;

        return true;
    }
    protected function update($id){

    }
    protected function delete($id){

    }
}