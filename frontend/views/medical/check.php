<?php
$examine_info=$medical?json_decode($medical->examine_info):null;

$normal=$examine_info&&isset($examine_info->normal)?json_decode($examine_info->normal):null;

$profession=$examine_info&&isset($examine_info->profession)?json_decode($examine_info->profession):null;


?>
<div class="panel-group" id="accordionCheck" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneCheck">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneCheck" data-parent="#accordionCheck"
                   aria-expanded="true" aria-controls="collapseOneCheck">
                    一般体检
                </a>
            </h4>
        </div>
        <div id="collapseOneCheck" class="panel-collapse collapse in" aria-labelledby="headingOneCheck">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">T</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="T" value="<?= isset($normal->T)?$normal->T:""; ?>"
                                   class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">度</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">P</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="P" value="<?= isset($normal->P)?$normal->P:""; ?>"
                                   class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">次/分</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">R</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="R"
                                   value="<?= isset($normal->R)?$normal->R:""; ?>" class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">次/分</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">SBP</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="SBP"
                                   value="<?= isset($normal->SBP)?$normal->SBP:""; ?>" class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">mmHg</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">DBP</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="DBP"
                                   value="<?= isset($normal->DBP)?$normal->DBP:""; ?>"  class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">mmHg</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">身高</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="height"
                                   value="<?= isset($normal->height)?$normal->height:""; ?>"  class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">cm</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">体重</label>

                        <div class="col-md-4">
                            <input type="text" data-name-parent="normal" name="weight"
                                   value="<?= isset($normal->weight)?$normal->weight:""; ?>"  class="form-control">
                        </div>
                        <div class="col-md-2 controlUnit">Kg</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">皮肤粘膜</label>
                        <div class="col-md-8">
                            <?php
                            $niMoArray=array("无","苍白","黄染","绀","皮疹");
                            $niMo="";
                            if($normal&&isset($normal->niMo)){
                                $niMo=$normal->niMo;
                            }

                            foreach($niMoArray as $nm){
                                $noMoChecked="";
                                if($nm==$niMo){
                                    $noMoChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $noMoChecked; ?> value="<?= $nm; ?>" data-name-parent="normal"
                                           name="niMo" ><?= $nm; ?>
                                </label>
                            <?php
                            }

                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">浅表淋巴结</label>
                        <div class="col-md-3">
                            <?php
                            $qianBiaoLinBaArray=array("无肿大","有肿大");
                            $qianBiaoLinBa="";
                            if($normal&&isset($normal->qianBiaoLinBa)){
                                $qianBiaoLinBa=$normal->qianBiaoLinBa;
                            }

                            foreach($qianBiaoLinBaArray as $qblb){
                                $qianBiaoLinBaChecked="";
                                if($qblb==$qianBiaoLinBa){
                                    $qianBiaoLinBaChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $qianBiaoLinBaChecked; ?> value="<?= $qblb; ?>" data-name-parent="normal"
                                           name="qianBiaoLin" ><?= $qblb; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">双侧瞳孔</label>
                        <div class="col-md-4">
                            <?php
                            $tongKongArray=array("等大等圆","不等大","不等圆");
                            $tongKong="";
                            if($normal&&isset($normal->tongKong)){
                                $tongKong=$normal->tongKong;
                            }

                            foreach($tongKongArray as $tk){
                                $tongKongChecked="";
                                if($tk==$tongKong){
                                    $tongKongChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $tongKongChecked; ?> value="<?= $tk; ?>" data-name-parent="normal"
                                           name="tongKong" ><?= $tk; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">呼吸节律</label>
                        <div class="col-md-3">
                            <?php
                            $huXiArray=array("规则","不规则");
                            $huXi="";
                            if($normal&&isset($normal->huXi)){
                                $huXi=$normal->huXi;
                            }

                            foreach($huXiArray as $hx){
                                $huXiChecked="";
                                if($hx==$huXi){
                                    $huXiChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $huXiChecked; ?> value="<?= $hx; ?>" data-name-parent="normal"
                                           name="huXi" ><?= $hx; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">肺部罗音</label>
                        <div class="col-md-3">
                            <?php
                            $luoYinArray=array("无","有");
                            $luoYin="";
                            if($normal&&isset($normal->luoYin)){
                                $luoYin=$normal->luoYin;
                            }

                            foreach($luoYinArray as $ly){
                                $luoYinChecked="";
                                if($ly==$luoYin){
                                    $luoYinChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $luoYinChecked; ?> value="<?= $ly; ?>" data-name-parent="normal"
                                           name="luoYin" ><?= $ly; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">心律</label>
                        <div class="col-md-3">
                            <?php
                            $xinLvArray=array("齐","不齐");
                            $xinLv="";
                            if($normal&&isset($normal->xinLv)){
                                $xinLv=$normal->xinLv;
                            }

                            foreach($xinLvArray as $xl){
                                $xinLvChecked="";
                                if($xl==$xinLv){
                                    $xinLvChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $xinLvChecked; ?> value="<?= $xl; ?>" data-name-parent="normal"
                                           name="xinLv" ><?= $xl; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">心脏各瓣膜区杂音</label>
                        <div class="col-md-3">
                            <?php
                            $zaYinArray=array("无","有");
                            $zaYin="";
                            if($normal&&isset($normal->zaYin)){
                                $zaYin=$normal->zaYin;
                            }

                            foreach($zaYinArray as $zy){
                                $zaYinChecked="";
                                if($zy==$xinLv){
                                    $zaYinChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $zaYinChecked; ?> value="<?= $zy; ?>" data-name-parent="normal"
                                           name="zaYin" ><?= $zy; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">腹部</label>
                        <div class="col-md-3">
                            <?php
                            $fuBuArray=array("软","硬");
                            $fuBu="";
                            if($normal&&isset($normal->fuBu)){
                                $fuBu=$normal->fuBu;
                            }

                            foreach($fuBuArray as $fb){
                                $fuBuChecked="";
                                if($fb==$fuBu){
                                    $fuBuChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $fuBuChecked; ?> value="<?= $fb; ?>" data-name-parent="normal"
                                           name="fuBu" ><?= $fb; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">腹部压痛</label>
                        <div class="col-md-3">
                            <?php
                            $fuBuYaTongArray=array("无","有");
                            $fuBuYaTong="";
                            if($normal&&isset($normal->fuBuYaTong)){
                                $fuBuYaTong=$normal->fuBuYaTong;
                            }

                            foreach($fuBuYaTongArray as $fbyt){
                                $fuBuYaTongChecked="";
                                if($fbyt==$fuBuYaTong){
                                    $fuBuYaTongChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $fuBuYaTongChecked; ?> value="<?= $fbyt; ?>" data-name-parent="normal"
                                           name="fuBuYaTong" ><?= $fbyt; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">腹部包块</label>
                        <div class="col-md-3">
                            <?php
                            $fuBuBaoKuaiArray=array("无","有");
                            $fuBuBaoKuai="";
                            if($normal&&isset($normal->fuBuBaoKuai)){
                                $fuBuBaoKuai=$normal->fuBuBaoKuai;
                            }

                            foreach($fuBuBaoKuaiArray as $fbbk){
                                $fuBuBaoKuaiChecked="";
                                if($fbbk==$fuBuBaoKuai){
                                    $fuBuBaoKuaiChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $fuBuBaoKuaiChecked; ?> value="<?= $fbbk; ?>" data-name-parent="normal"
                                           name="fuBuBaoKuai" ><?= $fbbk; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">移动性浊音</label>
                        <div class="col-md-3">
                            <?php
                            $chuoYinArray=array("无","有");
                            $chuoYin="";
                            if($normal&&isset($normal->chuoYin)){
                                $chuoYin=$normal->chuoYin;
                            }

                            foreach($chuoYinArray as $cy){
                                $chuoYinChecked="";
                                if($cy==$chuoYin){
                                    $chuoYinChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $chuoYinChecked; ?> value="<?= $cy; ?>" data-name-parent="normal"
                                           name="chuoYin" ><?= $cy; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">肝区叩痛</label>
                        <div class="col-md-3">
                            <?php
                            $ganQuArray=array("无","有");
                            $ganQu="";
                            if($normal&&isset($normal->ganQu)){
                                $ganQu=$normal->ganQu;
                            }

                            foreach($ganQuArray as $gq){
                                $ganQuChecked="";
                                if($gq==$ganQu){
                                    $ganQuChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $ganQuChecked; ?> value="<?= $gq; ?>" data-name-parent="normal"
                                           name="ganQu" ><?= $gq; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">肝脏肿大</label>
                        <div class="col-md-3">
                            <?php
                            $ganQuZhongDaArray=array("无","有");
                            $ganQuZhongDa="";
                            if($normal&&isset($normal->ganQuZhongDa)){
                                $ganQuZhongDa=$normal->ganQuZhongDa;
                            }

                            foreach($ganQuZhongDaArray as $gqzd){
                                $ganQuZhongDaChecked="";
                                if($gqzd==$ganQuZhongDa){
                                    $ganQuZhongDaChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $ganQuZhongDaChecked; ?> value="<?= $gqzd; ?>" data-name-parent="normal"
                                           name="ganQuZhongDa" ><?= $gqzd; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">脾脏肿大</label>
                        <div class="col-md-3">
                            <?php
                            $piZangArray=array("无","有");
                            $piZang="";
                            if($normal&&isset($normal->piZang)){
                                $piZang=$normal->piZang;
                            }

                            foreach($piZangArray as $pz){
                                $piZangChecked="";
                                if($pz==$piZang){
                                    $piZangChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $piZangChecked; ?> value="<?= $pz; ?>" data-name-parent="normal"
                                           name="piZang" ><?= $pz; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">肾区叩痛</label>
                        <div class="col-md-3">
                            <?php
                            $shenQuArray=array("无","有");
                            $shenQu="";
                            if($normal&&isset($normal->shenQu)){
                                $shenQu=$normal->shenQu;
                            }

                            foreach($shenQuArray as $sq){
                                $shenQuChecked="";
                                if($sq==$shenQu){
                                    $shenQuChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $shenQuChecked; ?> value="<?= $sq; ?>" data-name-parent="normal"
                                           name="shenQu" ><?= $sq; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">生理反射</label>
                        <div class="col-md-3">
                            <?php
                            $shengLiFanSheArray=array("存在","部分存在","不存在");
                            $shengLiFanShe="";
                            if($normal&&isset($normal->shengLiFanShe)){
                                $shengLiFanShe=$normal->shengLiFanShe;
                            }

                            foreach($shengLiFanSheArray as $slfs){
                                $shengLiFanSheChecked="";
                                if($slfs==$shengLiFanShe){
                                    $shengLiFanSheChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $shengLiFanSheChecked; ?> value="<?= $slfs; ?>" data-name-parent="normal"
                                           name="shengLiFanShe" ><?= $slfs; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">病理反射</label>
                        <div class="col-md-3">
                            <?php
                            $bingLiFanSheArray=array("未引出","有引出");
                            $bingLiFanShe="";
                            if($normal&&isset($normal->bingLiFanShe)){
                                $bingLiFanShe=$normal->bingLiFanShe;
                            }

                            foreach($bingLiFanSheArray as $blfs){
                                $bingLiFanSheChecked="";
                                if($blfs==$bingLiFanShe){
                                    $bingLiFanSheChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $bingLiFanSheChecked; ?> value="<?= $blfs; ?>" data-name-parent="normal"
                                           name="bingLiFanShe" ><?= $blfs; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">智力异常</label>
                        <div class="col-md-3">
                            <?php
                            $zhiLiYiChangArray=array("无","有");
                            $zhiLiYiChang="";
                            if($normal&&isset($normal->zhiLiYiChang)){
                                $zhiLiYiChang=$normal->zhiLiYiChang;
                            }

                            foreach($zhiLiYiChangArray as $zlyc){
                                $zhiLiYiChangChecked="";
                                if($zlyc==$zhiLiYiChang){
                                    $zhiLiYiChangChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $zhiLiYiChangChecked; ?> value="<?= $zlyc; ?>" data-name-parent="normal"
                                           name="zhiLiYiChang" ><?= $zlyc; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                        <label class="control-label col-md-2">情感障碍</label>
                        <div class="col-md-3">
                            <?php
                            $qingGanZhanAiArray=array("无","狂躁","抑郁");
                            $qingGanZhanAi="";
                            if($normal&&isset($normal->qingGanZhanAi)){
                                $qingGanZhanAi=$normal->qingGanZhanAi;
                            }

                            foreach($qingGanZhanAiArray as $qgza){
                                $qingGanZhanAiChecked="";
                                if($qgza==$zhiLiYiChang){
                                    $qingGanZhanAiChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $qingGanZhanAiChecked; ?> value="<?= $qgza; ?>" data-name-parent="normal"
                                           name="qingGanZhanAi" ><?= $qgza; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-2">
                            <button type="submit" id="saveNormal" class="btn btn-primary form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingTwoCheck">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoCheck" data-parent="#accordionCheck"
                   aria-expanded="false" aria-controls="collapseTwoCheck">
                    专科体检
                </a>
            </h4>
        </div>
        <div id="collapseTwoCheck" class="panel-collapse collapse in" aria-labelledby="headingTwoCheck">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">神经系统异常</label>
                        <div class="col-md-8">
                            <?php
                            $shenJingYiChangArray=array("无","有");
                            $shenJingYiChang="";
                            if($profession&&isset($profession->shenJingYiChang)){
                                $shenJingYiChang=$profession->shenJingYiChang;
                            }

                            foreach($shenJingYiChangArray as $sjyc){
                                $shenJingYiChangChecked="";
                                if($sjyc==$shenJingYiChang){
                                    $shenJingYiChangChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $shenJingYiChangChecked; ?> value="<?= $sjyc; ?>" data-name-parent="profession"
                                           name="shenJingYiChang" ><?= $sjyc; ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">神经系统阳性体征</label>
                        <div class="col-md-8">
                            <input class="form-control" value="<?= isset($profession->shenJingYangXing)?$profession->shenJingYangXing:""; ?>" type="text"
                                   data-name-parent="profession" name="shenJingYangXing">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-2">
                            <button type="submit" id="saveProfession" class="btn btn-primary form-control">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>