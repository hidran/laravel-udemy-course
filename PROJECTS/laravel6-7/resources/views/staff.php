<h1>
    <?=$title?>
</h1>
<?php

if(!empty($staff)){
    echo '<ul>';
    foreach ($staff as $person){
       
        echo "<li> {$person['name']}   {$person['name']} </li>";
    }
    echo '</li>';
}