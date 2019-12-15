<div class="box">
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a class="btn" href="<?php echo $this->createUrl('goback');?>"><i class="fa fa-reply"></i>返回</a>
        </div><!--box-header end-->
        <div class="box-search">
        </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                <tr>
                    <th><?php echo $model->getAttributeLabel('detail_no');?></th>
                    <th><?php echo $model->getAttributeLabel('sell_id');?></th>
                    <th><?php echo $model->getAttributeLabel('goods_id');?></th>
                    <th><?php echo $model->getAttributeLabel('quantity');?></th>
                    <th><?php echo $model->getAttributeLabel('price');?></th>
                    <th><?php echo $model->getAttributeLabel('amount');?></th>
                    <th><?php echo $model->getAttributeLabel('created');?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($arclist as $v){ ?>
                    <tr>
                        <td><?php echo CHtml::link($v->detail_no, array('update', 'id'=>$v->id)); ?></td>
                        <td><?php echo $v->sell_id; ?></td>
                        <td><?php echo $v->goods_id; ?></td>
                        <td><?php echo $v->quantity; ?></td>
                        <td><?php echo $v->price; ?></td>
                        <td><?php echo $v->amount; ?></td>
                        <td><?php echo $v->created; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"><?php $this->page($pages); ?></div>
    </div><!--box-content end-->
</div><!--box end-->
