<?php

$config = require(ROOT_PATH . "/include/config.php");
$params = array_merge($config['params'], array('buyer' => array('admin'),));
$st="";

    $params['buyer'] = array(
    array(
        '进货管理',
        array(
            'award_index41' => array('进货记录', '/PurchaseRecords/index'),
            'award_index42' => array('供应商信息', '/SupplierInformation/index'),
            'award_index43' => array('商品详情', '/GoodsDetail/index'),
            'award_index44' => array('商品信息', '/GoodsInformation/index'),
            
            ),
       ),
    array(
        '销售管理',
        array(
            'award_index41' => array('销售记录', 'SalesRecords/index'),
            'award_index42' => array('退货信息', 'ReturnRecords/index'),
            'award_index43' => array('客户信息', 'CustomerInformation/index'),
        )
    ),
    array(
        '财务报表',
        array(
            'award_index41' => array('报表信息', 'AccountInformation/index'),
        )
    ),
    array(
        '库存统计',
        array(
            'award_index41' => array('库存信息', 'InventoryInformation/index'),
        )
    ) ,       
    array(
        '系统管理',
        array(
            'award_index41' => array('员工信息', 'StaffMessage/index'),
            'award_index42' => array('添加员工', 'StaffMessage/create'),
            'award_index43' => array('公共信息', 'PublicMessage/index'),
        )
    )     
   
  );




$main = array(
    'basePath' => ROOT_PATH . '/admin',
    'runtimePath' => ROOT_PATH . '/runtime/admin',
    'name' => '',
    'defaultController' => 'index',
    'components' => array(
        'db' => $config['components']['db'],
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info,error, warning'
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'trace'
                ),
            ),
        ),
    ),
    'params' => $params,
);

return array_merge($config, $main);
?>

<ul class="sidebar-menu">            
<li class="treeview">               
    <a href="#">                    
        <i class="fa fa-gears"></i> <span>權限控制</span>                    
        <i class="fa fa-angle-left pull-right"></i>               
    </a>               
    <ul class="treeview-menu">                   
        <li class="treeview">                        
            <a href="/admin">管理員</a>                        
            <ul class="treeview-menu">                            
                <li><a href="/user"><i class="fa fa-circle-o"></i> 後臺用戶</a></li>                            
                <li class="treeview">                                
                    <a href="/admin/role"> <i class="fa fa-circle-o"></i> 權限 <i class="fa fa-angle-left pull-right"></i>
                    </a>                                
                    <ul class="treeview-menu">                                    
                        <li><a href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>
                        <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 權限</a></li>
                        <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>
                        <li><a href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>
                        <li><a href="/admin/menu"><i class="fa fa-circle-o"></i> 菜單</a></li>
                    </ul>                           
                </li>                        
            </ul>                    
        </li>                
    </ul>            
    </li>        
</ul>