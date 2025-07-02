<?php
     function setPageToActive($page){
        $current_page = basename($_SERVER['PHP_SELF']);
        return ($page === $current_page) ? "active" : "";
    }