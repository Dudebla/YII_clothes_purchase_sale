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

    public function actionDelete($return_id) {
        parent::_clear($return_id);
    }

    public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('/ReturnRecords/update', $data);
        }else{
            $this-> saveData($model,$_POST[$modelName]);
        }
    }

    public function actionUpdate($return_id) {
        $modelName = $this->model;
        $model = $this->loadModel($return_id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('/ReturnRecords/update', $data);
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
        if($keywords!=''){
            $criteria->addSearchCondition('return_no',"$keywords");
        }
        $criteria->order = 'return_no';
        $data = array();
        parent::_list($model, $criteria, '/ReturnRecords/index', $data);
    }

}