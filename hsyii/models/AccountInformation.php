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
            // array('purchase_id', 'required', 'message' => '{attribute} 不能为空'),
            array('account_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('sell_id', 'required', 'message' => '{attribute} 不能为空'),
            // array('return_id', 'required', 'message' => '{attribute} 不能为空'),
            // array('created', 'required', 'message' => '{attribute} 不能为空'),
            array('account_no,purchase_id,account_type,sell_id,return_id,created','safe',), 
        );
    }

    /**
     * 模型关联规则
     */
    public function relations() {
        // return array();
         return array( 
            'salesRecords' => array(self::HAS_ONE, 'SalesRecords', array('sell_id'=>'sell_id')), 
            // 'purchase' => array(self::hasMany, 'purchase', 'purchase_id'), 
            'sellReturn' => array(self::HAS_ONE, 'ReturnRecords', array('return_id'=>'return_id')), 
        ); 

    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
            'account_id' => '账单ID',
             'account_no' => '账单编号',
             'purchase_id' => '进货信息ID',
             'account_type' => '进货类型', //账目类型，0进货，1售货，2退货
             'sell_id' => '销售信息ID',
             'return_id'=> '退货信息ID',
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
