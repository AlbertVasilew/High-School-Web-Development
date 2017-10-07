<?php
    if(!isset($_REQUEST['submitted']))
    {
        echo "
                <div class='selected_object_title'>Промяна на подзаглавието на уебсайтът</div>
                <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
                <form action='admin.php?heading=subtitle' method='post' id='form1'>
                <input type='hidden' name='submitted'>
                <table class='input_table'>
                <tr><td>Въведи ново подзаглавие></td></tr>
                <tr><td><input type='text' name='new_subtitle'></td><td><input type='submit' value='Запази промените'></td></tr>";
    }
    if(isset($_REQUEST['submitted']))
    {
        if(mysql_query("update prof_header_elements set subtitle='$_REQUEST[new_subtitle]'"))
        {
            echo "<script>
                    var r_link = 'admin.php?heading=subtitle';
                    if(confirm('Подзаглавието е променено успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
        }
        else
                echo "<script>alert('Възникна проблем по време на промените!');</script>";
    }
?>
