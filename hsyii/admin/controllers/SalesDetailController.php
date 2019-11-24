<?php

class SalesDetailController extends BaseController{

    protected $model = '';
    protected $sellid='';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

    public function actiongoback(){
        $this->redirect(array('/SalesRecords/index','keywords'=>''));
    }

    public function actionDelete($id) {
        parent::_clear($id);
    }

    public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('/SalesDetail/update', $data);
        }else{
            $this-> saveData($model,$_POST[$modelName]);
        }
    }

    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('/SalesDetail/update', $data);
        } else {
            $this-> saveData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/

    function saveData($model,$post) {
        $model->attributes =$post;
        show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');
    }

    ///列表搜索
    public function actionIndex( $keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $data = $model->findAll();
        $criteria = new CDbCriteria;
        $criteria->params[':sellid']=$this->sellid;
        $criteria->addCondition("sell_id=:sellid");
        if($keywords!=''){
            $criteria->addSearchCondition('detail_no',"$keywords");
        }
        $criteria->order = 'detail_no';
        $data = array();
        parent::_list($model, $criteria, '/SalesDetail/index', $data);
    }

    ///列表搜索
    public function actionindex1( $sellid = '',$keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $data = $model->findAll();
        $criteria = new CDbCriteria;
        $this->sellid=$sellid;
        $criteria->params[':sellid']=$sellid;
        $criteria->addCondition("sell_id=:sellid");
        if($keywords!=''){
            $criteria->addSearchCondition('detail_no',"$keywords");
        }
        $criteria->order = 'detail_no';
        $data = array();
        parent::_list($model, $criteria, '/SalesDetail/index', $data);
    }

}