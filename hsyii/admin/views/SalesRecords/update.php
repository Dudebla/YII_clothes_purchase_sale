<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>销售订单信息</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
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
                        <td width="30%"><?php echo $form->labelEx($model, 'sell_no'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'sell_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sell_no', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'operator'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'operator', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'operator', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'custom_id'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'custom_id', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'custom_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'amount'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'amount', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'amount', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'sell_date'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'sell_date', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'sell_date', $htmlOptions = array()); ?>
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
    $(function(){
        var $down_time=$('#<?php echo get_class($model);?>_sell_date');
        $down_time.on('click', function(){
            WdatePicker({startDate:'%y-%M-%D',dateFmt:'yyyy-MM-dd'});});
    });
</script>