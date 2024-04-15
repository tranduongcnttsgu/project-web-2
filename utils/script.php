<?php
if (isset($script)) {

    foreach ($script as $key => $value) {
        echo "<script src='http://localhost/assets/js/$value.js' type='text/javascript'></script>";
    }
}
