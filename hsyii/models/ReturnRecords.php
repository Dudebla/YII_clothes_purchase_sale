<?php
/**
 * Created by PhpStorm.
 * User: zpp
 * Date: 2019/11/11
 * Time: 21:30
 */

class ReturnRecords extends BaseModel{
    public function tableName() {
        return '{{sell_return}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {

        return array(
            array('return_no', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_id', 'required', 'message' => '{attribute} 不能为空'),
            array('reason', 'required', 'message' => '{attribute} 不能为空'),
            array('return_date', 'required', 'message' => '{attribute} 不能为空'),
            array('created', 'required', 'message' => '{attribute} 不能为空'),
            array('return_no,detail_id,reason,return_date,created','safe',),
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
            'return_id' => '退货ID',
            'return_no' => '客户编码',
            'detail_id' => '销售订单详细信息ID',
            'reason' => '退货原因',
            'return_date' => '退货日期',
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