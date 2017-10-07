<?php
    if(!isset($_REQUEST['submitted']))
    {
        echo "
                <div class='selected_object_title'>Изтриване на определен коментар</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='admin.php?comment=delete_single' method='post' id='form1'>
                <input type='hidden' name='submitted'>
                <table class='input_table'>
                <tr><td>Коментар за изтриване</td></tr>
                <tr><td><select name='del_single'><option value='none' selected>(избери коментар за изтриване)</option>";
                $comment_query = mysql_query("select * from prof_main_topic_comment");
                while($comment = mysql_fetch_object($comment_query))
                {
                    echo "<option value=$comment->id>$comment->from_name | $comment->date</option>";
                }
        echo "</select></td><td><input type='submit' value='Изтрии коментара'></td></tr>
                </table>
                </form>";
    }
    if(isset($_REQUEST['submitted']))
    {
        if(mysql_query("delete from prof_main_topic_comment where id = '$_REQUEST[del_single]'"))
        {
            echo "<script>
                    var r_link = 'admin.php?comment=delete_single';
                    if(confirm('Коментарът е изтрит успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
                echo "<script>alert('Възникна проблем по време на изтриването на коментарът!');</script>";
    }
?>