<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client_phone".
 *
 * @property int $id
 * @property int $client_id
 * @property string $phone_digital
 */
class ClientPhone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_phone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'phone_digital'], 'required'],
            [['client_id'], 'integer'],
            [['phone_digital'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'phone_digital' => 'Phone Digital',
        ];
    }
}
