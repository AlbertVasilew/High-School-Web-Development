<?php
    echo "
        <div class='selected_object_title'>Премахване на съдържание</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='admin.php?side=rmv_content' method='post' id='form1'>
        <input type='hidden' name='check_if_submit'>
        <table class='input_table'>
        <tr><td>Съдържание за изтриване</td></tr>
        <tr><td><select name='s_cont'>
        <option value='none' selected>(избери съдържание за изтриване)</option>";
        $topic_data = mysql_query("select * from prof_side_items");
        while($side_c = mysql_fetch_object($topic_data))
        {
            echo "<option value=$side_c->id>$side_c->title</option>";
        }
    echo "</select></td>
        <td><input type='submit' value='Изтрии съдържанието'></td></tr></table>
        </form>";
    if(isset($_REQUEST['check_if_submit']))
    {
        if(@mysql_query("delete from prof_side_items where id = '$_REQUEST[s_cont]'"))
        {
            echo "<script>
                    var r_link = 'admin.php?side=rmv_content';
                    if(confirm('Съдържанието е премахнато успешно!'))
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
