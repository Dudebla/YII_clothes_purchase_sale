<?php

class GoodsInventoryDetail extends BaseModel{
    public function tableName() {
        return '{{sell_detail}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {

        return array(
            array('detail_id', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_no', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_id', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_size', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_color', 'required', 'message' => '{attribute} 不能为空'),
            array('remark', 'required', 'message' => '{attribute} 不能为空'),
            array('created', 'required', 'message' => '{attribute} 不能为空'),
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
            'detail_id' => '销售详情ID',
            'detail_no' => '订单编码',
            'goods_id' => '商品ID',
            'detail_size' => '尺寸',
            'detail_color' => '颜色',
            'remark' => '说明',
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