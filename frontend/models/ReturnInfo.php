<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "return_info".
 *
 * @property integer $patient_id
 * @property string $treatment_effect
 * @property string $check_result
 *
 * @property PatientInfo $patient
 */
class ReturnInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'return_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['treatment_effect', 'check_result', 'patient_id'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'treatment_effect' => 'Treatment Effect',
            'check_result' => 'Check Result',
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
