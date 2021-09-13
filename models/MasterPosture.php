<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_posture".
 *
 * @property int $id
 * @property string|null $posture_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterPosture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_posture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posture_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'posture_name' => 'Posture Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['posture_id' => 'id']);
    }
}
