<?php


if(!function_exists('render_submit_feedback')){
    function render_submit_feedback($key = "", $class = ""){
        if(session()->getFlashdata($key) !== null) {?>
            <div class="<?= $class ?>">
                <?= session()->getFlashdata($key) ?>
            </div>
        <?php
        }
    }
}

if(!function_exists('display_submit')){
    function display_submit($ref){
        render_submit_feedback($ref ."-success","alert alert-success");
        render_submit_feedback($ref ."-error","alert alert-danger");
    }
}


if(!function_exists('submit_success')){
    function submit_success($ref,$value){
        if(is_array($value)){
            $value = implode("<br/>", $value);
        }
        session()->setFlashdata($ref ."-success",$value);
    }
}

if(!function_exists('submit_error')){
    function submit_error($ref,$value){
        if(is_array($value)){
            $value = implode("<br/>", $value);
        }
        session()->setFlashdata($ref ."-error",$value);
    }
}