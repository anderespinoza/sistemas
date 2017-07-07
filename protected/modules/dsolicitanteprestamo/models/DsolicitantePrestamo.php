<?php
Yii::import('application.extensions.highcharts.highcharts.HighchartsWidget');
/**
 * This is the model class for table "dsolicitante_prestamo".
 *
 * The followings are the available columns in table 'dsolicitante_prestamo':
 * @property integer $idsolicitanteprestamo
 * @property integer $idsolicitante
 * @property string $fechaautorizacion
 * @property string $fechaentregaprestamo
 * @property integer $valorprestamo
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Dsolicitante $idsolicitante0
 */
class DsolicitantePrestamo extends CActiveRecord
{
    public $cuota;
    public $mes;
    public $year;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dsolicitante_prestamo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('valorprestamo', 'required'),
                        array('mes,year','required', 'on'=> 'reporte' ),
			array('idsolicitante, valorprestamo, estatus', 'numerical', 'integerOnly'=>true),
			array('fechaautorizacion, fechaentregaprestamo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsolicitanteprestamo, idsolicitante,fecharegistro, fechaautorizacion, fechaentregaprestamo, valorprestamo, estatus', 'safe', 'on'=>'search'),
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
			'idsolicitante0' => array(self::BELONGS_TO, 'Dsolicitante', 'idsolicitante'),
                        'estatus0' => array(self::BELONGS_TO, 'Nestatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsolicitanteprestamo' => 'Nro de Prestamo',
			'idsolicitante' => 'Idsolicitante',
                        'fecharegistro' => 'Fecha de Registro',
			'fechaautorizacion' => 'Fecha Autorización',
			'fechaentregaprestamo' => 'Fecha Entrega',
			'valorprestamo' => 'Monto del Prestamo',
			'estatus' => 'Estatus',
                        'mes' => 'Mes',
                        'year' => 'Año',
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

		$criteria->compare('idsolicitanteprestamo',$this->idsolicitanteprestamo);
		$criteria->compare('idsolicitante',$this->idsolicitante);
                $criteria->compare('fecharegistro',$this->fecharegistro,true);
		$criteria->compare('fechaautorizacion',$this->fechaautorizacion,true);
		$criteria->compare('fechaentregaprestamo',$this->fechaentregaprestamo,true);
		$criteria->compare('valorprestamo',$this->valorprestamo);
		$criteria->compare('estatus',$this->estatus);
//             

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function searchdos()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                $usuario =  Yii::app()->user->getState('usuario');
		$criteria=new CDbCriteria;

		$criteria->compare('t.idsolicitanteprestamo',$this->idsolicitanteprestamo);
		$criteria->compare('t.idsolicitante',$this->idsolicitante);
                $criteria->compare('t.fecharegistro',$this->fecharegistro,true);
		$criteria->compare('t.fechaautorizacion',$this->fechaautorizacion,true);
		$criteria->compare('t.fechaentregaprestamo',$this->fechaentregaprestamo,true);
		$criteria->compare('t.valorprestamo',$this->valorprestamo);
		$criteria->compare('t.estatus',$this->estatus);
                $criteria->condition = "idsolicitante = ".$usuario->idsolicitante;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DsolicitantePrestamo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
