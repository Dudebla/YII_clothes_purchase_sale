<?php
/**
 * Created by PhpStorm.
 * User: zpp
 * Date: 2019/11/11
 * Time: 21:22
 */

class ReturnRecordsController extends BaseController{

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

    public function actionDelete($id) {
        parent::_clear($id);
    }

    // public function actionCreate() {
    //     $modelName = $this->model;
    //     $model = new $modelName('create');
    //     $data = array();
    //     if (!Yii::app()->request->isPostRequest) {
    //         $data['model'] = $model;
    //         $this->render('/ReturnRecords/update', $data);
    //     }else{
    //         $this-> saveData($model,$_POST[$modelName]);
    //     }
    // }

    // public function actionUpdate($return_id) {
    //     $modelName = $this->model;
    //     $model = $this->loadModel($return_id, $modelName);
    //     if (!Yii::app()->request->isPostRequest) {
    //         $data = array();
    //         $data['model'] = $model;
    //         $this->render('/ReturnRecords/update', $data);
    //     } else {
    //         $this-> saveData($model,$_POST[$modelName]);
    //     }
    // }/*曾老师保留部份，---结束*/

    // function saveData($model,$post) {
    //     $model->attributes =$post;
    //     show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');
    // }

     public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
         //创建新的account记录
        $accountName = AccountInformation::model()->model();
        $account = new $accountName('create');

        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('/ReturnRecords/update', $data);
        }else{
            $this-> saveData($model,$account,$_POST[$modelName]);
        }
    }

    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $data['account'] = AccountInformation::model()->findAll('id='.$model->id.'');
            $this->render('/ReturnRecords/update', $data);
        } else {
            $this-> updateData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/

    function saveData($model,$modelAccount,$post) {
        $model->attributes =$post;

        $sv = $model->save();   

        $this->saveAccount($modelAccount,$model->id);        

        show_status($sv,'保存成功', get_cookie('_currentUrl_'),'保存失败');
    }

    function updateData($model,$post){
        $model->attributes =$post;
        show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');
    }


    //保存账单记录
    public function saveAccount($modelAccount,$id){
        $model = ReturnRecords::model()->find('return_id='.$id);      
        $modelAccount->account_no = "ACCOUNT".$this->findNum($model->return_no);
        $modelAccount->return_id = $model->id;
        $modelAccount->account_type = 2;
        $modelAccount->created = $model->created;
        $sv = $modelAccount->save();

    }

    ///列表搜索
    public function actionIndex( $keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $data = $model->findAll();
        $criteria = new CDbCriteria;
        if($keywords!=''){
            $criteria->addSearchCondition('return_no',"$keywords");
        }
        $criteria->order = 'return_no';
        $data = array();
        parent::_list($model, $criteria, '/ReturnRecords/index', $data);
    }
    
    //查看功能，不能修改
    public function actionRead($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('/ReturnRecords/read', $data);
        } else {
            $this-> saveData($model,$_POST[$modelName]);
        }
    }

        //找出字符串中的数字并返回
    function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $temp=array('1','2','3','4','5','6','7','8','9','0');
        $result='';
        for($i=0;$i<strlen($str);$i++){
        if(in_array($str[$i],$temp)){
        $result.=$str[$i];
        }
        }
        return $result;
    }


}
