<?php
class TestController extends Controller{

    public $first='One';
    public static $state='Unknown';

    public function __construct(){
        echo showMethodName(__METHOD__);


    }

    public function testStatic(){
        echo showMethodName(__METHOD__);
    }

    public function testCommon(){
        echo showMethodName(__METHOD__);
    }
}