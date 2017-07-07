<?php

/**
 * This is the model class for table "dusuario".
 *
 * The followings are the available columns in table 'dusuario':
 * @property integer $idusuario
 * @property string $nombreusuario
 * @property string $clave
 * @property integer $idsolicitante
 * @property integer $idtipousuario
 * @property integer $idestatus
 *
 * The followings are the available model relations:
 * @property Nestatus $idestatus0
 * @property Dsolicitante $idsolicitante0
 * @property Ntiposuario $idtipousuario0
 */
class Dusuario extends CActiveRecord
{
    public $repeatclave;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dusuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreusuario, clave,repeatclave', 'required'),
			array('idsolicitante, idtipousuario, idestatus', 'numerical', 'integerOnly'=>true),
			array('nombreusuario', 'length', 'max'=>12),
			array('clave', 'length', 'max'=>20),                        
                        array('clave', 'compare', 'compareAttribute'=>'repeatclave', 'message'=>'El Campo Clave debe ser  igual <br> al Campo Confirmar Clave'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idusuario, nombreusuario, clave, idsolicitante, idtipousuario, idestatus', 'safe', 'on'=>'search'),
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
			'idestatus0' => array(self::BELONGS_TO, 'Nestatus', 'idestatus'),
			'idsolicitante0' => array(self::BELONGS_TO, 'Dsolicitante', 'idsolicitante'),
			'idtipousuario0' => array(self::BELONGS_TO, 'Ntiposuario', 'idtipousuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idusuario' => 'Idusuario',
			'nombreusuario' => 'Nombre de Usuario',
			'clave' => 'Clave',
                        'repeatclave' => 'Confirmar Clave',
			'idsolicitante' => 'Idsolicitante',
			'idtipousuario' => 'Idtipousuario',
			'idestatus' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idusuario',$this->idusuario);
		$criteria->compare('nombreusuario',$this->nombreusuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('idsolicitante',$this->idsolicitante);
		$criteria->compare('idtipousuario',$this->idtipousuario);
		$criteria->compare('idestatus',$this->idestatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dusuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
