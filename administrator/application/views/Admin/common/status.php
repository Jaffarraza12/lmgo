<?php

    if (isset($statusCode))
    {
        switch($statusCode)
        {
            case 0:
                echo '<div class="alert alert-error"><strong>Error!</strong> ' . $status . '</div>';
                break;
            case 1:
                echo '<div class="alert alert-success"><strong>Success!</strong> ' . $status . '</div>';
                break;
            case 2:
                echo '<div class="alert alert-info"><strong>Info!</strong> ' . $status . '</div>';
                break;
            case 3:
                echo '<div class="alert"><strong>Warning!</strong> ' . $status . '</div>';
                break;
        }
    }

?>