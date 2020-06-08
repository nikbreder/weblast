<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
}
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$subject = (new SpecialMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' предмет';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-subject.php">Изучаемые Дисциплины</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-subject.php" method="POST">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$subject->name;?>">
            </div>

            <div class="form-group">
                <label>Отделение</label>
                <select class="form-control" name="otdel_id">
                    <?= Helper::printSelectOptions($subject->otdel_id, (new OtdelMap())->arrOtdels());?>
                </select>
            </div>

            <div class="form-group">
                <label>Часы</label>
                <input type="text" class="form-control" name="hours" required="required" value="<?=$subject->hours;?>">
            </div>

            <div class="form-group">
                <label>Заблокировать</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="active" value="1" <?=($subject->active)?'checked':'';?>> Нет
                    </label> &nbsp;
                    <label>
                        <input type="radio" name="active" value="0" <?=(!$subject->active)?'checked':'';?>> Да
                    </label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="saveSubject" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="subject_id" value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>