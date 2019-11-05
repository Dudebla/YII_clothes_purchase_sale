<?php

class AccountInformation extends BaseModel {
    public function tableName() {
        return '{{account}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('account_no', 'required', 'message' => '{attribute} 不能为空'),
            array('purchase_id', 'required', 'message' => '{attribute} 不能为空'),
            array('account_type', 'required', 'message' => '{attribute} 不能为空'),
            array('sell_id', 'required', 'message' => '{attribute} 不能为空'),
            array('created', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('account_no,purchase_id,account_type,sell_id,created','safe',), 
        );
    }

    /**
     * 模型关联规则
     */
    public function relations() {
        return array(
         
        );
    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
            'account_id' => '账单ID',
             'account_no' => '账单编号',
             'purchase_id' => '进货ID',
             'account_type' => '进货类型',
             'sell_id' => '销售ID',
             'created' => '记录添加日期',
 );
}

    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    

    public function getCode() {
        return $this->findAll('1=1');
    }
}
