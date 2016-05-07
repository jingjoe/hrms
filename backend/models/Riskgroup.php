<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "riskgroup".
 *
 * @property integer $id
 * @property string $name
 */
class Riskgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riskgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'กลุ่มความเสี่ยง',
        ];
    }
}
