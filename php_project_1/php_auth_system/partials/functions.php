<?php
     function setPageToActive($page){
        $current_page = basename($_SERVER['PHP_SELF']);
        return ($page === $current_page) ? "active" : "";
    }

    function addPageClass($page_name) {
        $currentpage = basename($_SERVER["PHP_SELF"]);
        $current_page_set = $currentpage === $page_name;
        // extract index.php and extract only the index part
        $page_value = explode('.', $page_name)[0];

        return $current_page_set ? $page_value : '';
    }