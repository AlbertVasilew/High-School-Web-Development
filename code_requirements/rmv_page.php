<?php
    echo "
        <div class='selected_object_title'>Премахване на съществуваща страница</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <table class='input_table'>
        <tr><td><button onclick=location.replace('admin.php?page=rmv_page&action=main')>Родителски страници</button></td><td><button onclick=location.replace('admin.php?page=rmv_page&action=subpage')>Дъщерни страници</button></td></tr>
        </table>";
    if(@$_REQUEST['page'] == "rmv_page" && @$_REQUEST['action'] == "main")
    {
        $main_query = mysql_query("select * from prof_main_navigation where page_href != 'index.php'");
        echo "<hr>
            <form action='admin.php?page=rmv_page&action=main' method='post'>
            <table class='input_table'>
            <tr><td>Родителска страница</td></tr>
            <tr><td><select name='del_page'>
            <option value='none' selected>(избери родителска страница)</option>";
            while($main = mysql_fetch_object($main_query))
            {
                echo "<option value=$main->page_href>$main->show_name</option>";
            }
        echo "
            </select></td><td><input type='submit' value='Премахни страницата'></td></tr>
            </table></form>";
        if(isset($_REQUEST['del_page']))
        {
            if($_REQUEST['del_page'] != "(избери родителска страница)")
            {
                if(@mysql_query("delete from prof_about_pages where for_page = '$_REQUEST[del_page]'") && @mysql_query("delete from prof_main_navigation where page_href = '$_REQUEST[del_page]'"))
                {
                        @$directory1 = "";
                        $directory1 .= "../html_head_tags/ph_";
                        $directory1 .= $_REQUEST['del_page'];
                        @$directory2 = "";
                        $directory2 .= "../mysql/page_query/pq_";
                        $directory2 .= $_REQUEST['del_page'];
                        @$directory3 = "";
                        $directory3 = "";
                        $directory3 .= "../";
                        $directory3 .= $_REQUEST['del_page'];
                        @unlink($directory1);
                        @unlink($directory2);
                        @unlink($directory3);
                        $k = 1;
                }
                if($k == 1)
                {
                    unset($main_query);
                    unset($main);
                    unset($_REQUEST['del_page']);
                    unset($directory1);
                    unset($directory2);
                    unset($directory3);
                    unset($k);
                    echo "<script>
                    var r_link = 'admin.php?page=rmv_page&action=main';
                    if(confirm('Родителската страница е премахната успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
                }
            }
        }
    }
    if(@$_REQUEST['page'] == "rmv_page" && @$_REQUEST['action'] == "subpage")
    {
        $sub_query = mysql_query("select * from prof_main_subnavigation");
        echo "<hr>
            <form action='admin.php?page=rmv_page&action=subpage' method='post'>
            <table class='input_table'>
            <tr><td>Дъщерна страница</td></tr>
            <tr><td><select name='del_page'>
            <option value='none' selected>(избери дъщерна страница)</option>";
            while($sub = mysql_fetch_object($sub_query))
            {
                echo "<option value=$sub->page_href>$sub->show_name</option>";
            }
        echo "
            </select></td><td><input type='submit' value='Премахни страницата'></td></tr>
            </table></form>";
        if(isset($_REQUEST['del_page']))
        {
            if($_REQUEST['del_page'] != "(избери дъщерна страница)")
            {
                if(@mysql_query("delete from prof_about_pages where for_page = '$_REQUEST[del_page]'") && @mysql_query("delete from prof_main_subnavigation where page_href = '$_REQUEST[del_page]'"))
                {
                        @$directory1 = "../html_head_tags/ph_".$_REQUEST['del_page'];
                        @$directory2 = "../mysql/page_queries/pq_".$_REQUEST['del_page'];
                        @$directory3 = "../".$_REQUEST['del_page'];
                        @unlink($directory1);
                        @unlink($directory2);
                        @unlink($directory3);
                        $k = 1;
                }
                if($k == 1)
                {
                    unset($sub_query);
                    unset($sub);
                    unset($_REQUEST['del_page']);
                    unset($directory1);
                    unset($directory2);
                    unset($directory3);
                    unset($k);
                    echo "<script>
                    var r_link = 'admin.php?page=rmv_page&action=subpage';
                    if(confirm('Дъщерната страница е премахната успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
                }
            }
        }
    }
?>

