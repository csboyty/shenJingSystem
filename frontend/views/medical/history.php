<?php
$history_info=$medical?json_decode($medical->history_info):null;

$historyPast=$history_info&&isset($history_info->historyPast)?json_decode($history_info->historyPast):null;

$historyPersonal=$history_info&&isset($history_info->historyPersonal)?json_decode($history_info->historyPersonal):null;

$historyFamily=$history_info&&isset($history_info->historyFamily)?json_decode($history_info->historyFamily):null;

?>
<div class="panel-group" id="accordionHistory" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneHistory">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneHistory" data-parent="#accordionHistory"
                   aria-expanded="true" aria-controls="collapseOneHistory">
                    既往史
                </a>
            </h4>
        </div>
        <div id="collapseOneHistory" class="panel-collapse collapse in" aria-labelledby="headingOneHistory">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">病史</label>
                        <div class="col-md-8">
                            <?php
                                $historyMedicalArray=array("脑外伤","脑寄生虫","肿瘤及手术","脑血管病","低血糖昏迷","CO 中毒",
                                    "药物过敏史","脑部疾患","心脏疾患","哮喘","胆道疾患","习惯性便秘","肾脏疾患","糖尿病");
                                $historyMedicalSel=array();
                                if($historyPast&&isset($historyPast->medical)){
                                    $historyMedicalSel=$historyPast->medical;
                                }

                                foreach($historyMedicalArray as $hma){
                                    $medicalChecked="";
                                    if(in_array($hma, $historyMedicalSel)){
                                        $medicalChecked=" checked ";
                                    }
                                    ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" <?= $medicalChecked; ?> value="<?= $hma ?>"
                                               data-name-parent="historyPast" name="medical"><?= $hma ?>
                                    </label>
                                    <?php
                                }

                            ?>
                            <?php

                            if(in_array("脑炎", $historyMedicalSel)){
                                $naoYanChecked=" checked ";
                                $naoYanPanelClass="";
                            }else{
                                $naoYanChecked="";
                                $naoYanPanelClass="hidden";
                            }
                            if(in_array("其他", $historyMedicalSel)){
                                $qiTaChecked=" checked ";
                                $qiTaPanelClass="";
                            }else{
                                $qiTaChecked="";
                                $qiTaPanelClass="hidden";
                            }

                            ?>
                            <label class="checkbox-inline">
                                <input type="checkbox" <?= $naoYanChecked; ?> value="脑炎" name="medical"
                                       data-name-parent="historyPast" class="ctrl" data-control-panel="medicalCtrlPanel">脑炎
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" <?= $qiTaChecked; ?> value="其他" name="medical"
                                       data-name-parent="historyPast" class="ctrl" data-control-panel="medicalCtrl1Panel">其他
                            </label>
                            <div class="ctrlPanel <?= $naoYanPanelClass; ?>" id="medicalCtrlPanel">
                                <span>脑炎类型</span>
                                <div>
                                    <?php
                                    $encephalitisTypeArray=array("病毒","真菌","细菌");
                                    $encephalitisType="";
                                    if($historyPast&&isset($historyPast->encephalitisType)){
                                        $encephalitisType=$historyPast->encephalitisType;
                                    }

                                    foreach($encephalitisTypeArray as $eta){
                                        $encephalitisTypeChecked="";
                                        if($eta==$encephalitisType){
                                            $encephalitisTypeChecked=" checked ";
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" <?= $encephalitisTypeChecked; ?> value="<?= $eta; ?>" data-name-parent="historyPast"
                                                   name="encephalitisType" ><?= $eta; ?>
                                        </label>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="ctrlPanel <?= $qiTaPanelClass; ?>" id="medicalCtrl1Panel">
                                其他病：<input type="text" value="<?= isset($historyPast->otherMedical)?$historyPast->otherMedical:""; ?> "
                                           data-name-parent="historyPast" name="otherMedical">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">其他用药</label>
                        <div class="col-md-8">
                            <input class="form-control"  value="<?= isset($historyPast->drug)?$historyPast->drug:""; ?> " type="text" data-name-parent="historyPast" name="drug">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" id="saveHistoryPast" class="btn btn-success form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingTwoHistory">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoHistory" data-parent="#accordionHistory"
                   aria-expanded="false" aria-controls="collapseTwoHistory">
                    个人史
                </a>
            </h4>
        </div>
        <div id="collapseTwoHistory" class="panel-collapse collapse in" aria-labelledby="headingTwoHistory">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-8  col-md-offset-2">
                            <?php
                            $historyPersonalMedicalArray=array("孕期感染","宫内缺氧","难产","产伤","重度黄疸","孕期服药或放射接触",
                                "发热惊厥");
                            $historyPersonalMedicalSel=array();
                            if($historyPersonal&&isset($historyPersonal->medical)){
                                $historyPersonalMedicalSel=$historyPersonal->medical;
                            }
                            foreach($historyPersonalMedicalArray as $hpa){
                                $pMedicalChecked="";
                                if(in_array($hpa, $historyPersonalMedicalSel)){
                                    $pMedicalChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $pMedicalChecked; ?> value="<?= $hpa ?>"
                                           data-name-parent="historyPersonal" name="medical"><?= $hpa ?>
                                </label>
                            <?php
                            }

                            ?>
                            <?php
                            if(in_array("其他", $historyPersonalMedicalSel)){
                                $qiTaChecked=" checked ";
                                $qiTaPanelClass="";
                            }else{
                                $qiTaChecked="";
                                $qiTaPanelClass="hidden";
                            }

                            ?>
                            <label class="checkbox-inline">
                                <input type="checkbox" <?= $qiTaChecked; ?> value="其他"
                                       data-name-parent="historyPersonal" name="medical" class="ctrl"
                                       data-control-panel="personalCtrlPanel">其他
                            </label>
                            <div class="ctrlPanel <?= $qiTaPanelClass; ?>" id="personalCtrlPanel">
                                其他病：<input type="text" value="<?= isset($historyPersonal->otherMedical)?$historyPersonal->otherMedical:""; ?>" data-name-parent="historyPersonal" name="otherMedical">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <button type="submit" id="saveHistoryPersonal" class="btn btn-success form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingThreeHistory">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseThreeHistory" data-parent="#accordionHistory"
                   aria-expanded="false" aria-controls="collapseThreeHistory">
                    家族史
                </a>
            </h4>
        </div>
        <div id="collapseThreeHistory" class="panel-collapse collapse in" aria-labelledby="headingThreeHistory">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">父母近亲结婚</label>
                        <div class="col-md-8">
                            <?php
                                $parentArray=array("是","否");
                                $parentSel="";

                                if($historyFamily&&$historyFamily->parent){
                                    $parentSel=$historyFamily->parent;
                                }

                                foreach($parentArray as $pa){
                                    $pChecked="";
                                    if($parentSel==$pa){
                                        $pChecked=" checked ";
                                    }

                                    ?>

                                    <label class="radio-inline">
                                        <input type="radio" <?= $pChecked; ?> value="<?= $pa; ?>" data-name-parent="historyFamily"
                                               name="parent" ><?= $pa; ?>
                                    </label>

                                    <?php
                                }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">家族癫痫病史</label>
                        <div class="col-md-8">
                            <?php
                            $parentsArray=array("有","无");
                            $parentsSel="";

                            if($historyFamily&&$historyFamily->parents){
                                $parentsSel=$historyFamily->parents;
                            }

                            foreach($parentsArray as $psa){
                                $psChecked="";
                                if($parentsSel==$psa){
                                    $psChecked=" checked ";
                                }

                                ?>

                                <label class="radio-inline">
                                    <input type="radio" <?= $psChecked; ?> value="<?= $psa; ?>" data-name-parent="historyFamily"
                                           name="parents" ><?= $psa; ?>
                                </label>

                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">家系图</label>
                        <div class="col-md-8" id="uploadContainer">
                            <input type="file" id="uploadFile">
                            <br>
                            <a id="file" href="<?= $historyFamily?$historyFamily->familyImage:""; ?>">
                                <?= $historyFamily?$historyFamily->familyImage:""; ?>
                            </a>
                            <input type="hidden" value="<?= $historyFamily?$historyFamily->familyImage:""; ?>"
                                   data-name-parent="historyFamily"  name="familyImage" id="fileUrl">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-2">
                            <button type="submit" id="saveHistoryFamily" class="btn btn-success form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>