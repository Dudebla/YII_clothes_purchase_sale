<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>供应商信息</h1><span class="back"><a class="btn" href="javascript:;" onclick="we.back();"><i class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
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
                        <td width="30%"><?php echo $form->labelEx($model, 'supplier_no'); ?></td>
                       <td width="30%">
                            <?php echo $form->textField($model, 'supplier_no', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'supplier_no
                            ', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'supplier_name'); ?></td>
                       <td width="30%">
                            <?php echo $form->textField($model, 'supplier_name', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'supplier_name
                            ', $htmlOptions = array()); ?>
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
                         <td><?php echo $form->labelEx($model, 'contact'); ?></td>
                        <td>
                        <?php echo $form->textField($model, 'contact', array('class' => 'input-text')); ?>
                             <?php echo $form->error($model, 'contact', $htmlOptions = array()); ?>
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
        var $down_time=$('#<?php echo get_class($model);?>created');
        $down_time.on('click', function(){
        WdatePicker({startDate:'%y-%M-%D',dateFmt:'yyyy-MM-dd'});});
    });
</script>