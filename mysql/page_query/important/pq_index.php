<?php
    $menu_items = mysql_query("select * from prof_main_navigation");
    $side_items = mysql_query("select * from prof_side_items");
    $central_items = mysql_query("select * from prof_central_items order by id desc limit 6");
    $headers = mysql_query("select * from prof_header_elements");
    $page_data = mysql_query("select * from prof_about_pages where for_page = 'index.php'");
?>
