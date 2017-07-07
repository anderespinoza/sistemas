<?php

/**
 * This is the model class for table "dsolicitante".
 *
 * The followings are the available columns in table 'dsolicitante':
 * @property integer $idsolicitante
 * @property string $letra
 * @property integer $cedula
 * @property string $primernombre
 * @property string $primerapellido
 * @property integer $telefono
 * @property integer $celular
 *
 * The followings are the available model relations:
 * @property DsolicitantePrestamo[] $dsolicitantePrestamos
 * @property Dusuario[] $dusuarios
 */
class Dsolicitante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dsolicitante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('letra, cedula, primernombre, primerapellido,correo, telefono, celular', 'required'),
			array('cedula, telefono, celular', 'numerical', 'integerOnly'=>true),
			array('letra', 'length', 'max'=>1),
			array('primernombre, primerapellido', 'length', 'max'=>15),
                        array('correo', 'length', 'max'=>30),
                        array('correo', 'email', 'message'=>'El Correo no tiene un formato Valido'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsolicitante, letra, cedula, primernombre, primerapellido,correo telefono, celular', 'safe', 'on'=>'search'),
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
			'dsolicitantePrestamos' => array(self::HAS_MANY, 'DsolicitantePrestamo', 'idsolicitante'),
			'dusuarios' => array(self::HAS_MANY, 'Dusuario', 'idsolicitante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsolicitante' => 'Idsolicitante',
			'letra' => 'Letra',
			'cedula' => 'Cedula',
			'primernombre' => 'Primer Nombre',
			'primerapellido' => 'Primer Apellido',
                        'correo'=>'Correo Electrónico',
			'telefono' => 'Teléfono Local',
			'celular' => 'Celular',
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

		$criteria->compare('idsolicitante',$this->idsolicitante);
		$criteria->compare('letra',$this->letra,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('primernombre',$this->primernombre,true);
		$criteria->compare('primerapellido',$this->primerapellido,true);
                $criteria->compare('correo',$this->primerapellido,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('celular',$this->celular);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dsolicitante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
