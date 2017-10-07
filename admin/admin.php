<?php
    session_start();
    if($_SESSION['auth_in'] == NULL)
    {
        header("Location: admin_login.php");
    }
	            require_once "../mysql/mysql_resource.php";
            require_once "../mysql/page_query/important/pq_admin_login.php";
            if(isset($_REQUEST['admin_name']) && isset($_REQUEST['admin_password']))
            {
                while($admin = mysql_fetch_object($admin_list))
                {
                    if(trim(strtoupper($_REQUEST['admin_name'])) == trim(strtoupper($admin->name_login)) && trim(strtoupper($_REQUEST['admin_password'])) == trim(strtoupper($admin->password)))
                    {
                        $_SESSION['auth_in'] = $admin->show_name;
                        $_SESSION['auth_in_rank'] = $admin->admin_rank;
                        header("Location: admin_login.php");
                    }
                }
            }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS - Удостоверен</title>
        <link rel="StyleSheet" type="text/css" href="../style/default/admin.css">
        <link rel='StyleSheet' type='text/css' href='../style/default/superfish.css'>
        <script type='text/javascript' src='../style/default/javascript/jquery-1.11.2.min.js'></script>
        <script type='text/javascript' src='../style/default/javascript/superfish.js'></script>
        <script type='text/javascript' src='code.jquery.com/jquery-1.8.3.min.js'></script>
        <script type='text/javascript' src='../style/default/javascript/current_link.js'></script>
        <script type='text/javascript' src='../style/default/javascript/call_superfish.js'></script>
    </head>
    <body>
        <div class="top_header_notes">
            <span class="admin_data">Добре дошли, <?php echo $_SESSION['auth_in']; ?></span>
            <span class="options"><a href="../index.php">Към началната страница</a> | <a href="../logout.php">Изход</a></span>
        </div>
            <?php
                require_once "../code_requirements/admin_nav_options.php";
                require_once "../mysql/mysql_resource.php";
                if(@$_REQUEST['page'] == "new_page")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/new_page.php";
                    echo "</div>";
                }
                if(@$_REQUEST['page'] == "rmv_page")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/rmv_page.php";
                    echo "</div>";
                }
                if(@$_REQUEST['topic'] == "new_topic")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/new_topic.php";
                    echo "</div>";
                }
                if(@$_REQUEST['topic'] == "rmv_topic")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/rmv_topic.php";
                    echo "</div>";
                }
                if(@$_REQUEST['topic'] == "edit_topic")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/edit_topic.php";
                    echo "</div>";
                }
                if(@$_REQUEST['comment'] == "delete_single")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/delete_single_comment.php";
                    echo "</div>";
                }
                if(@$_REQUEST['comment'] == "delete_all_from_topic")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/delete_all_comments_from_topic.php";
                    echo "</div>";
                }
                if(@$_REQUEST['comment'] == "delete_all")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/delete_all_comments.php";
                    echo "</div>";
                }
                if(@$_REQUEST['heading'] == "title")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/heading_title.php";
                    echo "</div>";
                }
                if(@$_REQUEST['heading'] == "subtitle")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/heading_subtitle.php";
                    echo "</div>";
                }
                if(@$_REQUEST['side'] == "add_content")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/add_side_content.php";
                    echo "</div>";
                }
                if(@$_REQUEST['side'] == "rmv_content")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/rmv_side_content.php";
                    echo "</div>";
                }
                if(@$_REQUEST['side'] == "edit_content")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/edit_side_content.php";
                    echo "</div>";
                }
				if(@$_REQUEST['page'] == "edit_page")
                {
                    echo "<div class='selected_object_container'>";
                    require_once "../code_requirements/edit_page.php";
                    echo "</div>";
                }
                if(@$_REQUEST['comment'] == NULL && @$_REQUEST['topic'] == NULL && @$_REQUEST['page'] == NULL && @$_REQUEST['heading'] == NULL && @$_REQUEST['side'] == NULL)
                {
                    require_once "../code_requirements/admin_panel_hp.php";
                }
            ?>
        <script type="text/javascript" src="../style/default/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('editor1');
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        </script>
    </body>
</html>
