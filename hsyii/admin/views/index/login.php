<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zh-cn"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="zh-cn"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="zh-cn"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="zh-cn"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>衣服进销存管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php $cs = Yii::app()->clientScript;?>
<?php $cs->registerCssFile(Yii::app()->request->baseUrl.'/static/admin/css/login.css');?>
<?php $cs->registerCoreScript('jquery');?>
<?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/jquery.nicescroll.js');?>

<?php $cs->registerCssFile(Yii::app()->request->baseUrl.'/static/admin/js/jquery.fallr/jquery.fallr.css');?>
<?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/jquery.fallr/jquery.fallr.js');?>

<?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/static/admin/js/public.js');?>
</head>
<body>
<div class="wrapper">
    <div class="main">
    <?php  $form = $this->beginWidget('CActiveForm', get_form_login()); ?>
        <div class="item"><h1>歡迎使用衣服进销存管理系统</h1></div>
        <div class="item">
            <?php echo $form->textField($model, 'staff_log_name', array('maxlength' => 50, 'class' => 'user-input', 'placeholder'=>'用護名')); ?>
            <?php echo $form->error($model, 'staff_log_name', $htmlOptions = array()); ?>
        </div><!--item end-->
        <div class="item">
            <?php echo $form->passwordField($model, 'staff_password', array('class' => 'pwd-input', 'placeholder'=>'密碼')); ?>
            <?php echo $form->error($model, 'staff_password', $htmlOptions = array()); ?>
        </div><!--item end-->
      
        <div class="item">
        <button class="button "  type="submit"  onclick="login();" style=" color: #ff000" >登陆</button></div><!--item end-->
    <?php $this->endWidget(); ?>
    </div><!--main end-->
</div><!--wrapper end-->
</body>
</html>

<script>
function login() {
    $("#CActiveForm").serialize();
    var $userChecker = '<?php echo $this->createUrl("index/checkuser1"); ?>';
    $.ajax({
        type: 'get',
        url: $userChecker,
        data: {staff_log_name: $("#StaffMessage_staff_log_name").val(), staff_password: $("#StaffMessage_staff_password").val()},
        dataType: 'json',
        success: function(data) {
            if (data.staff_log_name == "") {
                alert("密码不正确");
            } else {
                window.location.href = '/YII_clothes_purchase_sale/hsyii';
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
        }
    });
 }


window.alert=function(str)   
  { 
    var iframe = document.createElement("IFRAME");
    iframe.style.display="none";
    iframe.setAttribute("src", 'data:text/plain');
    document.documentElement.appendChild(iframe);
    window.frames[0].window.alert(str);
    iframe.parentNode.removeChild(iframe);

 //function       Alert(strText){
    //   var       pWin=window.showModalDialog("b.htm",str,"dialogHeight:116px;       dialogWidth:232px;       help:       No;       resizable:       no;       status:       No;       scroll:no;       dialogTop:"+(screen.height-116)/2+"px;       dialogLeft:"+(screen.width-232)/2+"px;");
   //    }
  } 
</script>

