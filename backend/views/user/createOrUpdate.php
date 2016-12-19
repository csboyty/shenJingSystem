<?php

$this->title = '新建/修改用户';

?>

    <ul class="nav nav-tabs" id="myTabs">
        <li class="active"><a href="#info">基本信息</a></li>
        <?php
        if($model->id){
            ?>
            <li ><a href="#password">密码</a></li>
        <?php
        }
        ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="info" style="padding-top: 10px">
            <form class="form-horizontal" id="myForm" action="user/submit" method="post">
                <?php
                if($model->id){
                    ?>
                    <input type="hidden" name="id" value="<?php echo $model->id ?>">
                <?php
                }
                ?>
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">用户名*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="<?php echo $model->username ?>" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">姓名*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="<?php echo $model->fullname ?>" name="fullname">
                    </div>
                </div>
                <?php
                if(!$model->id){
                    ?>
                    <div class="form-group">
                        <label  class="control-label col-md-2">密码*</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="submit" class="btn btn-success form-control">确定</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if($model->id){
            ?>
            <div role="tabpanel" class="tab-pane" id="password" style="padding-top: 10px">
                <form class="form-horizontal" id="myFormPWD" action="user/set-password" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $model->id ?>">
                    <div class="form-group">
                        <label  class="control-label col-md-2">密码*</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <button type="submit" class="btn btn-success form-control">确定</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>

    </div>


<?php
$this->registerJsFile("@web/js/src/userCreateOrUpdate.js",['depends' => [backend\assets\AppAsset::className()]]);
?>