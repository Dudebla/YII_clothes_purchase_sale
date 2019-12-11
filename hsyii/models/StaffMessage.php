<?php


class StaffMessage extends BaseModel
{

    public function tableName()
    {
        return '{{staff_message}}';
    }

    /*
     * 模型验证规则
     */
    public function relus()
    {
        return array(
            array('staff_no', 'required', 'message' => '{attribute} 不能为空'),
            array('staff_name', 'required', 'message' => '{attribute} 不能为空'),
            array('staff_log_name', 'required', 'message' => '{attribute} 不能为空'),
            array('staff_password', 'required', 'message' => '{attribute} 不能为空'),
            array('staff_permissions', 'required', 'message' => '{attribute} 不能为空'),
            array('address', 'required', 'message' => '{attribute} 不能为空'),
            array('telephone', 'required', 'message' => '{attribute} 不能为空'),
        );
    }

    /*
     * 模型关联规则
     * */
    public function relations()
    {
        return array();
    }

    /*
     * 属性标签
     */
    public function attributeLabels(){
        return array(
            'id' => 'ID',//修改为数据库对应字段“staff_id”
            'staff_no' => '员工编码',
            'staff_name' => '姓名',
            'staff_log_name' => '登录名',
            'staff_password' => '登录密码',
            'staff_permissions' => '权限',
            'gender' => '性别',
            'telephone' => '通讯号码',
            'address' => '通讯住址',
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
