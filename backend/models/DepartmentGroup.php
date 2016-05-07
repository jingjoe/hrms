<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use Yii;

use common\models\User;

/**
 * This is the model class for table "department_group".
 *
 * @property integer $depart_group_id
 * @property string $depart_group_name
 */
class DepartmentGroup extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'department_group';
    }

    public function rules()
    {
        return [
            [['depart_group_name'], 'required'],
            [['depart_group_name'], 'string', 'max' => 255],
            [['create_date', 'modify_date'], 'safe'],
            [['created_by','updated_by'], 'integer']
        ];
    }
    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'create_date',
            'updatedAtAttribute' => 'modify_date',
            'value' => new Expression('NOW()'),
            ],
            [  
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'created_by',
            'updatedByAttribute' => 'updated_by',],  
        ];
    }

    public function attributeLabels() {
        return [
            'depart_group_id',
            'depart_group_name' => 'ชื่อฝ่าย',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
            'created_by' => 'บันทึกโดย',
            'updated_by' => 'อับเดทโดย',
// เพิ่มฟิวล์ใหม่ จาก funtion get  relation  
            'loginname' => 'ชื่อผู้บันทึก',
            'updatename' => 'ชื่อผู้อับเดท'
        ];
    }
// get ชื่อผู้บันทึก
    public function getLogin() {
        return @$this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getLoginname() {
        return @$this->login->username;
    }
// get ชื่อผู้อับเดท
    public function getUpdate() {
        return @$this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    public function getUpdatename() {
        return @$this->update->username;
    }
}
