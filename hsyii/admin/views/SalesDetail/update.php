<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>销售订单详情信息</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
        <?php  $form = $this->beginWidget('CActiveForm', get_form_list());?>
        <div class="box-detail-tab">
            <ul class="c">
                <li class="current">基本信息</li>
            </ul>
        </div><!--box-detail-tab end-->
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table>
                    <tr class="table-title">
                        <td colspan="2">基本信息</td>
                    </tr>
                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'detail_no'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'detail_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'detail_no', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'sell_id'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'sell_id', array('class' => 'input-text')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'goods_id'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'goods_id', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'goods_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'quantity'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'quantity', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'quantity', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'price'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'price', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'price', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'amount'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'amount', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'amount', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                </table>
                <div class="mt15">
                    <table style='margin-top:5px;'>
                        <tr class="table-title">
                            <td colspan="2">其他信息</td>
                        </tr>
                        <tr>
                            <td><?php echo $form->labelEx($model, 'created'); ?></td>
                            <td>
                                <?php echo $form->textField($model, 'created', array('class' => 'input-text')); ?>
                                <?php echo $form->error($model, 'created', $htmlOptions = array()); ?>
                            </td>
                        </tr>
                    </table>
                </div>

            </div><!--box-detail-tab-item end   style="display:block;"-->

        </div><!--box-detail-bd end-->

        <div class="box-detail-submit"><button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button><button class="btn" type="button" onclick="we.back();">取消</button></div>

        <?php $this->endWidget(); ?>
    </div><!--box-detail end-->
</div><!--box end-->
<script>
    $(function(){
        var $down_time=$('#<?php echo get_class($model);?>_created');
        $down_time.on('click', function(){
            WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});
    });
</script>