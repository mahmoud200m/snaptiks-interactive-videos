<?php

/**
 * This is the model class for table "forms".
 *
 * The followings are the available columns in table 'forms':
 * @property string $id
 * @property string $background_img
 * @property string $title1
 * @property string $title2
 * @property string $button1_lbl
 * @property string $button1_img
 * @property string $title3
 * @property string $button2_lbl
 * @property string $button2_img
 * @property string $video
 * @property string $post_text
 * @property string $post_image
 */
class Forms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Forms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'forms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('background_img, title1, title2, button1_lbl, button1_img, title3, button2_lbl, button2_img, video, post_text, post_image', 'required'),
			array('background_img, title1, title2, button1_lbl, title3, button2_lbl, video, post_text, post_image', 'length', 'max'=>512),
			array('button1_img, button2_img', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, background_img, title1, title2, button1_lbl, button1_img, title3, button2_lbl, button2_img, video, post_text, post_image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'background_img' => 'Background Img',
			'title1' => 'Title1',
			'title2' => 'Title2',
			'button1_lbl' => 'Button1 Lbl',
			'button1_img' => 'Button1 Img',
			'title3' => 'Title3',
			'button2_lbl' => 'Button2 Lbl',
			'button2_img' => 'Button2 Img',
			'video' => 'Video',
			'post_text' => 'Post Text',
			'post_image' => 'Post Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('background_img',$this->background_img,true);
		$criteria->compare('title1',$this->title1,true);
		$criteria->compare('title2',$this->title2,true);
		$criteria->compare('button1_lbl',$this->button1_lbl,true);
		$criteria->compare('button1_img',$this->button1_img,true);
		$criteria->compare('title3',$this->title3,true);
		$criteria->compare('button2_lbl',$this->button2_lbl,true);
		$criteria->compare('button2_img',$this->button2_img,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('post_text',$this->post_text,true);
		$criteria->compare('post_image',$this->post_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}