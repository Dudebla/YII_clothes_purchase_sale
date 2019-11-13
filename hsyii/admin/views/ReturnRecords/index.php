<div class="box">
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加退货记录</a>
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
                    <th><?php echo $model->getAttributeLabel('return_no');?></th>
                    <th><?php echo $model->getAttributeLabel('detail_id');?></th>
                    <th><?php echo $model->getAttributeLabel('reason');?></th>
                    <th><?php echo $model->getAttributeLabel('return_date');?></th>
                    <th><?php echo $model->getAttributeLabel('created');?></th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($arclist as $v){ ?>
                    <tr>
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->return_id); ?>"></td>
                        <td><?php echo CHtml::link($v->return_no, array('update', 'return_id'=>$v->return_id)); ?></td>
                        <td><?php echo $v->detail_id; ?></td>
                        <td><?php echo $v->reason; ?></td>
                        <td><?php echo $v->return_date; ?></td>
                        <td><?php echo $v->created; ?></td>
                        <td>
                            <a class="btn" href="<?php echo $this->createUrl('update', array('return_id'=>$v->return_id));?>" title="编辑"><i class="fa fa-edit"></i></a>
                            <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->return_id;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
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
    var deleteUrl = '<?php echo $this->createUrl('delete', array('return_id'=>'退货ID')); ?>';
</script>
