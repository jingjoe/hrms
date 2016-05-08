<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\User;

//use backend\models
use backend\models\Department;
use backend\models\DepartmentGroup;
use backend\models\Level;
use backend\models\Location;
use backend\models\Program;
use backend\models\Riskgroup;
use backend\models\Riskstore;
use backend\models\Status;
use backend\models\Team;
use backend\models\Type;

/**
 * This is the model class for table "risk".
 *
 * @property integer $id
 * @property string $date_report
 * @property string $time_report
 * @property string $period
 * @property string $depart_group_id
 * @property string $depart_id
 * @property integer $riskstore_id
 * @property string $more_detail
 * @property integer $location_id
 * @property string $risklevel_id
 * @property integer $type_id
 * @property integer $group_id
 * @property string $level_warning
 * @property string $act
 * @property string $problem_basic
 * @property string $image
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $create_date
 * @property string $modify_date
 */
class Risk extends \yii\db\ActiveRecord
{
    const DOC_PATH  = 'riskimage';
    public $foler_upload ='riskimage';
    
    public static function tableName()
    {
        return 'risk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_report', 'time_report', 'depart_group_id', 'depart_id', 'riskstore_id', 'location_id', 'risklevel_id', 'type_id', 'group_id'], 'required'],
            [['date_report', 'time_report', 'create_date', 'modify_date'], 'safe'],
            [['period', 'more_detail', 'act', 'problem_basic'], 'string'],
            [['riskstore_id', 'location_id', 'type_id', 'group_id', 'created_by', 'updated_by'], 'integer'],
            [['depart_group_id', 'depart_id', 'risklevel_id'], 'string', 'max' => 2],
            [['level_warning'], 'string', 'max' => 150],
            [['image'], 'file',
              'skipOnEmpty' => true,
              'maxFiles' => 3,
              'extensions' => 'png,jpg,gif'
            ],
        ];
    }

    public function behaviors(){
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_report' => 'วันรายงาน',
            'time_report' => 'เวลารายงาน',
            'period' => 'เวร',
            'depart_group_id' => 'ฝ่าย',
            'depart_id' => 'แผนก',
            'riskstore_id' => 'ชื่อความเสี่ยง',
            'more_detail' => 'รายละเอียด',
            'location_id' => 'สถานที่พบเหตุ',
            'risklevel_id' => 'ระดับความรุนแรง',
            'type_id' => 'ประเภทความเสี่ยง',
            'group_id' => 'กลุ่มความเสี่ยง',
            'level_warning' => 'ระดับการเตือน',
            'act' => 'เชิงรับ-เชิงรุก',
            'problem_basic' => 'การแก้ปัญหาเบื้องต้น',
            'image' => 'ภาพประกอบ',
            'created_by' => 'ผู้รายงาน',
            'updated_by' => 'อับเดทโดย',
            'create_date' => 'วันบันทึก',
            'modify_date' => 'วันปรับปรุง',
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation
            'departname' => 'แผนก',
            'departgroupname' => 'ฝ่าย',
            'typename' => 'ประเภทความเสี่ยง',
            'groupname' => 'กลุ่มความเสี่ยง',
            'programname' => 'โปรแกรมความเสี่ยง',
            'levelname' => 'ระดับ',
            'teamname' => 'ทีมนำ',
            'locationname' => 'สถานที่พบเหตุ',
            'storename' => 'ชื่อความเสี่ยง',
            'loginname' => 'รายงานโดย',
            'updatename' => 'อับเดทโดย',
            
        ];
    }
// get แผนก
    public function getDepart() {
        return @$this->hasOne(Department::className(), ['depart_id' => 'depart_id']);
    }
    public function getDepartname() {
        return @$this->depart->depart_name;
    }
    
// get ฝ่าย
    public function getDepartgroup() {
        return @$this->hasOne(DepartmentGroup::className(), ['depart_group_id' => 'depart_group_id']);
    }
    public function getDepartgroupname() {
        return @$this->departgroup->depart_group_name;
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
        return @$this->hasOne(Level::className(), ['id' => 'risklevel_id']);
    }
    public function getLevelname() {
        return @$this->level->level_id;
    }
    
// get ชื่อทีมนำ
        public function getTeam() {
        return @$this->hasOne(Team::className(), ['id' => 'team_id']);
    }
    public function getTeamname() {
        return @$this->team->name;
    }
    
 // get ชื่อสถานที่
        public function getLocation() {
        return @$this->hasOne(Location::className(), ['id' => 'location_id']);
    }
    public function getLocationname() {
        return @$this->location->name;
    } 
    
  // get ชื่อความเสี่ยงจากระบบ
        public function getRiskstore() {
        return @$this->hasOne(Riskstore::className(), ['id' => 'riskstore_id']);
    }
    public function getStorename() {
        return @$this->riskstore->name;
    }    
    
    
// funtion Part Upload file

    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.$this->foler_upload.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->foler_upload.'/';
    }

    public function getPhotoViewer(){
      return empty($this->files) ? Yii::getAlias('@web').'/images/none.png' : $this->getUploadUrl().$this->files;
    }

// funtion Multiple Upload file
    public function uploadMultiple($model,$attribute)
    {
      $image  = UploadedFile::getInstances($model, $attribute);
      $path = $this->getUploadPath();
      if ($this->validate() && $image !== null) {
          $filenames = [];
          foreach ($image as $file) {
                  $filename = md5($file->baseName.time()) . '.' . $file->extension;
                  if($file->saveAs($path . $filename)){
                    $filenames[] = $filename;
                  }
          }
          if($model->isNewRecord){
            return implode(',', $filenames);
          }else{
            return implode(',',(ArrayHelper::merge($filenames,$model->getOwnPhotosToArray())));
          }
      }

      return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getPhotosViewer(){
      $image = $this->image ? @explode(',',$this->image) : [];
      $img = '';
      foreach ($image as  $image) {
        $img.= ' '.Html::img($this->getUploadUrl().$image,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
      }
      return $img;
    }

    public function getOwnPhotosToArray()
    {
      return $this->getOldAttribute('image') ? @explode(',',$this->getOldAttribute('image')) : [];
    }
 // funtion File Part ในการdownload
        public static function getFilesPath(){
        return Yii::getAlias('@webroot').'/'.self::DOC_PATH;
    }

    public static function getFilesUrl(){
        return Url::base(true).'/'.self::DOC_PATH;
    }
}
