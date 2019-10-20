<?php

class StudentQuality extends BaseModel {
    public function tableName() {
        return '{{score_data_list}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
            array('student_code', 'required', 'message' => '{attribute} 不能为空'),
            array('student_name', 'required', 'message' => '{attribute} 不能为空'),
            array('student_grade', 'required', 'message' => '{attribute} 不能为空'),
            array('student_class', 'required', 'message' => '{attribute} 不能为空'),
            array('student_sex', 'required', 'message' => '{attribute} 不能为空'),
            array('score_type', 'required', 'message' => '{attribute} 不能为空'),
            array('score', 'required', 'message' => '{attribute} 不能为空'),
            array('add_time', 'required', 'message' => '{attribute} 不能为空'),
            array('student_code,student_name,student_class,student_sex,student_birth,student_telnumber,student_email,add_time','safe',), 
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
             'student_code' => '学生学号',
             'student_name' => '学生姓名',
             'student_grade' => '学生年级',
             'student_class' => '学生班级',
             'student_sex' => '学生性别',
             'score_type' => '成绩类型',
             'score' => '成绩',
             'add_time' => '添加时间',
             'score_count' =>'总分' ,
             'score_level' =>'评级'
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
