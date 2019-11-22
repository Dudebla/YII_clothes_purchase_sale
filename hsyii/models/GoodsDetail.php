<?php

class GoodsDetail extends BaseModel {
    public function tableName() {
        return '{{goods_detail}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('detail_no', 'required', 'message' => '{attribute} 不能为空'),
            array('goods_id', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_size', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_color', 'required', 'message' => '{attribute} 不能为空'),
           
            // array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            // array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            // array('score', 'required', 'message' => '{attribute} 不能为空'),
            // array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('detail_no,goods_id,detail_size,detail_color,remark,created','safe',), 
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
             'detail_no' => '商品详情编号',
             'goods_id' => '商品信息ID',
             'detail_size' => '尺寸',
             'detail_color' => '颜色',
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
