<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient_info".
 *
 * @property string $id
 * @property string $no
 * @property string $create_at
 * @property string $fullname
 * @property string $sex
 * @property integer $age
 * @property string $education
 * @property string $profession
 * @property string $marriage
 * @property integer $relatives_count
 * @property string $address
 * @property string $tel
 * @property string $contact
 *
 * @property DiagnoseInfo $diagnoseInfo
 * @property DiagnoseProcess $diagnoseProcess
 * @property Medical $medical
 * @property ReturnInfo $returnInfo
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
            [['create_at'], 'safe'],
            [['age', 'relatives_count'], 'integer'],
            [['id', 'no', 'profession', 'contact'], 'string', 'max' => 32],
            [['fullname'], 'string', 'max' => 255],
            [['sex', 'education'], 'string', 'max' => 8],
            [['marriage'], 'string', 'max' => 2],
            [['address'], 'string', 'max' => 64],
            [['tel'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => 'No',
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
    public function getDiagnoseInfo()
    {
        return $this->hasOne(DiagnoseInfo::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnoseProcess()
    {
        return $this->hasOne(DiagnoseProcess::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedical()
    {
        return $this->hasOne(Medical::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnInfo()
    {
        return $this->hasOne(ReturnInfo::className(), ['patient_id' => 'id']);
    }
}
