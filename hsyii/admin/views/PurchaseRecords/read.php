<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>进货记录</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
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
                        <td width="30%"><?php echo $form->labelEx($model, 'purchase_no'); ?></td>
                       <td width="30%">
                            <?php echo $form->textField($model, 'purchase_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'purchase_no
                            ', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'detail_id'); ?></td>
                        <td>
                             <?php echo $form->dropDownList($model, 'detail_id', CHtml::listdata(GoodsDetail::model()->findAll("id IS NOT NULL"),'id','detail_no'),array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'detail_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                   
                    <tr>
                         <td><?php echo $form->labelEx($model, 'total_amount'); ?></td>
                        <td>
                        <?php echo $form->textField($model, 'total_amount', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'total_amount', $htmlOptions = array()); ?>
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
                        <td><?php echo $form->labelEx($model, 'purchase_date'); ?></td>
                        <td>
                        <?php echo $form->textField($model, 'purchase_date', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'purchase_date', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                </table>
                <div class="mt15">
                <table style='margin-top:5px;'>
                	<tr class="table-title">
                    	<td colspan="2">其他信息</td>
                    </tr>
                   <!--<tr>
                      
                    </tr>-->

                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'operator'); ?></td>
                        <!--修改为下拉的列表，显示默认的职员id，不允许修改id-->
                        <td>
                             <?php echo $form->dropDownList($model, 'operator',array(Yii::app()->session['id']));?>
                            <?php echo $form->error($model, 'operator', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    
                    <tr>
                    	<td><?php echo $form->labelEx($model, 'remark'); ?></td>
                    	<td>
                            <?php echo $form->textField($model, 'remark', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'remark', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                </table>
                </div>
              
            </div><!--box-detail-tab-item end   style="display:block;"-->
            
        </div><!--box-detail-bd end-->
        
  <!--在update 基础上面 去掉按钮-->
       
    <?php $this->endWidget(); ?>
    </div><!--box-detail end-->
</div><!--box end-->
<script>
    $(function(){
        var $down_time=$('#<?php echo get_class($model);?>_purchase_date');
        $down_time.on('click', function(){
        WdatePicker({startDate:'%y-%M-%D 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss'});});
    });
    $(function(){
        var $down_time=$('#<?php echo get_class($model);?>_detail_no');
        $down_time.on('click', function(){
        WdatePicker({startDate:'%y-%M-%D',dateFmt:'yyyy-MM-dd'});});
    });
</script>