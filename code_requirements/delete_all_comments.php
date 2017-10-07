<?php
    if(!isset($_REQUEST['submitted']))
    {
        echo "
                <div class='selected_object_title'>Изтриване на всички коментари от всички статии</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='admin.php?comment=delete_all' method='post' id='form1'>
                <input type='hidden' name='submitted'>
                <table class='input_table'>
                <tr><td><input type='submit' value='Изтрии всички коментари'></td></tr>";
    }
    if(isset($_REQUEST['submitted']))
    {
        if(mysql_query("truncate table prof_main_topic_comment"))
        {
            echo "<script>
                    var r_link = 'admin.php?comment=delete_all';
                    if(confirm('Коментарите са изтрити успешно!'))
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
