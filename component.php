<?php

function inputelement($text,$icon,$placeholder,$name,$value){
    $ele="
    <div class=\"input-group mb-2\">
                <div class=\"input-group-prepend\">
                     <div class=\"input-group-text\">$icon</div>
                </div>
                <input type=\"$text\" name=\"$name\" value=\"$value\"  autocomplete=\"off\" class=\"form-control \" id=\"inlineFormInputGroup\" placeholder=\"$placeholder\" required>
            
    </div>
    ";
    echo $ele;
}
?>