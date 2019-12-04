<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zh-cn"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="zh-cn"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="zh-cn"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="zh-cn"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>商品管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?php $cs = Yii::app()->clientScript;?>
    <?php $cs->registerCssFile(Yii::app()->request->baseUrl.'/static/admin/css/public.css');?>
    <?php $cs->registerCssFile(Yii::app()->request->baseUrl.'/static/admin/css/font.css');?>
    <?php $cs->registerCssFile(Yii::app()->request->baseUrl.'/static/admin/css/index.css');?>
    <?php //$cs->registerCoreScript('jquery', CClientScript::POS_END);?>
    <?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/jquery.js', CClientScript::POS_END);?>
    <?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/jquery.nicescroll.js', CClientScript::POS_END);?>
    <?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/index.js', CClientScript::POS_END);?>
    <style>
        td{
            padding: 20px 0px;
            font-weight: bold;
            color: black;
            font-size: 14px;
        }
        button{
            border: none;
            border-radius: 3px;
            padding: 7px 28px;
            color: black;
            font-weight: bold;
            font-size: 14px;
        }
        .title{
            font-size: 20px;font-weight: bold;color: black;background-color: rgba(33,33,33,0.14);
        }
        #shurulan{
            width: 20%;
            display: inline-block;
            text-align: center;
            background: #ccc;
            height: 100%;
            line-height: 62px;
            border-right: 1px solid black;
        }
    </style>
</head>
<body>


<div class="box">
    <div class="box-content">
        <div class="box-search">
            <form action="/index.php?r=GoodsInventoryInformation/index" method="post">

                <label style="margin-right:10px;">
                    <span>关键字：</span>
                    <input style="width:200px;" class="input-text" placeholder="输入编号" type="text" name="keywords" value="">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>
            </form>
        </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                <tr>

                    <th>商品编号</th>
                    <th>商品名</th>
                    <th>库存数量</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach($bianhaochaxungoods as $good): ?>
                    <tr>
                        <td><?php echo $good['goods_no']; ?></td>
                        <td><?php echo $good['goods_name']; ?></td>
                        <td><?php echo $good['num']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"></div>
    </div><!--box-content end-->
</div>





<div class="box">
    <div class="box-content">
        <div class="box-search">
            <form action="/index.php?r=GoodsInventoryInformation/index" method="post">
                <label style="margin-right:10px;">
                    <span>关键字：</span>
                    <input style="width:200px;" class="input-text" placeholder="输入名称" type="text" name="keywords2" value="">
                </label>
                <button class="btn btn-blue" type="submit">查询</button>
            </form>
        </div><!--box-search end-->
        <div class="box-table">
            <table class="list">
                <thead>
                <tr>

                    <th>序号</th>
                    <th>商品名</th>
                    <th>衣服类型</th>
                    <th>库存数量</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($mingchengchaxungoods as $good): $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $good['goods_name']; ?></td>
                            <td><?php echo $good['type_name']; ?></td>
                            <td><?php echo $good['num']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"></div>
    </div><!--box-content end-->
</div>





<script>

</script>



</html>
