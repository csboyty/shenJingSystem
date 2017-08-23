<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnose_process".
 *
 * @property integer $patient_id
 * @property string $check_result
 * @property string $treatment_options
 *
 * @property PatientInfo $patient
 */
class DiagnoseProcess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnose_process';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['check_result', 'treatment_options'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'check_result' => 'Check Result',
            'treatment_options' => 'Treatment Options',
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
