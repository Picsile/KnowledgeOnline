<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $application_id
 * @property string $path
 *
 * @property Application $application
 */
class Image extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'path'], 'required'],
            [['application_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['application_id'], 'unique'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::class, 'targetAttribute' => ['application_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'Application ID',
            'path' => 'Path',
        ];
    }

    /**
     * Gets query for [[Application]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::class, ['id' => 'application_id']);
    }

}
