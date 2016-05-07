<?php

namespace backend\models;

use Yii;
use backend\models\Type;
use backend\models\Riskgroup;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $level_id
 * @property string $level_name
 * @property integer $type_id
 * @property integer $group_id
 * @property string $level_warning
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'level_name'], 'required'],
            [['type_id', 'group_id', 'type_id', 'group_id'], 'integer'],
            [['level_id'], 'string', 'max' => 1],
            [['level_name'], 'string', 'max' => 255],
            [['level_warning'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_id' => 'ระดับ',
            'level_name' => 'ชื่อระดับความรุนแรง',
            'type_id' => 'ประเภทความเสี่ยง',
            'group_id' => 'กลุ่มความเสี่ยง',
            'level_warning' => 'ระดับการเตือน',
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation  
            'typename' => 'ประเภทความเสี่ยง',
            'groupname' => 'กลุ่มความเสี่ยง',
        ];
    }
 // get ประเภทความเสี่ยง
        public function getType() {
        return @$this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    public function getTypename() {
        return @$this->type->name;
    }
 // get กลุ่มความเสี่ยง
        public function getRiskgroup() {
        return @$this->hasOne(Riskgroup::className(), ['id' => 'group_id']);
    }

    public function getGroupname() {
        return @$this->riskgroup->name;
    }
}
