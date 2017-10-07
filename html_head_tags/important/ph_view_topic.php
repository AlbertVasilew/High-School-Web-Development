<?php
    while($pg_data = mysql_fetch_object($page_data))
    {
        echo "
            <meta charset='UTF-8'>
            <title>$pg_data->page_title";
        while($tp_data = mysql_fetch_object($central_items))
        {
            echo $tp_data->title;
        }
        echo "</title>
            <link rel='StyleSheet' type='text/css' href='style/default/style.css'>
            <link rel='StyleSheet' type='text/css' href='style/default/superfish.css'>
            <script type='text/javascript' src='style/default/javascript/jquery-1.11.2.min.js'></script>
            <script type='text/javascript' src='style/default/javascript/superfish.js'></script>
            <script type='text/javascript' src='code.jquery.com/jquery-1.8.3.min.js'></script>
            <script type='text/javascript' src='style/default/javascript/current_link.js'></script>
            <script type='text/javascript' src='style/default/javascript/call_superfish.js'></script>
            <meta name='description' content='$pg_data->description'>";
    }
?>