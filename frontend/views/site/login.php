<?php
$this->title="登陆";
?>

<form class="pCenter" id="myForm" method="post" action="site/login" name="login_user_form">
    <span class="loginIcon">登陆图标</span>
    <h1 class="logo">湘雅神经系统</h1>
    <div class="row">
        <label class="ctrlLabel">账号</label>
        <input class="ctrlInput bgLc" type="text" name="username">
    </div>
    <div class="row">
        <label  class="ctrlLabel">密码</label>
        <input id="password" class="ctrlInput bgLc" type="password" name="password">
    </div>
    <div class="row">
        <input type="submit" class="ctrlBtn" value="登陆">
    </div>

    <?php
        if($model->getErrors("password")[0]=="loginError"){
            ?>
            <label class="error" style="text-align: center">用户名或者密码错误</label>
            <?php
        }
    ?>

</form>

<?php
    $this->registerJsFile("@web/js/src/login.js",['depends' => [frontend\assets\LoginAsset::className()]]);
?>