<?php

class GoodsType extends BaseModel {
    public function tableName() {
        return '{{goods_type}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('type_id', 'required', 'message' => '{attribute} 不能为空'),
            array('type_name', 'required', 'message' => '{attribute} 不能为空'),
            
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('type_id,type_name,created','safe',), 
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
            'type_id' => 'ID',
             'type_name'=>"衣服类型名称",
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
