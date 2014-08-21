<?php
class ReadersController extends Controller {
    public $name = "Super-pupper Controller";
    public $surname = "Uknown";
    public static $home = "Default";

    public function __construct(){
        //echo "<h1>Я тут! Не ждали конструкта-то?</h1>";
        //$this->testStatic();
        //$this->testCommon();
    }

    public static function testStatic($home_name){
        //static $counter=1;
        showMethodName(__METHOD__);
        //$counter+=1;
        echo "<div>Before: ".ReadersController::$home."</div>";
        self::$home=$home_name;
        echo "<div>After: ".ReadersController::$home."</div>";
    }
    public function testCommon($home_name){
        showMethodName(__METHOD__);
        echo "<div>Before: ".$this->surname."</div>";
        $this->surname=$home_name;
        echo "<div>After: ".$this->surname."</div>";
        //echo "<div>Before: ".self::$home."</div>";
        //self::$home = $home_name;
        //echo "<div>After: ".self::$home."</div>";
    }
}