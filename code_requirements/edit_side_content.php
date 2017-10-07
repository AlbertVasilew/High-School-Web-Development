<?php
    if(!isset($_REQUEST['selected_list']))
    {
        echo "
                <div class='selected_object_title'>Редактиране на съдържание от страничното меню</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='' method='post' id='form1'>
                <input type='hidden' name='selected_list'>
                <table class='input_table'>
                <tr><td>Съдържание за редактиране</td></tr>
                <td><select name='s_cont'><option value='none' selected>(избери съдържание за редактиране)</option>";
                $side_data = mysql_query("select * from prof_side_items");
                while($s_data = mysql_fetch_object($side_data))
                {
                    echo "<option value=$s_data->id>$s_data->title</option>";
                }
        echo "  </td><td><input type='submit' value='Редактирай съдържанието'></td></table>
                </form>";
    }
    if(isset($_REQUEST['selected_list']))
    {
        echo "
            <div class='selected_object_title'>Редактиране на съдържание от страничното меню</div>
            <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
            <form action='admin.php?side=edit_content' method='post' id='form1'>
            <input type='hidden' name='selected_list'>
            <table class='input_table'>
            <tr><td>Заглавие</td></tr>";
            @$side_query = mysql_query("select * from prof_side_items where id='$_REQUEST[s_cont]'");
            while($value = mysql_fetch_object($side_query))
            {
                echo "<tr><td><input type='text' name='title' placeholder='Максимум 128 символа' value='$value->title' required maxlength='128'></td>
                <td><input type='submit' value='Запази промените'></td></tr></table>
                <textarea name='editor1' class='editor1'>$value->content</textarea><input type='hidden' name='id' value='$_REQUEST[s_cont]'>";
            }
        echo "</form>";
        if(isset($_REQUEST['title']))
        {
            if(mysql_query("update prof_side_items set title='$_REQUEST[title]', content='$_REQUEST[editor1]' where id='$_REQUEST[id]'"))
            {
                echo "<script>
                    var r_link = 'admin.php?side=edit_content';
                    if(confirm('Съдържанието в страничното меню е променено успешно!'))
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