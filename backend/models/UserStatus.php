<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_status".
 *
 * @property integer $status_id
 * @property string $status_name
 */
class UserStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id'], 'required'],
            [['status_id'], 'integer'],
            [['status_name'], 'string', 'max' => 255],
        ];
    }

    public function getStatus_desc(){
        return $this->status_id."-".$this->status_name;
    }

    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'สถานะผู้ใช้งาน',
        ];
    }
}
