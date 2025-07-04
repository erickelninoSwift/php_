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

    // function to check if users already exist 

    function check_user_exists($connection,$email) {
       //
          $query_check_user_exist = "SELECT * FROM users where email='$email' LIMIT 1";
         $execute_query_check_user = mysqli_query($connection,$query_check_user_exist);
      
         return mysqli_num_rows($execute_query_check_user) === 1;
    }


    ?>;