<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $user_id
 * @property int $programm_id
 * @property string $date
 * @property int $pay_type_id
 * @property int $status_id
 * @property string $created_at
 *
 * @property Feedback $feedback
 * @property Image $image
 * @property PayType $payType
 * @property Programm $programm
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'programm_id', 'date', 'pay_type_id', 'status_id'], 'required'],
            [['user_id', 'programm_id', 'pay_type_id', 'status_id'], 'integer'],
            [['date', 'created_at'], 'safe'],
            [['pay_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::class, 'targetAttribute' => ['pay_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programm::class, 'targetAttribute' => ['programm_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],

            ['date', 'dateValid'],
        ];
    }

    public function dateValid()
    {
        if (strtotime($this->date) < strtotime(date('Y-m-d'))) {
            return $this->addError('date', 'Дата не может быть раньше текущей');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'user_id' => 'ФИО',
            'programm_id' => 'Наименование курса или вибинара',
            'date' => 'Желаемая дата начала участия',
            'pay_type_id' => 'Способ оплаты',
            'status_id' => 'Статус заявки',
            'created_at' => 'Время создания заявки',
        ];
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[PayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayType()
    {
        return $this->hasOne(PayType::class, ['id' => 'pay_type_id']);
    }

    /**
     * Gets query for [[Programm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramm()
    {
        return $this->hasOne(Programm::class, ['id' => 'programm_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
