<?php
 
class IndexController extends BaseController
{

    public $layout = false;

    public function actionIndex()
    {
        if (isset(Yii::app()->session['islogin'])) {
            $this->render('index');
        } else {
            $this->login_form();
        }
    }

    public function actionLogin()
    {
        $this->login_form();
    }

    public function actionLogout()
    {
        unset(Yii::app()->session['islogin']);
        $this->login_form();
    }

    function login_form()
    {
        Yii::app()->session['admin_id'] = null;
        $model = new StaffMessage('create');
        $model['staff_log_name'] = '';
        $model['staff_password'] = '';
        $data = array();
        $data['model'] = $model;
        $s1 = 'login';
        $this->render($s1, $data);
    }

    public function actionCheckuser1()
    {
        $staff_log_name = '0';
        $data['staff_log_name'] = '';
        if (isset($_REQUEST['staff_log_name'])) {
            $staff_log_name = $_REQUEST['staff_log_name'];
        }
        $model = StaffMessage::model()->find("staff_log_name='" . $staff_log_name . "'");
        if (isset($model->staff_password) && $model->staff_password == $_REQUEST['staff_password']) {
            Yii::app()->session['islogin'] = $model->staff_permissions;
            $data['staff_log_name'] = $staff_log_name;
        }
        echo CJSON::encode($data);
    }
}