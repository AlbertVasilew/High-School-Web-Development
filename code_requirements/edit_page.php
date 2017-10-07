<?php
if(!isset($_REQUEST['page_selected']))
{
	echo "<div class='selected_object_title'>Редактиране на съществуваща страница</div>
		  <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
		  <p><button onclick=location.replace('admin.php?page=edit_page&mode=parent')>Родителска страница</button> <button onclick=location.replace('admin.php?page=edit_page&mode=child')>Дъщерна страница</button><hr>";
		  if($_REQUEST['page'] == "edit_page" && $_REQUEST['mode'] == "parent")
		  {
			  echo "<form action='' method='post'>
			  <select name='page_selected'><option value='none' selected>(няма)</option>";
			  $query = mysql_query("select * from prof_main_navigation where show_name != 'форум'");
			  while($row = mysql_fetch_object($query))
			  {
				  echo "<option value='$row->page_href'>$row->show_name</option>";
			  }
			  echo "</select><input type='submit' value='Редактирай страницата'></form>";
		  }
		  if($_REQUEST['page'] == "edit_page" && $_REQUEST['mode'] == "child")
		  {
			  echo "<form action='' method='post'>
			  			  <input type='hidden' name='child_sub' value='child_sub'>
			  <select name='page_selected'><option value='none' selected>(няма)</option>";
			  $query = mysql_query("select * from prof_main_subnavigation");
			  while($row = mysql_fetch_object($query))
			  {
				  echo "<option value='$row->page_href'>$row->show_name</option>";
			  }
			  echo "</select><input type='submit' value='Редактирай страницата'></form>";
		  }
}
if(isset($_REQUEST['page_selected']))
{
    echo "
        <div class='selected_object_title'>Редактиране на съществуваща страница</div>
        <div class='selected_object_description'>Моля, прегледайте и попълнете внимателно всички полета, които виждате по-долу!</div>
        <form action='' method='post'>
		<input type='hidden' name='page_selected_s' value='$_REQUEST[page_selected]'>
		<input type='hidden' name='child_sub' value='child_sub'>
        <table class='input_table'>";
		$query = mysql_query("select * from prof_about_pages where for_page = '$_REQUEST[page_selected]'");
		while($row = mysql_fetch_object($query))
		{
			echo "<tr><td>Заглавие</td><td>Описание</td></tr>
			<tr><td><input type='text' name='title' placeholder='Максимум 128 символа' required maxlength='128' value='$row->page_title'></td>
			<td><input type='text' name='meta_description' placeholder='Максимум 1024 символа' required maxlength='1024' value='$row->description'></td>";
		}
    echo "
        <td><input type='submit' value='Редактирай страницата'></td></tr>
        </table>
        <textarea name='editor1' class='editor1'>";
		$query = mysql_query("select * from prof_about_pages where for_page = '$_REQUEST[page_selected]'");
		while($row = mysql_fetch_object($query))
		{
			echo $row->content;
		}
		echo "</textarea>
        </form>
         ";
}

if(isset($_REQUEST['title']) && isset($_REQUEST['meta_description']) && $_REQUEST['child_sub'] != "child_sub")
	{
		if(mysql_query("update prof_about_pages set page_title = '$_REQUEST[title]', description = '$_REQUEST[meta_description]', content = '$_REQUEST[editor1]' where for_page = '$_REQUEST[page_selected_s]'") && mysql_query("update prof_main_navigation set show_name = '$_REQUEST[title]' where page_href = '$_REQUEST[page_selected_s]'"))
		{
			echo "<script>
                    var r_link = 'admin.php?page=edit_page';
                    if(confirm('Страницата е променена успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
		}
		else
			echo "<script>window.alert('Възникна проблем по време на редактирането!');</script>";
	}
if(isset($_REQUEST['title']) && isset($_REQUEST['meta_description']) && $_REQUEST['child_sub'] == "child_sub")
	{
		if(mysql_query("update prof_about_pages set page_title = '$_REQUEST[title]', description = '$_REQUEST[meta_description]', content = '$_REQUEST[editor1]' where for_page = '$_REQUEST[page_selected_s]'") && mysql_query("update prof_main_subnavigation set show_name = '$_REQUEST[title]' where page_href = '$_REQUEST[page_selected_s]'"))
		{
			echo "<script>
                    var r_link = 'admin.php?page=edit_page';
                    if(confirm('Страницата е променена успешно!'))
                        {
                            location.replace(r_link);
                        }
                        else
                            location.replace(r_link);
                    </script>";
		}
		else
			echo "<script>window.alert('Възникна проблем по време на редактирането!');</script>";
	}
?>

