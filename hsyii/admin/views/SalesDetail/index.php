<div class="box">
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加详情记录</a>
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a class="btn" href="<?php echo $this->createUrl('goback');?>"><i class="fa fa-reply"></i>返回</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>删除</a>
        </div><!--box-header end-->
        <div class="box-search">
        </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                <tr>
                    <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
                    <th><?php echo $model->getAttributeLabel('detail_no');?></th>
                    <th><?php echo $model->getAttributeLabel('sell_id');?></th>
                    <th><?php echo $model->getAttributeLabel('goods_id');?></th>
                    <th><?php echo $model->getAttributeLabel('quantity');?></th>
                    <th><?php echo $model->getAttributeLabel('price');?></th>
                    <th><?php echo $model->getAttributeLabel('amount');?></th>
                    <th><?php echo $model->getAttributeLabel('created');?></th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($arclist as $v){ ?>
                    <tr>
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->detail_id); ?>"></td>
                        <td><?php echo CHtml::link($v->detail_no, array('update', 'detail_id'=>$v->detail_id)); ?></td>
                        <td><?php echo $v->sell_id; ?></td>
                        <td><?php echo $v->goods_id; ?></td>
                        <td><?php echo $v->quantity; ?></td>
                        <td><?php echo $v->price; ?></td>
                        <td><?php echo $v->amount; ?></td>
                        <td><?php echo $v->created; ?></td>
                        <td>
                            <a class="btn" href="<?php echo $this->createUrl('update', array('detail_id'=>$v->detail_id));?>" title="编辑"><i class="fa fa-edit"></i></a>
                            <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->detail_id;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
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
    var deleteUrl = '<?php echo $this->createUrl('delete', array('detail_id'=>'销售详情ID')); ?>';
</script>
