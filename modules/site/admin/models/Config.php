<?php
/**
 * @copyright   (C) 2017 PHILIP Sylvain. All rights reserved.
 * @license     MIT; see LICENSE.md
 */

namespace app\modules\site\admin\models;

// use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Config extends Model
{

    public $site_title;
    public $meta_description;
    public $meta_keywords;
    public $contact_email;

    public function formName()
    {
        return 'site-config';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['site_title', 'contact_email'], 'required'],
            [['contact_email'], 'email'],
            [['meta_description', 'meta_keywords'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'site_title' => 'Site title',
            'meta_description' => 'Meta description',
            'meta_keywords' => 'Meta keywords',
            'contact_email' => 'Contact Email',
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeHints()
    {
        return [
            'contact_email' => 'Email for the contact form',

        ];
    }

}
