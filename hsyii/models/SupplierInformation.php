<?php

class SupplierInformation extends BaseModel {
    public function tableName() {
        return '{{supplier}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('supplier_no', 'required', 'message' => '{attribute} 不能为空'),
            array('supplier_name', 'required', 'message' => '{attribute} 不能为空'),
            array('telephone', 'required', 'message' => '{attribute} 不能为空'),
            array('contact', 'required', 'message' => '{attribute} 不能为空'),
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('supplier_no,supplier_name,address,contact,telephone,remark,created','safe',), 
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
        //echo('test if error');
        return array(
            'id'=>'ID',
            'supplier_no' => '供应商编号',
             'supplier_name' => '供应商名称',
             'address' => '地址',
             'contact' => '联系人姓名',
             'telephone' => '联系电话',
             'remark' => '备注',
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
