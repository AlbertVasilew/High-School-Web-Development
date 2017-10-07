<?php
    @session_start();
    if(@$_SESSION['auth_in'] == NULL)
    {
        echo "<a href='admin/admin_login.php'>Вход</a>";
    }
    else
        echo "<span class='welcome_admin'>Добре дошли, $_SESSION[auth_in]</span><br><a href='admin/admin.php'>Админ панел</a><span class='delimiter'> | </span><a href='../logout.php'>Изход</a>";
?>