<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnose_info".
 *
 * @property integer $patient_id
 * @property string $attack_type
 * @property string $type
 * @property string $status
 *
 * @property PatientInfo $patient
 */
class DiagnoseInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnose_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attack_type', 'type', 'status', 'patient_id'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'attack_type' => 'Attack Type',
            'type' => 'Type',
            'status' => 'Status',
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
