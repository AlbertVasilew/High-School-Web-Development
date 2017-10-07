<?php
    echo "
        <ul class='sf-menu'>
            <li>
                <a href='#'>Управление на страниците</a>
                <ul>
                    <li><a href='admin.php?page=new_page'>ДОБАВЯНИ СТРАНИЦА</a></li>
                    <li><a href='admin.php?page=rmv_page'>ПРЕМАХНИ СТРАНИЦА</a></li>
					<li><a href='admin.php?page=edit_page'>РЕДАКТИРАЙ СТРАНИЦА</a></li>
                </ul>
            </li>
            <li>
                <a href='#'>Управление на началната страница</a>
                <ul>
                    <li><a href='admin.php?topic=new_topic'>ДОБАВЯНИ СТАТИЯ</a></li>
                    <li><a href='admin.php?topic=rmv_topic'>ПРЕМАХНИ СТАТИЯ</a></li>
                    <li><a href='admin.php?topic=edit_topic'>ПРОМЕНИ СТАТИЯ</a></li>
                </ul>
            </li>
            <li>
                <a href='#'>Управление на коментарите</a>
                <ul>
                    <li><a href='admin.php?comment=delete_single'>ИЗТРИИ ОПРЕДЕЛЕН КОМЕНТАР</a></li>
                    <li><a href='admin.php?comment=delete_all_from_topic'>ИЗТРИИ КОМЕНТАРИТЕ ОТ СТАТИЯ</a></li>
                    <li><a href='admin.php?comment=delete_all'>ИЗТРИИ ВСИЧКИ КОМЕНТАРИ</a></li>
                </ul>
            </li>
            <li>
                <a href='#'>Управление на странично меню</a>
                <ul>
                    <li><a href='admin.php?side=add_content'>ДОБАВИ СЪДЪРЖАНИЕ</a></li>
                    <li><a href='admin.php?side=rmv_content'>ПРЕМАХНИ СЪДЪРЖАНИЕ</a></li>
                    <li><a href='admin.php?side=edit_content'>РЕДАКТИРАЙ НА СЪДЪРЖАНИЕ</a></li>
                </ul>
            </li>
            <li>
                <a href='#'>Заглавна част (headings)</a>
                <ul>
                    <li><a href='admin.php?heading=title'>ПРОМЕНИ ЗАГЛАВИЕТО</a></li>
                    <li><a href='admin.php?heading=subtitle'>ПРОМЕНИ ПОДЗАГЛАВИЕТО</a></li>
                </ul>
            </li>
        </ul>";
?>
