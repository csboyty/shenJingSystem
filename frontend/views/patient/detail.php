<?php
$this->title = $model->fullname.'的信息';

?>

        <div class="row">
            <label class="col-md-2 text-right">编号</label>
            <p class="col-md-8"><?= $model->id;?></p>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">日期</label>
            <div class="col-md-8"><?= $model->create_at;?></div>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">姓名</label>
            <div class="col-md-8"><?= $model->fullname;?></div>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">性别</label>
            <div class="col-md-8"><?= $model->sex;?></div>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">年龄</label>
            <div class="col-md-8"><?= $model->age;?></div>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">教育程度</label>
            <div class="col-md-8"><?= $model->education;?></div>
        </div>
        <div class="row">
            <label  class="col-md-2 text-right">职业</label>
            <div class="col-md-8"><?= $model->profession;?></div>
        </div>
        <div class="row">
            <label  class="col-md-2 text-right">婚姻状况</label>
            <div class="col-md-8"><?= $model->marriage;?></div>
        </div>
        <div class="row">
            <label  class="col-md-2 text-right">子女、兄弟数量</label>
            <div class="col-md-8"><?= $model->relatives_count;?></div>
        </div>
        <div class="row">
            <label class=" col-md-2 text-right">住址</label>
            <div class="col-md-8"><?= $model->address;?></div>
        </div>
        <div class="row">
            <label  class="col-md-2 text-right">联系人</label>
            <div class="col-md-8"><?= $model->contact;?></div>
        </div>
        <div class="row">
            <label class="col-md-2 text-right">联系电话</label>
            <div class="col-md-8"><?= $model->tel;?></div>
        </div>
        <br>
        <div class="row">
            <a class="col-md-offset-2 btn btn-primary" href="medical/<?= $model->id; ?>">病史信息</a>
            <a class="col-xs-offset-1 btn btn-success" href="diagnose-info/<?= $model->id; ?>">拟诊信息</a>
            <a class="col-xs-offset-1 btn btn-info"  href="diagnose-process/<?= $model->id; ?>">诊治诊断</a>
            <a class="col-xs-offset-1 btn btn-warning" href="return-info/<?= $model->id; ?>">随访记录</a>
        </div>
