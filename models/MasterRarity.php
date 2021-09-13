<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_rarity".
 *
 * @property int $id
 * @property string|null $rarity_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterRarity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_rarity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rarity_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rarity_name' => 'Rarity Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['rarity_id' => 'id']);
    }
}
