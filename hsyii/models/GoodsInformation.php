<?php

class GoodsInformation extends BaseModel {
    public function tableName() {
        return '{{goods_message}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('goods_no', 'required', 'message' => '{attribute} 不能为空'),
            array('type_id', 'required', 'message' => '{attribute} 不能为空'),
            array('supplier_id', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_name', 'required', 'message' => '{attribute} 不能为空'),
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_no,supplier_id,type_id,goods_name,material,remark,created','safe',), 
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
            'id' => 'ID',
             'goods_no'=>'商品信息编号',
             'supplier_id'=>'供应商ID',
             'type_id'=>'衣物种类',
             'goods_name'=>'商品名称',
             'material'=>'材质',
             'remark'=>'备注',
             'created'=>'添加时间',
            
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
