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
            //array('purchase_id','required','message'=>'{attribute} 不能为空'),
            array('detail_id', 'required', 'message' => '{attribute} 不能为空'),
            //array('supplier_id', 'required', 'message' => '{attribute} 不能为空'),
            array('operator', 'required', 'message' => '{attribute} 不能为空'),
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('purchase_no,detail_id,operator,purchase_date,remark,quantity,total_amount,created','safe',), 
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
             'purchase_no' => '进货单号',
             'detail_id' => '商品详情ID',
             'operator' => '职员ID',
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
