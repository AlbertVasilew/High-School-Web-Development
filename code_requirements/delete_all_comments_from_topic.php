<?php
    if(!isset($_REQUEST['submitted']))
    {
        echo "
                <div class='selected_object_title'>Изтриване на всички коментари от определена статия</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='admin.php?comment=delete_all_from_topic' method='post' id='form1'>
                <input type='hidden' name='submitted'>
                <table class='input_table'>
                <tr><td>Статия с коментари</td></tr>
                <tr><td><select name='topic_comments'><option value='none' selected>(избери статия с коментари)</option>";
                $topics_query = mysql_query("select * from prof_central_items");
                while($topics = mysql_fetch_object($topics_query))
                {
                    echo "<option value=$topics->id>$topics->title</option>";
                }
        echo "</select></td><td><input type='submit' value='Изтрии коментарите'></td></tr>
                </table>
                </form>";
    }
    if(isset($_REQUEST['submitted']))
    {
        if(mysql_query("delete from prof_main_topic_comment where for_topic = '$_REQUEST[topic_comments]'"))
        {
            echo "<script>
                    var r_link = 'admin.php?comment=delete_all_from_topic';
                    if(confirm('Коментарите са изтрити успешно!!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
                echo "<script>alert('Възникна проблем по време на изтриването на коментарите!');</script>";
    }
?>

