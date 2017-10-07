<?php
    if(@$_REQUEST['from_name'] != NULL && $_REQUEST['comment_msg'] != NULL)
    {
        date_default_timezone_set("Europe/Sofia");
        $date = date("d/m/y | H:i");
        mysql_query("insert into prof_main_topic_comment values('','$_REQUEST[from_name]','$_REQUEST[comment_msg]','$_REQUEST[id]','$date')");
        header("Location: view_topic.php?id=$_REQUEST[id]");
    }
?>
