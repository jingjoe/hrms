<?php

namespace backend\models;

use Yii;
use backend\models\Type;

/**
 * This is the model class for table "program".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อโปรแกรม',
            'type_id' => 'ประเภทความเสี่ยง',
            'typename' => 'ประเภทความเสี่ยง',
        ];
    }
  // get ประเภทความเสี่ยง
        public function getType() {
        return @$this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    public function getTypename() {
        return @$this->type->name;
    }

}
