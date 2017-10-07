<?php
    $page_data = mysql_query("select * from prof_about_pages where for_page = 'view_topic.php'");
    $menu_items = mysql_query("select * from prof_main_navigation");
    $side_items = mysql_query("select * from prof_side_items");
    $central_items = mysql_query("select * from prof_central_items where id = '$_REQUEST[id]'");
    $comments_topic = mysql_query("select * from prof_main_topic_comment where for_topic = '$_REQUEST[id]' order by id desc");
    $headers = mysql_query("select * from prof_header_elements");
    mysql_query("update prof_central_items set views = views+1 where id = '$_REQUEST[id]'");
?>