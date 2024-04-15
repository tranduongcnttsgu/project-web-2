<?php
if (isset($styled)) {

    foreach ($styled as $key => $value) {
        echo "<link rel='stylesheet' href='http://localhost/assets/css/$value.css'>";
    }
}
