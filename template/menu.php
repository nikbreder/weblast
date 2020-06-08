<?php function createLink($href, $icon, $text) {
    $is_active = $_SERVER['PHP_SELF'] === '/' . $href;
    $class_name = $is_active ? 'active' : '';

    print("
        <li class='$class_name'>
            <a href='$href'>
                <i class='fa $icon'></i>
                <span>$text</span>
            </a>
        </li>
    ");
} ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php createLink("index.php", "fa-calendar", "Главная"); ?>
            <li class="header">Пользователи</li>
            <?php
                createLink("list-teacher.php", "fa-users", "Преподаватели");
                createLink("list-student.php", "fa-users", "Студенты");
            ?>
            <li class="header">Справочники</li>
            <?php
                createLink("list-gruppa.php", "fa-users", "Группы");
                createLink("list-otdel.php", "fa-users", "Отделения");
                createLink("list-special.php", "fa-users", "Специальности");
                createLink("list-subject.php", "fa-users", "Изучаемые ");
                createLink("list-classroom.php", "fa-users", "Аудитории");
            ?>
            <li class="header">Управление расписанием</li>
            <?php createLink("list-teacher-schedule.php", "fa-users", "Расписание и планы"); ?>
        </ul>
    </section>
</aside>
<!-- /.sidebar-menu -->