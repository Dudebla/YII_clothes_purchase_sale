<div class="box">
      <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>删除</a>
        </div><!--box-header end-->
        <div class="box-search">
            <form action="<?php echo Yii::app()->request->url;?>" method="get">
                <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
                <label style="margin-right:10px;">
                    <span>关键字：</span>
                    <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>
            </form>
        </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
                        <th><?php echo $model->getAttributeLabel('student_code');?></th>
                        <th><?php echo $model->getAttributeLabel('student_name');?></th>
                        <th><?php echo $model->getAttributeLabel('student_grade');?></th>
                        <th><?php echo $model->getAttributeLabel('student_class');?></th>
                        <th><?php echo $model->getAttributeLabel('score_count');?></th>
                        <th><?php echo $model->getAttributeLabel('score_level');?></th>
                       
                        <?php if(Yii::app()->session['islogin'] == 1){?>
                        <th>操作</th>
                        <?php }else{?>
                        <?php }?> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arclist as $v){ ?>
                    <tr>    
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->id); ?>"></td>    

                        <td><?php echo $v->student_code; ?></td>
                        <td><?php echo $v->student_name; ?></td>
                        <td><?php echo $v->student_grade ;?></td>
                         <td><?php echo $v->student_class; ?></td>
                        <td><?php echo $v->score ;?></td>
                     
                         <td><?php
                            if($v->score>=270)
                                echo 'A' ; 
                            else if($v->score>=240 && $v->score<270)
                                echo 'B' ; 
                            else if($v->score>210 && $v->score<240)
                                echo 'C';
                            else if($v->score>=180 && $v->score<210)
                                echo 'D';
                            else if($v->score<180)
                                echo 'D-';

                           ?>
                       </td>
                        <td>
                            <?php if(Yii::app()->session['islogin'] == 1){?>
                            <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->student_code;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
                            <?php }else{?>
                            <?php }?> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"><?php $this->page($pages); ?></div>
    </div><!--box-content end-->
</div><!--box end-->
<script>
var deleteUrl = '<?php echo $this->createUrl('delete', array('id'=>'ID')); ?>';
</script>
