<?php


class PublicMessage extends BaseModel {
    public function tableName(){
        return '{{public_message}}';
    }

    /*
     *  模型验证规则
     */
    public function rules()
    {
        return array(
            array('gender', 'required', 'message' => '{attribute} 不能为空'),
            array('permissions', 'required', 'message' => '{attribute} 不能为空'),
        );
    }

    /*
     * 模型关联规则
     * */
    public function relations(){
        return array();
    }

    /*
     * 属性标签
     * */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'gender' => '性别',
            'permissions' => '权限'
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }



    public function getCode() {
        return $this->findAll('1=1');
    }
}