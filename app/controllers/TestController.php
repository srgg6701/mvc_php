<?php
class TestController extends Controller{

    public $first='One';
    public static $state='Unknown';

    public function __construct(){
        echo "<div>".__METHOD__."</div>";


    }

    public function testStatic(){
        echo "<div>".__METHOD__."</div>";
    }

    public function testCommon(){
        echo "<div>".__METHOD__."</div>";
    }
}