<?php
    if(!isset($_REQUEST['selected_list']))
    {
        echo "
                <div class='selected_object_title'>Редактиране на статия</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='' method='post' id='form1'>
                <input type='hidden' name='selected_list'>
                <table class='input_table'>
                <tr><td>Статия за редактиране</td></tr>
                <td><select name='ss_topic'><option value='none' selected>(избери статия за редактиране)</option>";
                $topic_query = mysql_query("select * from prof_central_items");
                while($topic = mysql_fetch_object($topic_query))
                {
                    echo "<option value=$topic->id>$topic->title</option>";
                }
        echo "  </td><td><input type='submit' value='Редактирай статията'></td></table>
                </form>";
    }
    if(isset($_REQUEST['selected_list']))
    {
        echo "
            <div class='selected_object_title'>Редактиране на статия</div>
            <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
            <form action='admin.php?topic=edit_topic' method='post' id='form1'>
            <input type='hidden' name='selected_list' value='$_REQUEST[ss_topic]'>
            <table class='input_table'>
            <tr><td>Заглавие</td><td>Описание</td></tr>";
            @$topic_query2 = mysql_query("select * from prof_central_items where id='$_REQUEST[ss_topic]'");
            @$topic_query = mysql_query("select * from prof_central_items");
            mysql_data_seek($topic_query, 0);
            while($value = mysql_fetch_object($topic_query2))
            {
                echo "<tr><td><input type='text' name='title' placeholder='Максимум 128 символа' value='$value->title' required maxlength='128'></td>
                <td><input type='text' name='description' placeholder='Максимум 512 символа' value='$value->description' required maxlength='512'></td>
                <td><input type='submit' value='Запази статията'></td></tr></table>
                <textarea name='editor1' class='editor1'>$value->content</textarea>";
            }
        echo "</form>";
        if(isset($_REQUEST['title']) && isset($_REQUEST['description']))
        {
            if(mysql_query("update prof_central_items set title='$_REQUEST[title]', description='$_REQUEST[description]', content='$_REQUEST[editor1]' where id = '$_REQUEST[selected_list]'"))
            {
                echo "<script>
                    var r_link = 'admin.php?topic=edit_topic';
                    if(confirm('Статията е редактирана успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
            }
            else
                echo "<script>alert('Възникна проблем по време на редактирането!');</script>";
        }
    }
?>