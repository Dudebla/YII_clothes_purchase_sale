<?php

class CustomerInformation extends BaseModel{
    public function tableName() {
        return '{{custom}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {

        return array(
            array('custom_no', 'required', 'message' => '{attribute} 不能为空'),
            array('custom_name', 'required', 'message' => '{attribute} 不能为空'),
            array('telephone', 'required', 'message' => '{attribute} 不能为空'),
            array('created', 'required', 'message' => '{attribute} 不能为空'),
            array('custom_no,custom_name,,created','safe',),
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
            'custom_id' => '客户ID',
            'custom_no' => '客户编码',
            'custom_name' => '客户姓名',
            'telephone' => '联系电话',
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