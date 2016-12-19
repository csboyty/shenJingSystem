<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="webkit" name="renderer">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?php echo Yii::$app->homeUrl; ?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <h1 class="logo">神经系统发作性疾病临床资源数据库</h1>
    <nav class="topNav">
        <ul>
            <li><a href="account/edit-pwd" class="editpwd">修改密码</a></li>
            <li><a href="site/logout" class="logout">退出</a></li>
        </ul>
    </nav>
</div>

<div class="left">
    <ul class="menu">
        <li class="item">
            <span class="glyphicon glyphicon-flag"></span>
            <a class="link" href="patient/">病患管理</a>
        </li>
        <li class="item">
            <span class="glyphicon glyphicon-flag"></span>
            <a class="link" href="stat/">数据统计</a>
        </li>
    </ul>
</div>

<div class="right">
    <div class="main">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>


<div class="loading hidden" id="loading">
    <span class="text">Loading...</span>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
