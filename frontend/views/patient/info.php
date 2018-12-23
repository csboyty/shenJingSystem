<?php
$this->title = '基本信息';
?>
<div class="row">
    <div class="col-md-10 col-left">
        <form class="form-horizontal" id="myForm">
            <?php
            if($model->id){
                ?>
                <input type="hidden" id="editId" name="id" value="<?= $model->id; ?>">
                <input type="hidden" name="isEdit" value="true">
            <?php
            }
            ?>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">编号</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="no" value="<?= $model->no; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">日期</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="create_at" value="<?= $model->create_at; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">门诊号</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="patient_no" value="<?= $model->patient_no; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">住院号</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="ad" value="<?= $model->ad; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">血DNA标本号</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="dna_no" value="<?= $model->dna_no; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">其他标本号</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="other_no" value="<?= $model->other_no; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">姓名</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="fullname" value="<?= $model->fullname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">性别</label>
                <div class="col-md-8">
                    <?php

                    $sexArray=array("男","女");
                    $sex=$model->sex;
                    foreach($sexArray as $sa){
                        $sexChecked="";
                        if($sa==$sex){
                            $sexChecked=" checked ";
                        }
                        ?>
                        <label class="radio-inline">
                            <input type="radio" <?= $sexChecked; ?> value="<?= $sa; ?>"
                                   name="sex"><?= $sa; ?>
                        </label>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">出生日期</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="birthday" value="<?= $model->birthday; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">年龄</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="age" value="<?= $model->age; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">教育程度</label>
                <div class="col-md-8">
                    <select class="form-control" name="education">
                        <?php
                        $educationArray=array("大专以上","高中","初中","小学","文盲");
                        $educationSel="";
                        if($model&&isset($model->education)){
                            $educationSel=$model->education;
                        }
                        foreach($educationArray as $ea){
                            $educationOptionSel="";
                            if($educationSel==$ea){
                                $educationOptionSel=" selected ";
                            }
                            ?>

                            <option <?= $educationOptionSel; ?> value="<?= $ea; ?>"><?= $ea; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">职业</label>
                <div class="col-md-8">
                    <select class="form-control" name="profession">
                        <?php
                        $professionArray=array("医务工作者","教师","学生","农林牧副渔业","工人",
                            "军人","商人","政府机关工作人员","其他");
                        $professionSel="";
                        if($model&&isset($model->profession)){
                            $professionSel=$model->profession;
                        }
                        foreach($professionArray as $pa){
                            $professionOptionSel="";
                            if($professionSel==$pa){
                                $professionOptionSel=" selected ";
                            }
                            ?>

                            <option <?= $professionOptionSel; ?> value="<?= $pa; ?>"><?= $pa; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">婚姻状况</label>
                <div class="col-md-8">
                    <select class="form-control" name="marriage">
                        <?php
                        $marriageArray=array("已婚","未婚","离异","分居","丧偶");
                        $marriageSel="";
                        if($model&&isset($model->marriage)){
                            $marriageSel=$model->marriage;
                        }
                        foreach($marriageArray as $ma){
                            $marriageOptionSel="";
                            if($marriageSel==$ma){
                                $marriageOptionSel=" selected ";
                            }
                            ?>

                            <option <?= $marriageOptionSel; ?> value="<?= $ma; ?>"><?= $ma; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">子女、兄弟数量</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="relatives_count" value="<?= $model->relatives_count; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">住址</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="address" value="<?= $model->address; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">联系人</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="contact" value="<?= $model->contact; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">联系电话</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="tel" value="<?= $model->tel; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">qq</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="qq" value="<?= $model->qq; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">微信</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="weixin" value="<?= $model->weixin; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-3">
                    <input type="submit" class="btn btn-primary form-control" id="toMedicalInfo" value="》病史信息">
                </div>
                <div class="col-md-offset-2 col-md-3">
                    <input type="submit" class="btn btn-primary form-control" value="保存">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <div class="pageLinkList" id="pageLinkList">
            <a href="patient/info/<?= $model->id; ?>" class="item active">基本信息</a>
            <a href="medical/<?= $model->id; ?>" class="item">病史信息</a>
            <a href="diagnose-info/<?= $model->id; ?>" class="item">拟诊信息</a>
            <a href="diagnose-process/<?= $model->id; ?>" class="item">诊治诊断</a>
            <a href="return-info/<?= $model->id; ?>" class="item">随访信息</a>
        </div>
    </div>
</div>



<?php
$this->registerJsFile("@web/js/src/patientInfo.js",['depends' => [frontend\assets\AppAsset::className()]]);
?>