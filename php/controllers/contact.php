<?php
namespace controller\contact;

function get() {
        echo '<div style="margin: 0 auto; width: fit-content">';
  
    echo do_shortcode('[contact-form-7 id="5" title="コンタクトフォーム 1"]'); 
    echo '</div>';
}


function post() {
  
}

?>