<?php
/**
 * Helper Klasse: submit_feedback
 *
 * Diese Klasse ermöglicht eine einheitliche Darstellung des Resultates einer Submit Anfrage
 */

if(!function_exists('render_submit_feedback')){
    function render_submit_feedback($key = '', $class = ''){
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
        render_submit_feedback($ref . '-success', 'alert alert-success');
        render_submit_feedback($ref . '-error', 'alert alert-danger');
    }
}


if(!function_exists('submit_success')){
    function submit_success($ref,$value){
        if(is_array($value)){
            $value = implode('<br/>', $value);
        }
        session()->setFlashdata($ref . '-success',$value);
    }
}

if(!function_exists('submit_error')){
    function submit_error($ref,$value){
        if(is_array($value)){
            $value = implode('<br/>', $value);
        }
        session()->setFlashdata($ref . '-error',$value);
    }
}

if(!function_exists('input_error')){
    function input_error($ref,$name){
        if(session()->getFlashdata($ref.'-input-error') !== null && isset(session()->getFlashdata($ref.'-input-error')[$name])) {
            return session()->getFlashdata($ref.'-input-error')[$name];
        }else{
            return false;
        }
    }
}

if(!function_exists('set_input_error')){
    function set_input_error($ref, $value){
        session()->setFlashdata($ref .'-input-error',$value);
    }
}
