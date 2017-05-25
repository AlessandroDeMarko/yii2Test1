<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property integer $inn
 * @property integer $industry_id
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inn', 'industry_id'], 'integer'],
            [['name', 'inn', 'industry_id'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
/*
    public function relations()
    {
        return [
            'industry' => [self::BELONGS_TO, 'Industry', 'industry_id'],
            'report' => [self::HAS_MANY, 'Report', 'company_id'],
        ];
    }
*/
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'inn' => 'ИНН',
            'industry_id' => 'Отрасль',
            'industryName' => 'Отрасль'
        ];
    }

    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'industry_id']);
    }
     
    public function getReport()
    {
        return $this->hasMany(Report::className(), ['company_id' => 'id']);
    }

    public function getIndustryName()
    {
        $industry = $this->industry;
     
        return $industry ? $industry->name : '';
    }

}
