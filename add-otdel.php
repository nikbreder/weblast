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
$otdel = (new OtdelMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' отделение';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-gruppa.php">Отделения</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-otdel.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control"name="name" required="required" value="<?=$otdel->name;?>">
        </div>

        <div class="form-group">
            <label>Заблокировать</label>
            <div class="radio">
                <label>
                    <input type="radio" name="active" value="1" <?=($otdel->active)?'checked':'';?>> Нет
                </label> &nbsp;
                <label>
                    <input type="radio" name="active" value="0" <?=(!$otdel->active)?'checked':'';?>> Да
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="saveOtdel" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="otdel_id"
               value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>

