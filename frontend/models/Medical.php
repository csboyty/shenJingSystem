<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "medical_history".
 *
 * @property integer $patient_id
 * @property string $attack_info
 * @property string $medical_info
 * @property string $examine_info
 *
 * @property PatientInfo $patient
 */
class Medical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['performance_info', 'history_info', 'examine_info', 'patient_id'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'performance_info' => 'Performance Info',
            'history_info' => 'History Info',
            'examine_info' => 'Examine Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(PatientInfo::className(), ['id' => 'patient_id']);
    }
}
