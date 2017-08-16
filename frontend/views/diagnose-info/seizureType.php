<?php
$attack_type=$diagnoseInfo?json_decode($diagnoseInfo->attack_type):null;

$buFenFaZuo=$attack_type&&isset($attack_type->buFenFaZuo)?json_decode($attack_type->buFenFaZuo):null;

$quanMianFaZuo=$attack_type&&isset($attack_type->quanMianFaZuo)?json_decode($attack_type->quanMianFaZuo):null;

$buNengFenLei=$attack_type&&isset($attack_type->buNengFenLei)?json_decode($attack_type->buNengFenLei):null;

?>

<div class="panel-group" id="accordionSeizureType" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="true" aria-controls="collapseOneSeizureType">
                    部分性发作
                </a>
            </h4>
        </div>
        <div id="collapseOneSeizureType" class="panel-collapse collapse in" aria-labelledby="headingOneSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">运动症状</label>
                        <div class="col-md-8">
                            <?php
                            $yunDongZhengZhuangArray=array("非扩展性局灶性","扩展性局灶性（jacksonian）",
                                "扭转","姿势性","发音（发声或说话中断）");
                            $yunDongZhengZhuangSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->yunDongZhengZhuang)){
                                $yunDongZhengZhuangSel=$buFenFaZuo->yunDongZhengZhuang;
                            }
                            foreach($yunDongZhengZhuangArray as $ydzz){
                                $yunDongZhengZhuangChecked="";
                                if(in_array($ydzz, $yunDongZhengZhuangSel)){
                                    $yunDongZhengZhuangChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yunDongZhengZhuangChecked ?> value="<?= $ydzz ?>"
                                           data-name-parent="buFenFaZuo" name="yunDongZhengZhuang"><?= $ydzz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">躯体感觉或特殊感觉症状</label>
                        <div class="col-md-8">
                            <?php
                            $quTiGanJueArray=array("躯体感觉性","视觉性",
                                "听觉性","嗅觉性","味觉性","眩晕性");
                            $quTiGanJueSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->quTiGanJue)){
                                $quTiGanJueSel=$buFenFaZuo->quTiGanJue;
                            }
                            foreach($quTiGanJueArray as $qtgj){
                                $quTiGanJueChecked="";
                                if(in_array($qtgj, $quTiGanJueSel)){
                                    $quTiGanJueChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $quTiGanJueChecked ?> value="<?= $qtgj ?>"
                                           data-name-parent="buFenFaZuo" name="quTiGanJue"><?= $qtgj ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">自主神经症状或体征</label>
                        <div class="col-md-8">
                            <?php
                            $ziZhuShenJingArray=array("上腹部不适感","苍白",
                                "多汗","面红","汗毛直立及瞳孔散大");
                            $ziZhuShenJingSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->ziZhuShenJing)){
                                $ziZhuShenJingSel=$buFenFaZuo->ziZhuShenJing;
                            }
                            foreach($ziZhuShenJingArray as $zzsj){
                                $ziZhuShenJingChecked="";
                                if(in_array($zzsj, $ziZhuShenJingSel)){
                                    $ziZhuShenJingChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $ziZhuShenJingChecked ?> value="<?= $zzsj ?>"
                                           data-name-parent="buFenFaZuo" name="ziZhuShenJing"><?= $zzsj ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">精神症状</label>
                        <div class="col-md-8">
                            <?php
                            $jingShenZhengZhuangArray=array("语言困难","记忆障碍（如似曾相识）",
                                "认知（如梦样状态，时间感觉的歪曲）","情感（如害怕、生气等）","错觉（如视物显大症）",
                                "结构性幻觉（如音乐、情景）");
                            $jingShenZhengZhuangSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->jingShenZhengZhuang)){
                                $jingShenZhengZhuangSel=$buFenFaZuo->jingShenZhengZhuang;
                            }
                            foreach($jingShenZhengZhuangArray as $jszz){
                                $jingShenZhengZhuangChecked="";
                                if(in_array($jszz, $jingShenZhengZhuangSel)){
                                    $jingShenZhengZhuangChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $jingShenZhengZhuangChecked ?> value="<?= $jszz ?>"
                                           data-name-parent="buFenFaZuo" name="jingShenZhengZhuang"><?= $jszz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <hr>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">从单纯部分性发作开始继发意识障碍</label>
                        <div class="col-md-8">
                            <?php
                            $yiShiZhangAiArray=array("伴简单部分性症状（A1-A4）继发意识障碍","伴自动症");
                            $yiShiZhangAiSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->yiShiZhangAi)){
                                $yiShiZhangAiSel=$buFenFaZuo->yiShiZhangAi;
                            }
                            foreach($yiShiZhangAiArray as $ysza){
                                $yiShiZhangAiChecked="";
                                if(in_array($ysza, $yiShiZhangAiSel)){
                                    $yiShiZhangAiChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yiShiZhangAiChecked ?> value="<?= $ysza ?>"
                                           data-name-parent="buFenFaZuo" name="yiShiZhangAi"><?= $ysza ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">开始即有意识障碍</label>
                        <div class="col-md-8">
                            <?php
                            $yiShiZhangAi1Array=array("仅有意识障碍","伴自动症");
                            $yiShiZhangAi1Sel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->yiShiZhangAi1)){
                                $yiShiZhangAi1Sel=$buFenFaZuo->yiShiZhangAi1;
                            }
                            foreach($yiShiZhangAi1Array as $ysza1){
                                $yiShiZhangAi1Checked="";
                                if(in_array($ysza1, $yiShiZhangAi1Sel)){
                                    $yiShiZhangAi1Checked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yiShiZhangAi1Checked ?> value="<?= $ysza1 ?>"
                                           data-name-parent="buFenFaZuo" name="yiShiZhangAi1"><?= $ysza1 ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <hr>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">部分发作发展至继发全面性发作</label>
                        <div class="col-md-8">
                            <?php
                            $toQuanMianFaZuoArray=array("单纯部分性发作发展至全面性发作","复杂部分性发作发展至全面性发作",
                                "单纯部分性发作发展至复杂部分性发作和全面性发作");

                            $toQuanMianFaZuoSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->toQuanMianFaZuo)){
                                $toQuanMianFaZuoSel=$buFenFaZuo->toQuanMianFaZuo;
                            }
                            foreach($toQuanMianFaZuoArray as $tqmfz){
                                $toQuanMianFaZuoChecked="";
                                if(in_array($tqmfz, $toQuanMianFaZuoSel)){
                                    $toQuanMianFaZuoChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $toQuanMianFaZuoChecked ?> value="<?= $tqmfz ?>"
                                           data-name-parent="buFenFaZuo" name="toQuanMianFaZuo"><?= $tqmfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingTwoSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="false" aria-controls="collapseTwoSeizureType">
                    全面性发作
                </a>
            </h4>
        </div>
        <div id="collapseTwoSeizureType" class="panel-collapse collapse in" aria-labelledby="headingTwoSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">失神发作</label>
                        <div class="col-md-8">
                            <?php
                            $shiShenFaZuoArray=array("仅有意识障碍","伴轻度阵挛","伴失张力","伴强直","伴自动症","伴自主神经症状");
                            $shiShenFaZuoSel=array();
                            if($quanMianFaZuo&&isset($quanMianFaZuo->shiShenFaZuo)){
                                $shiShenFaZuoSel=$quanMianFaZuo->shiShenFaZuo;
                            }
                            foreach($shiShenFaZuoArray as $ssfz){
                                $shiShenFaZuoChecked="";
                                if(in_array($ssfz, $shiShenFaZuoSel)){
                                    $shiShenFaZuoChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $shiShenFaZuoChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="quanMianFaZuo" name="shiShenFaZuo"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">非典型失神发作</label>
                        <div class="col-md-8">
                            <?php
                            $feiShiShenFaZuoArray=array("张力变化比 A1 更明显","发病开始及/或终止均不突然",
                                "肌阵挛发作（单一或多发）","阵挛发作","强直发作","强直－阵挛性发作","失张力发作");
                            $feiShiShenFaZuoSel=array();
                            if($quanMianFaZuo&&isset($quanMianFaZuo->feiShiShenFaZuo)){
                                $feiShiShenFaZuoSel=$quanMianFaZuo->feiShiShenFaZuo;
                            }
                            foreach($feiShiShenFaZuoArray as $fssfz){
                                $feiShiShenFaZuoChecked="";
                                if(in_array($fssfz, $feiShiShenFaZuoSel)){
                                    $feiShiShenFaZuoChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $feiShiShenFaZuoChecked ?> value="<?= $fssfz ?>"
                                           data-name-parent="quanMianFaZuo" name="feiShiShenFaZuo"><?= $fssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-2">
                            <button type="submit" id="saveQuanMianFaZuo" class="btn btn-primary form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingThreeSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseThreeSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="false" aria-controls="collapseThreeSeizureType">
                    不能分类的癫痫发作
                </a>
            </h4>
        </div>
        <div id="collapseThreeSeizureType" class="panel-collapse collapse in" aria-labelledby="headingThreeSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <?php
                            $buNengFenLeiArray=array("包括因资料不全而不能分类的发作，以及迄今所描写的类型不能包括者。如某些新生儿发作：节律性眼动、咀嚼及游泳样运动");
                            $buNengFenLeiSel=array();
                            if($buNengFenLei&&isset($buNengFenLei->element)){
                                $buNengFenLeiSel=$buNengFenLei->element;
                            }
                            foreach($buNengFenLeiArray as $bnfl){
                                $buNengFenLeiChecked="";
                                if(in_array($bnfl, $buNengFenLeiSel)){
                                    $buNengFenLeiChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $buNengFenLeiChecked ?> value="<?= $bnfl ?>"
                                           data-name-parent="buNengFenLei" name="element"><?= $bnfl ?>
                                </label>
                            <?php
                            }

                            ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>