<?php

include_once 'class/Engine.php';
$engine = new Engine();
 
include_once 'templates/header.php';

if ( $engine->getError() ) {
    echo '
        <div style="border:1px solid red; padding:20px; margin: 20px auto; width: 100%;">
            '.$engine->getError().'
        </div>
    ';
}
echo $engine->getContentPage();

include_once 'templates/footer.php';

?>