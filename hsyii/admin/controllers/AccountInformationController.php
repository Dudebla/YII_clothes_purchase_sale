<?php
 
class AccountInformationController extends BaseController {

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
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
            $this->render('update', $data);
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
           $this->render('update', $data);
        } else {
           $this-> saveData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/
  
 function saveData($model,$post) {
       $model->attributes =$post;
       show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');  
 }

    ///列表搜索
     public function actionIndex( $keywords = '',$date = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $data = $model->findAll();

        $criteria = new CDbCriteria;
        if($keywords!=''){
            $criteria->addSearchCondition('account_no',"$keywords");
        }
        if($date!=''){
            $criteria->addSearchCondition('created',"$date");
        }
        $criteria->order = 'created DESC';
        $data = array();

        parent::_list($model, $criteria, 'index', $data);
    }

    // public function getPurchaseMoneyById(){
    //         $records=this->hasMany(PurchaseRecords::className(),["purchase_id"=>"purchase_id"])->asArray()->all();
    //         return $records;
    // }

    // public function getReturnMoneyById(){
    // public function getSellMoneyById(){
    //         $records=this->hasMany(SellRecords::className(),["sell_id"=>"sell_id"])->asArray()->all();
    //         return $records;
    // }
    // public function getReindexturnMoneyById(){
    //         $records=this->hasMany(ReturnRecords::className(),["return_id"=>"return_id"])->asArray()->all();
    //         return $records;
    // }

    // public function getSellMoneyById(){

    //     // $records= $this->hasOne(SalesRecords::className(),["sell_id"=>"sell_id"]);
    //     $records = AccountInformation::model()->with('sellMoneyById')->findAll();
    //     return $records;
    //     // return AccountInformation::find()->joinWith('SellMoneyById');

    // }
}
