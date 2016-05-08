<?php

namespace backend\models;

use Yii;
use backend\models\Type;
use backend\models\Riskgroup;
use backend\models\Level;
use backend\models\Program;
use backend\models\Team;

/**
 * This is the model class for table "riskstore".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 * @property integer $program_id
 * @property integer $level_id
 * @property integer $group_id
 */
class Riskstore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riskstore';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type_id', 'program_id', 'level_id', 'group_id','team_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อความเสี่ยง',
            'type_id' => 'ประเภทความเสี่ยง',
            'program_id' => 'โปรแกรมความเสี่ยง',
            'level_id' => 'ระดับความรุนแรง',
            'group_id' => 'กลุ่มความเสี่ยง',
            'team_id' => 'ทีมนำ',
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation  
            'typename' => 'ประเภทความเสี่ยง',
            'groupname' => 'กลุ่มความเสี่ยง',
            'programname' => 'โปรแกรมความเสี่ยง',
            'levelname' => 'ระดับความรุนแรง',
            'teamname' => 'ทีมนำ',
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
// get โปรแกรมความเสี่ยง
        public function getProgram() {
        return @$this->hasOne(Program::className(), ['id' => 'program_id']);
    }

    public function getProgramname() {
        return @$this->program->name;
    }
// get ระดับความเสี่ยง
        public function getLevel() {
        return @$this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    public function getLevelname() {
        return @$this->level->level_name;
    }
// get ชื่อทีมนำ
        public function getTeam() {
        return @$this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    public function getTeamname() {
        return @$this->team->name;
    }
}
