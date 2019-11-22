<div class="box">
      <div class="box-content">
    	<div class="box-header">
            <a class="btn" href="<?php echo $this->createUrl('create');?>"><i class="fa fa-plus"></i>添加商品详情</a>
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
                        <!--th?php echo $model->getAttributeLabel('purchase_id');?></th-->
                        <th><?php echo $model->getAttributeLabel('detail_no');?></th>
                        <th><?php echo $model->getAttributeLabel('goods_id');?></th>
                        <th><?php echo $model->getAttributeLabel('detail_size');?></th>
                        <th><?php echo $model->getAttributeLabel('detail_color');?></th>
                        <th><?php echo $model->getAttributeLabel('created');?></th>
                        <th><?php echo $model->getAttributeLabel('remark');?></th>
                       
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                  	<?php foreach($arclist as $v){ ?>
                    <tr> 	
                    <!--change by default id in any attribute-->
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo CHtml::encode($v->id); ?>"></td>           
                        <td><?php echo CHtml::link($v->detail_no, array('update', 'id'=>$v->id)); ?></td>
                        <!--td php echo $v->purchase_no; </td-->
                        <td><?php echo CHtml::link($v->goods_id,array('GoodsInformation/read','id'=>$v->goods_id)); ?></td>
                        <td><?php echo $v->detail_size; ?></td>
                        <td><?php echo $v->detail_color; ?></td>
                        <td><?php echo $v->created;?></td>
                        <td><?php echo $v->remark; ?></td>
                        <td>
                            <a class="btn" href="<?php echo $this->createUrl('update', array('id'=>$v->id));?>" title="编辑"><i class="fa fa-edit"></i></a>
                            <a class="btn" href="javascript:;" onclick="we.dele('<?php echo $v->id;?>', deleteUrl);" title="删除"><i class="fa fa-trash-o"></i></a>
                           
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
