<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient_info".
 *
 * @property integer $id
 * @property string $no
 * @property string $patient_no
 * @property string $dna_no
 * @property string $ad
 * @property string $other_no
 * @property string $create_at
 * @property string $fullname
 * @property string $sex
 * @property integer $age
 * @property string $birthday
 * @property string $education
 * @property string $profession
 * @property string $marriage
 * @property integer $relatives_count
 * @property string $address
 * @property string $tel
 * @property string $contact
 * @property string $qq
 * @property string $weixin
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
            [['create_at','birthday'], 'safe'],
            [['age', 'relatives_count'], 'integer'],
            [['no', 'profession', 'contact', "ad","patient_no","dna_no","other_no"], 'string', 'max' => 32],
            [['qq', 'weixin'], 'string', 'max' => 12],
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
            'ad' => 'ad',
            'dna_no' => 'DNA NO',
            'patient_no' => 'Patient No',
            'other_no' => 'Other No',
            'qq' => 'QQ',
            'weixin' => 'Wei Xin',
            'create_at' => 'Create At',
            'birthday' => 'Birthday',
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
