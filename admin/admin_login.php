<?php
    session_start();
	if($_SESSION['auth_in'] != NULL)
    {
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Вход в системата</title>
        <link rel="StyleSheet" type="text/css" href="../style/default/admin.css">
    </head>
    <body>
        <div class="container">
            <div class="header_title">Вход в системата</div>
            <div class="header_subtitle">Моля, въведете вашите данни за вход във формата по-долу, за да влезете в CMS.</div><hr>
            <form action="admin.php" method="post">
                <table class="admin_form">
                    <tr><td>Администратор:</td></tr>
                    <tr><td><input type="text" name="admin_name" required></td></tr>
                    <tr><td>Парола:</td></tr>
                    <tr><td><input type="password" name="admin_password" required></td></tr>
                    <tr><td><input type="submit" value="Влез" name="submit"></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>
