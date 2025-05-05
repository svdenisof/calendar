<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "APP_CALENDAR".
 *
 * @property int $ID
 * @property string $NAME
 * @property string|null $PLACE
 * @property string|null $CATEGORY
 * @property string $START_AT
 * @property string $END_AT
 * @property string|null $REPEAT
 * @property int|null $NOTICE
 * @property int|null $ALL_DAY
 * @property string|null $DESCRIPTION
 */
class Calendar extends ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'APP_CALENDAR';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['PLACE', 'CATEGORY', 'REPEAT', 'NOTICE', 'ALL_DAY', 'DESCRIPTION'], 'default', 'value' => null],
            [['NAME', 'START_AT', 'END_AT'], 'required'],
            [['NOTICE', 'ALL_DAY'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['NAME', 'PLACE', 'CATEGORY', 'START_AT', 'END_AT', 'REPEAT'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Name',
            'PLACE' => 'Place',
            'CATEGORY' => 'Category',
            'START_AT' => 'Start At',
            'END_AT' => 'End At',
            'REPEAT' => 'Repeat',
            'NOTICE' => 'Notice',
            'ALL_DAY' => 'All Day',
            'DESCRIPTION' => 'Description',
        ];
    }

}
