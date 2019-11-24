<div class="box">
      <div class="box-content">
        <div class="box-header">
            
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>
            <a style="display:none;" id="j-delete" class="btn" href="javascript:;" onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i class="fa fa-trash-o"></i>删除</a>
        </div><!--box-header end-->

        <!--显示进货账单-->
        <div class="box-search">
            <form action="<?php echo Yii::app()->request->url;?>" method="get">
                <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
                <label style="margin-right:10px;">
                    <span>单号（进货、销售、退货）：</span>
                    <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>

                <label style="margin-right:10px; margin-left: 50px;">
                    <span>日期：</span>
                    <input style="width:150px;"  class="input-text" type="date" name="date"value="<?php echo Yii::app()->request->getParam('date');?>"/>
                </label>
                <button class="btn btn-blue" type="submit">筛选</button>
            </form>
        </div><!--box-search end-->

        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th><?php echo $model->getAttributeLabel('account_no');?></th>
                        <th>进货账单编号</th>
                        <th><?php echo $model->getAttributeLabel('created');?></th>
                        <th>金额</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 0) {  ?>
                            <?php $purchase_data = PurchaseRecords::model()->find('id='.$v->purchase_id); ?>
                    <tr>        
                        <td><?php echo $v->account_no; ?></td>
                        <td>
                            <?php echo CHtml::link($purchase_data->purchase_no, array('/PurchaseRecords/update','id'=>$purchase_data->id));?>
                        </td>
                        <td><?php echo $v->created; ?></td>
                        <td>
                            <?php  echo $purchase_data->total_amount; ?>
                        </td>
                    </tr>
                        <?php  } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div><!--box-table end -->

        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th>进货总金额</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $purchase_amount = 0; ?>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 0) {  ?>
                            <?php $purchase_data = PurchaseRecords::model()->find('id='.$v->purchase_id); ?>
                            <?php $purchase_amount += $purchase_data->total_amount; ?>
                        <?php  } ?>
                    <?php } ?>
                        <td> <?php echo $purchase_amount  ?></td>
                    </tr>

                </tbody>
            </table>
        </div><!--box-table end -->



        <!--显示销售账单-->
<!--         <div class="box-search" style="margin-top: 50px;">
            <form action="<?php echo Yii::app()->request->url;?>" method="get">
                <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
                <label style="margin-right:10px;">
                    <span>销售单号：</span>
                    <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>

                <label style="margin-right:10px; margin-left: 50px;">

                    <span>日期：</span>
                    <input style="width:150px;"  class="input-text" type="date" name="date" value=""/>
                </label>
                <button class="btn btn-blue" type="submit">筛选</button>
            </form>


        </div> --><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th><?php echo $model->getAttributeLabel('account_no');?></th>
                        <th>销售账单编号</th>
                        <th><?php echo $model->getAttributeLabel('created');?></th>
                        <th>金额</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 1) {  ?>
                            <?php $sale_data = SalesRecords::model()->find('id='.$v->sell_id); ?>
                    <tr>         
                        <td><?php echo $v->account_no; ?></td>
                        <td><?php echo CHtml::link($sale_data->sell_no, array('/SalesRecords/update','id'=>$sale_data->id));?></td>
                        <td><?php echo $v->created; ?></td>
                        <td>
                            <?php  echo $sale_data->amount; ?>
                        </td>
                    </tr>
                        <?php  } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div><!--box-table end -->

        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th>销售总金额</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $sales_amount = 0; ?>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 1) {  ?>
                            <?php $sell_data = SalesRecords::model()->find('id='.$v->sell_id); ?>
                            <?php $sales_amount += $sell_data->amount; ?>
                        <?php  } ?>
                    <?php } ?>
                        <td> <?php echo $sales_amount  ?></td>
                    </tr>

                </tbody>
            </table>
        </div><!--box-table end -->


        <!--显示退货账单-->
<!--         <div class="box-search" style="margin-top: 50px;">
            <form action="<?php echo Yii::app()->request->url;?>" method="get">
                <input type="hidden" name="r" value="<?php echo Yii::app()->request->getParam('r');?>">
                <label style="margin-right:10px;">
                    <span>退货单号：</span>
                    <input style="width:200px;" class="input-text" type="text" name="keywords" value="<?php echo Yii::app()->request->getParam('keywords');?>">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>

                <label style="margin-right:10px; margin-left: 50px;">

                    <span>日期：</span>
                    <input style="width:150px;"  class="input-text" type="date" value=""/>
                </label>
                <button class="btn btn-blue" type="submit">筛选</button>
            </form>


        </div> --><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th><?php echo $model->getAttributeLabel('account_no');?></th>
                        <th>退货账单编号</th>
                        <th><?php echo $model->getAttributeLabel('created');?></th>
                        <th>金额</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 2) {  ?>
                            <?php $return_data = ReturnRecords::model()->find('id='.$v->return_id); ?>
                            <?php  $return_detial_data = SalesDetail::model()->find('id='.$return_data->detail_id); ?>
                    <tr>    
                        <td><?php echo $v->account_no; ?></td>
                        <td><?php echo CHtml::link($return_data->return_no, array('/ReturnRecords/update','id'=>$return_data->id));?></td>
                        <td><?php echo $v->created; ?></td>
                        <td>
                            <?php  echo $return_detial_data->amount; ?>

                        </td>
                    </tr>
                        <?php  } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div><!--box-table end -->

                <div class="box-table">
            <table class="list">
                <thead>
                    <tr>
                        <th>退货总金额</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $return_amount = 0; ?>
                    <?php foreach($arclist as $v){ ?>
                        <?php if($v->account_type == 2) {  ?>
                            <?php $return_data = ReturnRecords::model()->find('id='.$v->return_id); ?>
                            <?php  $return_detial_data = SalesDetail::model()->find('id='.$return_data->detail_id); ?>
                            <?php $return_amount += $return_detial_data->amount; ?>
                        <?php  } ?>
                    <?php } ?>
                        <td> <?php echo $return_amount  ?></td>
                    </tr>

                </tbody>
            </table>
        </div><!--box-table end -->


        <div class="box-page c"><?php $this->page($pages); ?></div>
    </div><!--box-content end-->
</div><!--box end-->