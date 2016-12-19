<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?php echo Yii::$app->homeUrl; ?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <h1 class="logo">湘雅神经系统</h1>
    <a href="site/logout" class="logout">退出</a>
</div>

<div class="left">
    <ul class="menu">
        <li class="item">
            <span class="glyphicon glyphicon-flag"></span>
            <a class="link" href="user">用户管理</a>
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
