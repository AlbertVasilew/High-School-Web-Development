<?php
    echo "
        <div class='selected_object_title'>Изтриване на съществуваща статия</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='admin.php?topic=rmv_topic' method='post' id='form1'>
        <input type='hidden' name='check_if_submit'>
        <table class='input_table'>
        <tr><td>Статия за изтриване</td></tr>
        <tr><td><select name='s_topics'>
        <option value='none' selected>(избери статия за изтриване)</option>";
        $topic_data = mysql_query("select * from prof_central_items");
        while($topic = mysql_fetch_object($topic_data))
        {
            echo "<option value=$topic->id>$topic->title</option>";
        }
    echo "</select></td>
        <td><input type='submit' value='Изтрии статията'></td></tr></table>
        </form>";
    if(isset($_REQUEST['check_if_submit']))
    {
        if(@mysql_query("delete from prof_central_items where id = '$_REQUEST[s_topics]'") && @mysql_query("delete from prof_main_topic_comment where for_topic = '$_REQUEST[s_topics]'"))
        {
            echo "<script>
                    var r_link = 'admin.php?topic=rmv_topic';
                    if(confirm('Статията е премахната успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
            echo "<script>window.alert('Възникна проблем по време на премахването!');</script>";
    }
?>