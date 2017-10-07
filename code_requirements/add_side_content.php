<?php
    echo "
        <div class='selected_object_title'>Добави съдържание в страничното меню</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='admin.php?side=add_content' method='post' id='form1'>
        <table class='input_table'>
        <tr><td>Заглавие</td></tr>
        <tr><td><input type='text' name='title' placeholder='Максимум 128 символа' required maxlength='128'></td>
        <td><input type='submit' value='Публикувай съдържанието'></td></table>
        <textarea name='editor1' class='editor1'></textarea>
        </form>";
    if(isset($_REQUEST['title']))
    {
        if(mysql_query("insert into prof_side_items values('','$_REQUEST[title]','$_REQUEST[editor1]')"))
        {
            echo "<script>
                    var r_link = 'admin.php?side=add_content';
                    if(confirm('Съдържанието е добавено успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
            echo "<script>alert('Възникна проблем по време на публикуването!');</script>";
    }
?>