<?php

$status=$diagnoseInfo?json_decode($diagnoseInfo->status):null;


?>

<form class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-md-2">持续状态</label>
        <div class="col-md-8">
            <?php
            $persistentArray=array("无","有");
            $persistent="";
            $persistentPanelClass="";
            $persistentDataValue=false;
            if($status&&isset($status->persistent)){
                $persistent=$status->persistent;
            }
            foreach($persistentArray as $p){
                $persistentChecked="";
                $persistentDataValue=false;
                if($p==$persistent){
                    $persistentChecked=" checked ";
                }
                if($p=="有"){
                    $persistentDataValue=true;
                }
                ?>
                <label class="radio-inline">
                    <input type="radio" <?= $persistentChecked; ?> value="<?= $p; ?>" class="ctrl" data-name-parent="status"
                           data-value="<?= $persistentDataValue; ?>" data-control-panel="persistentCtrlPanel"
                           name="persistent"><?= $p; ?>
                </label>
            <?php
            }

            if($persistent=="有"){
                $persistentPanelClass="";
            }else{
                $persistentPanelClass="hidden";
            }
            ?>
        </div>
    </div>

    <div id="persistentCtrlPanel" class="<?= $persistentPanelClass ;?>">
        <div class="form-group">
            <label class="control-label col-md-2">发作次数</label>
            <div class="col-md-8">
                <input type="text" class="form-control" data-name-parent="status" name="count"
                       value="<?= isset($status->count)?$status->count:"";  ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">类型</label>
            <div class="col-md-8">
                <?php
                $typeArray=array("全身惊厥性癫痫持续状态","复杂部分性发作持续状态",
                    "失神性癫痫持续状态","单纯部分发作持续状态","肌阵挛性癫痫持续状态");
                $typeSel=array();
                if($status&&isset($status->type)){
                    $typeSel=$status->type;
                }
                foreach($typeArray as $type){
                    $typeChecked="";
                    if(in_array($type, $typeSel)){
                        $typeChecked=" checked ";
                    }
                    ?>
                    <label class="checkbox-inline">
                        <input type="checkbox" <?= $typeChecked ?> value="<?= $type ?>"
                               data-name-parent="status" name="type"><?= $type ?>
                    </label>
                <?php
                }

                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-2">
            <button type="submit" id="saveStatus" class="btn btn-success form-control">保存</button>
        </div>
    </div>
</form>

