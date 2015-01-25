<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property integer $IDroute
 * @property integer $IDstationFrom
 * @property integer $IDstationTo
 * @property integer $active
 *
 * @property Station $iDstationFrom
 * @property Station $iDstationTo
 * @property Ticket[] $tickets
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDstationFrom', 'IDstationTo', 'active'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDroute' => Yii::t('app', 'Idroute'),
            'IDstationFrom' => Yii::t('app', 'Idstation From'),
            'IDstationTo' => Yii::t('app', 'Idstation To'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDstationFrom()
    {
        return $this->hasOne(Station::className(), ['IDstation' => 'IDstationFrom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDstationTo()
    {
        return $this->hasOne(Station::className(), ['IDstation' => 'IDstationTo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['IDroute' => 'IDroute']);
    }
}
