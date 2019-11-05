<?php

class PurchaseRecords extends BaseModel {
    public function tableName() {
        return '{{purchase}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('purchase_no', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_no', 'required', 'message' => '{attribute} 不能为空'),
            array('supplier_id', 'required', 'message' => '{attribute} 不能为空'),
            array('staff_id', 'required', 'message' => '{attribute} 不能为空'),
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('purchase_no,goods_no,supplier_id,staff_id,purchase_date,remark,quantity,total_amount,created','safe',), 
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
            'purchase_id' => '进货ID',
             'purchase_no' => '进货单号',
             'goods_no' => '商品编号',
             'supplier_id' => '供应商ID',
             'staff_id' => '职员ID',
             'purchase_date' => '进货日期',
             'remark' => '备注',
             'quantity' => '数量',
             'total_amount' => '总额',
             'created' => '记录添加时间'
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
