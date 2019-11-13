<?php

class SalesRecords extends BaseModel {
    public function tableName() {
        return '{{saller_sales}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {

        return array(
            array('sell_no', 'required', 'message' => '{attribute} 不能为空'),
            array('operator', 'required', 'message' => '{attribute} 不能为空'),
            array('custom_id', 'required', 'message' => '{attribute} 不能为空'),
            array('amount', 'required', 'message' => '{attribute} 不能为空'),
            array('sell_date', 'required', 'message' => '{attribute} 不能为空'),
            array('created', 'required', 'message' => '{attribute} 不能为空'),
            array('sell_no,operator,custom_id,amount,sell_date,created','safe',),
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
            'sell_id' => '销售ID',
            'sell_no' => '订单编码',
            'operator' => '销售员ID',
            'custom_id' => '客户ID',
            'amount' => '金额',
            'sell_date' => '交易日期',
            'created' => '添加时间',
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
