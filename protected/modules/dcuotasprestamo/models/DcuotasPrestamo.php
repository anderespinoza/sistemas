<?php

/**
 * This is the model class for table "dcuotas_prestamo".
 *
 * The followings are the available columns in table 'dcuotas_prestamo':
 * @property integer $idcuotaprestamo
 * @property integer $idsolicitanteprestamo
 * @property integer $numcuota
 * @property string $valorcuota
 * @property string $fecha_cuota
 * @property integer $estatus
 */
class DcuotasPrestamo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dcuotas_prestamo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsolicitanteprestamo, numcuota, valorcuota, fecha_cuota, estatus', 'required'),
			array('idsolicitanteprestamo, numcuota, estatus', 'numerical', 'integerOnly'=>true),
			array('valorcuota', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcuotaprestamo, idsolicitanteprestamo, numcuota, valorcuota, fecha_cuota, estatus', 'safe', 'on'=>'search'),
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
                    'estatus0' => array(self::BELONGS_TO, 'Nestatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcuotaprestamo' => 'Idcuotaprestamo',
			'idsolicitanteprestamo' => 'Idsolicitanteprestamo',
			'numcuota' => 'Número de Cuota',
			'valorcuota' => 'Monto de cuota',
			'fecha_cuota' => 'Fecha Pago Cuota',
			'estatus' => 'Estatus',
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
	public function search($idsolicitanteprestamo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idcuotaprestamo',$this->idcuotaprestamo);
		$criteria->compare('idsolicitanteprestamo',$this->idsolicitanteprestamo);
		$criteria->compare('numcuota',$this->numcuota);
		$criteria->compare('valorcuota',$this->valorcuota,true);
		$criteria->compare('fecha_cuota',$this->fecha_cuota,true);
		$criteria->compare('estatus',$this->estatus);
                $criteria->condition = "idsolicitanteprestamo = ".$idsolicitanteprestamo;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DcuotasPrestamo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
