<?php
    //Required files
        require_once "mysql/mysql_resource.php";
        require_once "mysql/page_query/important/pq_view_topic.php";
        require_once "code_requirements/send_comment.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once "html_head_tags/important/ph_view_topic.php"; ?>
    </head>
    <body>
        <div class="container">
            <div class="title_header">
                <?php
                    while($header = mysql_fetch_object($headers))
                    {
                        echo "<div class='title'>$header->title</div>
                        <div class='subtitle'>$header->subtitle</div>";
                    }
                ?>
            </div>
            <div class="search_bar">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <input type="text" name="search" placeholder="Потерсете съдържание." autocomplete="off"> <input type="submit" value="Търси">
                    </form>
            </div>
                <ul class="sf-menu">
                    <?php
                        while($navigation = mysql_fetch_object($menu_items))
                        {
                            $menu_subitems = mysql_query("select * from prof_main_subnavigation where for_nav = '$navigation->show_name'");
                            echo "<li class='current'>";
                            echo "<a href='$navigation->page_href'>$navigation->show_name</a>";
                            if(mysql_num_rows($menu_subitems) != 0)
                            {
                                echo "<ul>";
                                while($subnavigation = mysql_fetch_object($menu_subitems))
                                {
                                    echo "<li><a href='$subnavigation->page_href'>$subnavigation->show_name</a></li>";
                                }
                                echo "</ul>";
                            }
                            echo "</li>";
                        }
                    ?>
                </ul>
            <div class="main_content_container">
                <div class="side_container">
                    <?php
                        while($side = mysql_fetch_object($side_items))
                        {
                            echo "<div class='side'>
                                    <div class='title'>$side->title</div>
                                    <div class='content'>$side->content</div>
                                  </div>";
                        }
                    ?>
                </div>
                <div class="central_container">
                    <?php
                        mysql_data_seek($central_items,0);
                        while($central = mysql_fetch_object($central_items))
                        {
                            echo "<div class='central'>
                                    <div class='title'>$central->title</div>
                                    <div class='content'>$central->content</div><hr>
                                    <div class='details'>Публикувано на $central->date | Статията е прочетена $central->views пъти | ".mysql_num_rows($comments_topic)." коментар(а/и)</div>
                                  </div>";
                        }
                    ?>
                    <?php
                        while($comments = mysql_fetch_object($comments_topic))
                        {
                            echo "<div class='comment_box'><span class='from_name'>$comments->from_name каза: <span class='date'>Публикуван на $comments->date</span></span><span class='message'>$comments->comment_msg</span></div>";
                        }
                    ?>
                    <div class="post_comment">
                        <span class="comment_notice">Напишете коментар към статията:</span>
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="form1">
                            <input type="text" name="from_name" required placeholder="Име за показване" autocomplete="off" maxlength="20">
                            <textarea name="comment_msg" form="form1"  placeholder="Текстът, който ще бъде показан. Максималната дължина е 1000 знака." maxlength="1000" required></textarea>
                            <input type="submit" value="Публикувай">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="check_validation"><?php require_once "code_requirements/code_validation.php"; ?></div>
        <div class="auth_session"><?php require_once "code_requirements/auth_session.php"; ?></div>
    </body>
</html>