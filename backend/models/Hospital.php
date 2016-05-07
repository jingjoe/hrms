<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

use dektrium\user\models\User;

/**
 * This is the model class for table "hospital".
 *
 * @property integer $hos_id
 * @property string $hos_code
 * @property string $hos_name
 * @property string $hos_address
 * @property string $hos_tel
 * @property string $hos_fax
 * @property string $hos_website
 * @property string $hos_active_code
 */
class Hospital extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'hospital';
    }
    
    public function rules()
    {
        return [
            [['hos_code', 'hos_name', 'hos_address', 'hos_tel','hos_fax', 'hos_email','hos_active_code'], 'required'],
            [['hos_website', 'hos_active_code'], 'string'],
            [['hos_code'], 'string', 'max' => 5],
            [['hos_name'], 'string', 'max' => 150],
            [['hos_address','hos_email'], 'string', 'max' => 200],
            [['hos_phone'], 'string', 'max' => 11],
            [['hos_tel', 'hos_fax'], 'string', 'max' => 10],
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
            'hos_id',
            'hos_code' => 'HCODE',
            'hos_name' => 'ชื่อโรงพยาบาล',
            'hos_address' => 'ที่อยู่',
            'hos_tel' => 'เบอร์โทร',
            'hos_phone' => 'เบอร์โทรมือถือ',
            'hos_fax' => 'แฟกซ์',
            'hos_email' => 'อีเมล์',
            'hos_website' => 'เว็บไซต์',
            'hos_active_code' => 'รหัสยืนยัน',
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
