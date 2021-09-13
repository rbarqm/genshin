<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_gender".
 *
 * @property int $id
 * @property string|null $gender_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterGender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_name' => 'Gender Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['gender_id' => 'id']);
    }
}
