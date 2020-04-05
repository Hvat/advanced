<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client_client".
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $patronymic
 * @property string $last_name
 * @property string|null $age
 */
class ClientClient extends \yii\db\ActiveRecord
{
    public $phone_digital;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'patronymic', 'last_name', 'age', 'phone_digital'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'patronymic' => 'Patronymic',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'phone_digital' => 'Phone Digital',
        ];
    }

    /**
     * Gets query for [[ClientPhone]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientPhone()
    {
        return $this->hasOne(ClientPhone::className(), ['client_id' => 'id']);
    }
}
