<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $full_name;
    public $login;
    public $password;
    public $repeat_password;
    public $email;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['full_name', 'login', 'password', 'repeat_password', 'email', 'phone'], 'required'],
            [['full_name', 'login', 'password', 'repeat_password', 'email', 'phone'], 'string', 'max' => '255'],

            ['full_name', 'match', 'pattern' => '/^[а-яё\s-]+$/iu', 'message' => 'только кириллические буквы, дефис и пробелы'],

            ['login', 'unique', 'targetClass' => User::class],
            ['login', 'match', 'pattern' => '/^[a-z-]+$/i', 'message' => 'только латиница и дефис, уникальный в системе'],

            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}\-[\d]{2}\-[\d]{2}$/', 'message' => 'в формате +7(XXX)-XXX-XX-XX'],

            ['password', 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[$#&%^])[A-Za-z$#&%^]+$/', 'message' => 'минимум 6 символов, минимум 1 большая буква и 1 специальный символ ($, #, &, %, ^), латиница'],
            ['repeat_password', 'compare', 'compareAttribute' => 'password'],

            // email has to be a valid email address
            ['email', 'unique', 'targetClass' => User::class],
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'full_name' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'repeat_password' => 'Повтор пароля',
            'email' => 'Адресс электроннной почты',
            'phone' => 'Номер телефона',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function register(): User | false
    {
        if ($this->validate()) {
            $user = new User();
            $user->load($this->attributes, '');
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->save();
        }
        return $user ?? false;
    }
}
