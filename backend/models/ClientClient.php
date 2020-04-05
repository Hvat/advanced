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
            [['first_name', 'patronymic', 'last_name', 'age'], 'string', 'max' => 255],
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
        ];
    }
}
