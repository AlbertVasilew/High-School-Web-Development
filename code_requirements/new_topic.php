<?php
    echo "
        <div class='selected_object_title'>Създаване на нова статия</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='admin.php?topic=new_topic' method='post' id='form1'>
        <table class='input_table'>
        <tr><td>Заглавие</td><td>Описание</td></tr>
        <tr><td><input type='text' name='title' placeholder='Максимум 128 символа' required maxlength='128'></td>
        <td><input type='text' name='description' placeholder='Максимум 512 символа' required maxlength='512'></td>
        <td><input type='submit' value='Публикувай статията'></td></table>
        <textarea name='editor1' class='editor1'></textarea>
        </form>";
    if(isset($_REQUEST['title']) && isset($_REQUEST['description']))
    {
        date_default_timezone_set("Europe/Sofia");
        $date = date("d/m/Y в H:i");
        if(mysql_query("insert into prof_central_items values('','$_REQUEST[title]','$_REQUEST[description]','','$_REQUEST[editor1]','$date')"))
        {
            echo "<script>
                    var r_link = 'admin.php?topic=new_topic';
                    if(confirm('Статията е публикувана успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
            echo "Възникна проблем по време на публикуването!";
    }
?>