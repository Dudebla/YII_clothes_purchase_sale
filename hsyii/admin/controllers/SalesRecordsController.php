<?php
class SalesRecordsController extends BaseController{
    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }

    public function actiontodetail($sell_id){
        $this->redirect(array('/SalesDetail/index1','sellid'=>$sell_id,'keywords'=>''));
    }

    public function actionDelete($sell_id) {
        parent::_clear($sell_id);
    }

    public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('/SalesRecords/update', $data);
        }else{
            $this-> saveData($model,$_POST[$modelName]);
        }
    }

    public function actionUpdate($sell_id) {
        $modelName = $this->model;
        $model = $this->loadModel($sell_id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('/SalesRecords/update', $data);
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
            $criteria->addSearchCondition('sell_no',"$keywords");
        }
        $criteria->order = 'sell_no';
        $data = array();
        parent::_list($model, $criteria, '/SalesRecords/index', $data);
    }

}