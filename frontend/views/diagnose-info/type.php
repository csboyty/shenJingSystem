<?php

$type=$diagnoseInfo?json_decode($diagnoseInfo->type):null;

$buWei=$type&&isset($type->buWei)?json_decode($type->buWei):null;

$quanMian=$type&&isset($type->quanMian)?json_decode($type->quanMian):null;

$buNeng=$type&&isset($type->buNeng)?json_decode($type->buNeng):null;

$teShu=$type&&isset($type->teShu)?json_decode($type->teShu):null;

?>
<div class="panel-group" id="accordionType" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneType" data-parent="#accordionType"
                   aria-expanded="true" aria-controls="collapseOneType">
                    部位有关
                </a>
            </h4>
        </div>
        <div id="collapseOneType" class="panel-collapse collapse in" aria-labelledby="headingOneType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">特发性</label>
                        <div class="col-md-8">
                            <?php
                            $teFaArray=array("伴中央-颞叶棘波的良性儿童癫痫","伴枕叶放电的良性儿童癫痫",
                                "原发性阅读性癫痫");
                            $teFaSel=array();
                            if($buWei&&isset($buWei->teFa)){
                                $teFaSel=$buWei->teFa;
                            }
                            foreach($teFaArray as $tf){
                                $teFaChecked="";
                                if(in_array($tf, $teFaSel)){
                                    $teFaChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $teFaChecked ?> value="<?= $tf ?>"
                                           data-name-parent="buWei" name="teFa"><?= $tf ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">症状性</label>
                        <div class="col-md-8">
                            <?php
                            $zhengZhuangArray=array("儿童慢性进行性部分性持续性癫痫","以特殊形式诱发的癫痫发作为特征的癫痫综合征",
                                "颞叶癫痫","额叶癫痫","顶叶癫痫","枕叶癫痫");
                            $zhengZhuangSel=array();
                            if($buWei&&isset($buWei->zhengZhuang)){
                                $zhengZhuangSel=$buWei->zhengZhuang;
                            }
                            foreach($zhengZhuangArray as $zz){
                                $zhengZhuangChecked="";
                                if(in_array($zz, $zhengZhuangSel)){
                                    $zhengZhuangChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $zhengZhuangChecked ?> value="<?= $zz ?>"
                                           data-name-parent="buWei" name="zhengZhuang"><?= $zz ?>
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
        <div class="panel-heading" id="headingTwoType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoType" data-parent="#accordionType"
                   aria-expanded="false" aria-controls="collapseTwoType">
                    全面性癫痫和综合征
                </a>
            </h4>
        </div>
        <div id="collapseTwoType" class="panel-collapse collapse in" aria-labelledby="headingTwoType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">特发性</label>
                        <div class="col-md-8">
                            <?php
                            $teFaArray=array("良性家族性新生儿惊厥","良性新生儿惊厥",
                                "良性婴儿肌阵挛性癫痫","儿童期失神癫痫（密集性发作）","青少年期失神癫痫",
                                "青少年肌阵挛性癫痫（前冲性小发作）","觉醒时全身强直－阵挛性癫痫","其它全面性特发性癫痫",
                                "表现为特殊方式诱发发作的癫痫");
                            $teFaSel=array();
                            if($quanMian&&isset($quanMian->teFa)){
                                $teFaSel=$quanMian->teFa;
                            }
                            foreach($teFaArray as $tf){
                                $teFaChecked="";
                                if(in_array($tf, $teFaSel)){
                                    $teFaChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $teFaChecked ?> value="<?= $tf ?>"
                                           data-name-parent="quanMian" name="teFa"><?= $tf ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">隐源性</label>
                        <div class="col-md-8">
                            <?php
                            $yinYuanXingArray=array("West 综合征","Lennox-Gastaut 综合征",
                                "肌阵挛-猝倒性癫痫","肌阵挛型失神癫痫");
                            $yinYuanXingSel=array();
                            if($quanMian&&isset($quanMian->yinYuanXing)){
                                $yinYuanXingSel=$quanMian->yinYuanXing;
                            }
                            foreach($yinYuanXingArray as $yyx){
                                $yinYuanXingChecked="";
                                if(in_array($yyx, $yinYuanXingSel)){
                                    $yinYuanXingChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yinYuanXingChecked ?> value="<?= $yyx ?>"
                                           data-name-parent="quanMian" name="yinYuanXing"><?= $yyx ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">症状性</label>
                        <div class="col-md-8">
                            <span>非特异性</span>
                            <div>
                                <?php
                                $feiTeYiArray=array("早期肌阵挛性脑病","婴儿早期伴抑制爆发的癫痫性脑病","其它症状性全面性癫痫");
                                $feiTeYiSel=array();
                                if($quanMian&&isset($quanMian->feiTeYi)){
                                    $feiTeYiSel=$quanMian->feiTeYi;
                                }
                                foreach($feiTeYiArray as $fty){
                                    $feiTeYiChecked="";
                                    if(in_array($fty, $feiTeYiSel)){
                                        $feiTeYiChecked=" checked ";
                                    }
                                    ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" <?= $feiTeYiChecked ?> value="<?= $fty ?>"
                                               data-name-parent="quanMian" name="feiTeYi"><?= $fty ?>
                                    </label>
                                <?php
                                }

                                ?>
                            </div>
                            <br>
                            <span>特异性</span>
                            <div>
                                <?php
                                $teYiArray=array("特异性综合征包括许多可以引起癫痫发作的疾病状态，这里所指的是以癫痫为首发症状或主要症");
                                $teYiSel=array();
                                if($quanMian&&isset($quanMian->teYi)){
                                    $teYiSel=$quanMian->teYi;
                                }
                                foreach($teYiArray as $ty){
                                    $teYiChecked="";
                                    if(in_array($ty, $teYiSel)){
                                        $teYiChecked=" checked ";
                                    }
                                    ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" <?= $teYiChecked ?> value="<?= $ty ?>"
                                               data-name-parent="quanMian" name="teYi"><?= $ty ?>
                                    </label>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingThreeType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseThreeType" data-parent="#accordionType"
                   aria-expanded="false" aria-controls="collapseThreeType">
                    不能决定为局灶性还是全面性的癫痫和癫痫综合征
                </a>
            </h4>
        </div>
        <div id="collapseThreeType" class="panel-collapse collapse in" aria-labelledby="headingThreeType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">既有局灶性又有全面性的发作</label>
                        <div class="col-md-8">
                            <?php
                            $juZaoArray=array("新生儿发作","婴儿重症肌阵挛性癫痫","慢波睡眠期持续棘慢波性癫痫",
                                "获得性癫痫性失语症（Landau-Kleffner 综合征）","其它");
                            $juZaoSel=array();
                            if($buNeng&&isset($buNeng->juZao)){
                                $juZaoSel=$buNeng->juZao;
                            }
                            foreach($juZaoArray as $jz){
                                $juZaoChecked="";
                                if(in_array($jz, $juZaoSel)){
                                    $juZaoChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $juZaoChecked ?> value="<?= $jz ?>"
                                           data-name-parent="buNeng" name="juZao"><?= $jz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">未确定</label>
                        <div class="col-md-8">
                            <?php
                            $weiQueDingArray=array("缺乏明确的分型证据，不能确定为全面性或局灶性的发作
                                如果伴 GTCS 发作者临床表现及 EEG 无法提供分型的依据，则将其归为此类，如大部分睡眠强直
                                －阵挛性发作患者");
                            $weiQueDingSel=array();
                            if($buNeng&&isset($buNeng->weiQueDing)){
                                $weiQueDingSel=$buNeng->weiQueDing;
                            }
                            foreach($weiQueDingArray as $wqd){
                                $weiQueDingChecked="";
                                if(in_array($wqd, $weiQueDingSel)){
                                    $weiQueDingChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $weiQueDingChecked ?> value="<?= $wqd ?>"
                                           data-name-parent="buNeng" name="weiQueDing"><?= $wqd ?>
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
        <div class="panel-heading" id="headingFourType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseFourType" data-parent="#accordionType"
                   aria-expanded="false" aria-controls="collapseFourType">
                    特殊综合征
                </a>
            </h4>
        </div>
        <div id="collapseFourType" class="panel-collapse collapse in" aria-labelledby="headingFourType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">情景相关性</label>
                        <div class="col-md-8">
                            <?php
                            $qingJingArray=array("高热惊厥","孤立的癫痫发作或癫痫持续状态",
                                "仅发生于急性代谢异常或中毒，如酗酒、药物中毒、惊厥、非酮症高血糖等情况时的癫痫发作");
                            $qingJingSel=array();
                            if($teShu&&isset($teShu->qingJing)){
                                $qingJingSel=$teShu->qingJing;
                            }
                            foreach($qingJingArray as $qj){
                                $qingJingChecked="";
                                if(in_array($qj, $qingJingSel)){
                                    $qingJingChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $qingJingChecked ?> value="<?= $qj ?>"
                                           data-name-parent="teShu" name="qingJing"><?= $qj ?>
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