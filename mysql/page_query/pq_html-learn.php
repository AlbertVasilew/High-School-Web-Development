<?php
    $page_data = mysql_query("select * from prof_about_pages where for_page = 'html-learn.php'");
    $menu_items = mysql_query("select * from prof_main_navigation");
    $side_items = mysql_query("select * from prof_side_items");
    $headers = mysql_query("select * from prof_header_elements");
?>
