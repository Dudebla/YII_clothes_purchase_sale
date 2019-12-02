<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>商品信息</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
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
                        <td width="30%"><?php echo $form->labelEx($model, 'goods_no'); ?></td>
                       <td width="30%">
                            <?php echo $form->textField($model, 'goods_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'goods_no
                            ', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'goods_name'); ?></td>
                       <td width="30%">
                            <?php echo $form->textField($model, 'goods_name', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'goods_name
                            ', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                   
                    <tr>
                         <td><?php echo $form->labelEx($model, 'supplier_id'); ?></td>
                         <td>
                             <?php echo $form->dropDownList($model, 'supplier_id', CHtml::listdata(SupplierInformation::model()->findAll("id IS NOT NULL"),'id','supplier_name'),array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'supplier_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                         <td><?php echo $form->labelEx($model, 'type_id'); ?></td>
                         <td>
                             <?php echo $form->dropDownList($model, 'type_id', CHtml::listdata(GoodsType::model()->findAll("type_id IS NOT NULL"),'type_id','type_name'),array('prompt'=>'请选择')); ?>
                            <?php echo $form->error($model, 'type_id', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                     <tr>
                        <td><?php echo $form->labelEx($model, 'material'); ?></td>
                        <td>
                             <?php echo $form->textField($model,'material',array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'meterial', $htmlOptions = array()); ?>
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
                    	<td><?php echo $form->labelEx($model, 'created'); ?></td>
                    	<td>
                            <?php echo $form->textField($model, 'created', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'created', $htmlOptions = array()); ?>
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
        var $down_time=$('#<?php echo get_class($model);?>_created');
        $down_time.on('click', function(){
        WdatePicker({startDate:'%y-%M-%D',dateFmt:'yyyy-MM-dd'});});
    });
</script>