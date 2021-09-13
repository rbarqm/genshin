<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_weapon".
 *
 * @property int $id
 * @property string|null $weapon_type
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterWeapon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_weapon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weapon_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weapon_type' => 'Weapon Type',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['weapon_id' => 'id']);
    }
}
