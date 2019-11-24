<?php

class SalesDetail extends BaseModel{
    public function tableName() {
        return '{{sell_detail}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {

        return array(
            array('detail_no', 'required', 'message' => '{attribute} 不能为空'),
            array('sell_id', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_id', 'required', 'message' => '{attribute} 不能为空'),
            array('quantity', 'required', 'message' => '{attribute} 不能为空'),
            array('price', 'required', 'message' => '{attribute} 不能为空'),
            array('amount', 'required', 'message' => '{attribute} 不能为空'),
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
            'id' => 'ID',
            'detail_no' => '订单编码',
            'sell_id' => '销售订单ID',
            'goods_id' => '商品ID',
            'quantity' => '商品数量',
            'price' => '商品单价',
            'amount' => '订单总金额',
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