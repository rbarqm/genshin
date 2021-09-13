<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_character".
 *
 * @property int $id
 * @property string|null $character_name
 * @property int|null $gender_id
 * @property int|null $vision_id
 * @property int|null $weapon_id
 * @property int|null $region_id
 * @property int|null $rarity_id
 * @property int|null $role_id
 * @property int|null $posture_id
 *
 * @property MasterGender $gender
 * @property MasterPosture $posture
 * @property MasterRarity $rarity
 * @property MasterRegion $region
 * @property MasterRole $role
 * @property MasterVision $vision
 * @property MasterWeapon $weapon
 */
class MainCharacter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_character';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id', 'vision_id', 'weapon_id', 'region_id', 'rarity_id', 'role_id', 'posture_id'], 'integer'],
            [['character_name'], 'string', 'max' => 50],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterGender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['posture_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPosture::className(), 'targetAttribute' => ['posture_id' => 'id']],
            [['rarity_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterRarity::className(), 'targetAttribute' => ['rarity_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterRegion::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterRole::className(), 'targetAttribute' => ['role_id' => 'id']],
            [['vision_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterVision::className(), 'targetAttribute' => ['vision_id' => 'id']],
            [['weapon_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterWeapon::className(), 'targetAttribute' => ['weapon_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'character_name' => 'Character Name',
            'gender_id' => 'Gender ID',
            'vision_id' => 'Vision ID',
            'weapon_id' => 'Weapon ID',
            'region_id' => 'Region ID',
            'rarity_id' => 'Rarity ID',
            'role_id' => 'Role ID',
            'posture_id' => 'Posture ID',
        ];
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(MasterGender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Posture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosture()
    {
        return $this->hasOne(MasterPosture::className(), ['id' => 'posture_id']);
    }

    /**
     * Gets query for [[Rarity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRarity()
    {
        return $this->hasOne(MasterRarity::className(), ['id' => 'rarity_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(MasterRegion::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(MasterRole::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[Vision]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVision()
    {
        return $this->hasOne(MasterVision::className(), ['id' => 'vision_id']);
    }

    /**
     * Gets query for [[Weapon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWeapon()
    {
        return $this->hasOne(MasterWeapon::className(), ['id' => 'weapon_id']);
    }
}
