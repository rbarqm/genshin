<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_vision".
 *
 * @property int $id
 * @property string|null $vision_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterVision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_vision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vision_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vision_name' => 'Vision Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['vision_id' => 'id']);
    }
}
