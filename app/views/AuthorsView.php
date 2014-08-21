<?php
class AuthorsView {
    public function read($modelData){
            $html =showMethodName(__METHOD__);
            $html.=$modelData;
            $html.="<div>HTML coming from view after \$modelData being handled...</div>";
            $html="<div class='info'>" . $html . "</div>";
        return $html;
    }
} 