<?php
    echo "
        <div class='selected_object_title'>Създаване на нова страница</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='admin.php?page=new_page' method='post' id='form1'>
        <table class='input_table'>
        <tr><td>Заглавие</td><td>Име в/у диска</td><td>Описание</td><td>Подменю на</td></tr>
        <tr><td><input type='text' name='title' placeholder='Максимум 128 символа' required maxlength='128'></td>
        <td><input type='text' name='name_on_server' placeholder='Максимум 64 символа' required maxlength='64'></td>
        <td><input type='text' name='meta_description' placeholder='Максимум 1024 символа' required maxlength='1024'></td>
        <td><select name='submenu'><option value='none' selected>(няма)</option>";
        $query = mysql_query("select * from prof_main_navigation");
        while($option = mysql_fetch_object($query))
        {
            echo "<option value='$option->show_name'>$option->show_name</option>";
        }
    echo "
        </select></td>
        <td><input type='submit' value='Създай страницата'></td></tr>
        </table>
        <textarea name='editor1' class='editor1'></textarea>
        </form>
         ";
    if(@$_REQUEST['title'] != NULL && @$_REQUEST['name_on_server'] != NULL && @$_REQUEST['meta_description'] != NULL && @$_REQUEST['submenu'] != NULL)
    {
        $servername = "";
        $servername .= $_REQUEST['name_on_server'];
        $servername .= ".php";
            if($_REQUEST['editor1'] != NULL)
            {
                mysql_query("insert into prof_about_pages values('$servername','$_REQUEST[editor1]','$_REQUEST[meta_description]','$_REQUEST[title]')");
            }
            else
                mysql_query("insert into prof_about_pages values('$servername','Няма добавено съдържание.','$_REQUEST[meta_description]','$_REQUEST[title]')");
            if($_REQUEST['submenu'] == "none")
            {
                if(mysql_query("insert into prof_main_navigation values('','$_REQUEST[title]','$servername')"))
                {
                    $k = 1;
                }
            }
            else
                if(mysql_query("insert into prof_main_subnavigation values('$_REQUEST[title]','$servername','$_REQUEST[submenu]')"))
                {
                    $k = 1;
                }
        if($k == 1)
        {
            $template_file = file_get_contents('../code_requirements/new_page_template/template.html');
            $template_file2 = file_get_contents('../code_requirements/new_page_template/page_head_tags.html');
            $template_file3 = file_get_contents('../code_requirements/new_page_template/page_queries.html');
            $pq_replace = "pq_".$servername;
            $ph_replace = "ph_".$servername;
            $for_replace = array("pq_replace.php","ph_replace.php");
            $done_replace = array($pq_replace,$ph_replace);
            $replaced_text = str_replace($for_replace,$done_replace,$template_file);
            $replaced_text2 = str_replace("replace_me",$servername,$template_file3);
            $create_dir = "../".$servername;
            $create_dir2 = "../html_head_tags/ph_".$servername;
            $create_dir3 = "../mysql/page_query/pq_".$servername;
            $file = fopen($create_dir,"w+");
            $file2 = fopen($create_dir2,"w+");
            $file3 = fopen($create_dir3,"w+");
            fwrite($file,$replaced_text);
            fwrite($file2,$template_file2);
            fwrite($file3,$replaced_text2);
            unset($servername);
            unset($_REQUEST['title']);
            unset($_REQUEST['submenu']);
            unset($_REQUEST['editor1']);
            unset($_REQUEST['meta_description']);
            unset($template_file);
            unset($template_file2);
            unset($template_file3);
            unset($ph_replace);
            unset($pq_replace);
            unset($for_replace);
            unset($done_replace);
            unset($replaced_text);
            unset($replaced_text2);
            unset($create_dir);
            unset($create_dir2);
            unset($create_dir3);
            unset($query);
            unset($file);
            unset($file2);
            unset($file3);
            unset($k);
            echo "<script>window.alert('Новата страница беше създадена успешно!');</script>";
        }
    }
?>

