<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient_info".
 *
 * @property integer $id
 * @property string $create_at
 * @property string $fullname
 * @property string $sex
 * @property string $birthday
 * @property string $education
 * @property string $profession
 * @property string $marriage
 * @property integer $relatives_count
 * @property string $address
 * @property string $tel
 * @property string $contact_name
 *
 * @property DiagnoseInfo[] $diagnoseInfos
 * @property DiagnoseProcess[] $diagnoseProcesses
 * @property MedicalHistory[] $medicalHistories
 * @property ReturnInfo[] $returnInfos
 */
class PatientInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['relatives_count', 'age'], 'integer'],
            [['create_at'], 'safe'],
            [['fullname'], 'string', 'max' => 255],
            [['sex', 'education'], 'string', 'max' => 8],
            [['profession','id'], 'string', 'max' => 32],
            [['marriage'], 'string', 'max' => 2],
            [['address'], 'string', 'max' => 64],
            [['tel'], 'string', 'max' => 15],
            [['contact'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Create At',
            'fullname' => 'Fullname',
            'sex' => 'Sex',
            'age' => 'Age',
            'education' => 'Education',
            'profession' => 'Profession',
            'marriage' => 'Marriage',
            'relatives_count' => 'Relatives Count',
            'address' => 'Address',
            'tel' => 'Tel',
            'contact' => 'Contact',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnoseInfos()
    {
        return $this->hasMany(DiagnoseInfo::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnoseProcesses()
    {
        return $this->hasMany(DiagnoseProcess::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicals()
    {
        return $this->hasMany(Medical::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnInfos()
    {
        return $this->hasMany(ReturnInfo::className(), ['patient_id' => 'id']);
    }
}
