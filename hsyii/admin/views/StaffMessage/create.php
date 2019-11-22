<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>员工信息</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
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
                        <td width="30%"><?php echo $form->labelEx($model, 'staff_no'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'staff_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'staff_no', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'staff_name'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'staff_name', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'staff_name', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'staff_log_name'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'staff_log_name', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'staff_log_name', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'staff_password'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'staff_password', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'staff_password', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'staff_permissions'); ?></td>
                        <td>
                            <?php echo $form->dropDownList($model, 'staff_permissions', CHtml::listdata(PublicMessage::model()->findAll("permissions IS NOT NULL"),'permissions','permissions'),array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'staff_permissions', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'gender'); ?></td>
                        <td>
                            <?php echo $form->dropDownList($model, 'gender', CHtml::listdata(PublicMessage::model()->findAll("gender IS NOT NULL"),'gender','gender'),array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'gender', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'telephone'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'telephone', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'telephone', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'address'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'address', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'address', $htmlOptions = array()); ?>
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
        var $down_time=$('#<?php echo get_class($model);?>_return_date');
        $down_time.on('click', function(){
            WdatePicker({startDate:'%y-%M-%D',dateFmt:'yyyy-MM-dd'});});
    });
</script>