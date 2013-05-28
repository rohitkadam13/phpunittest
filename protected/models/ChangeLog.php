<?php

/**
 * This is the model class for table "tbl_change_log".
 *
 * The followings are the available columns in table 'tbl_change_log':
 * @property string $id
 * @property string $date_of_request
 * @property string $request_criticality
 * @property string $request_type
 * @property string $reason 
 * @property string $dependency
 * @property string $optional  
 * @property string $accepted_by
 * @property string $system_type        
 * @property string $approximate_hours
 * @property string $srs_update 
 * @property string $created
 * @property string $modified
 */
class ChangeLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ChangeLog the static model class
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
		return 'tbl_change_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_of_request, request_criticality, request_type, reason, dependency, accepted_by, system_type, approximate_hours, srs_update', 'required'),
			array('request_criticality', 'length', 'max'=>5),
			array('request_type', 'length', 'max'=>29),
			array('reason, dependency, optional', 'length', 'max'=>1000),
			array('accepted_by', 'length', 'max'=>7),
			array('system_type', 'length', 'max'=>19),
			array('approximate_hours', 'length', 'max'=>30),
			array('modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_of_request, request_criticality, request_type, reason, dependency, optional, accepted_by, system_type, approximate_hours, srs_update, created, modified', 'safe', 'on'=>'search'),
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
			'date_of_request' => 'Date Of Request',   
			'request_criticality' => 'Request Criticality',
			'request_type' => 'Request Type',
			'reason' => 'Reason',
			'dependency' => 'Dependency',
			'optional' => 'Optional (For example db changes queries)',
			'accepted_by' => 'Accepted By',
			'system_type' => 'System Type',
			'approximate_hours' => 'Approximate Hours',
			'srs_update' => 'SRS Update',
			'created' => 'Created',
			'modified' => 'Modified', 
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
		$criteria->compare('date_of_request',$this->date_of_request,true);
		$criteria->compare('request_criticality',$this->request_criticality,true);
		$criteria->compare('request_type',$this->request_type,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('accepted_by',$this->accepted_by,true);
		$criteria->compare('system_type',$this->system_type,true);  
		$criteria->compare('approximate_hours',$this->approximate_hours,true);
		$criteria->compare('srs_update',$this->srs_update,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getList($type = null, $params = null)
	{
	   switch ($type) 
	   {  
        case 'HOURS':
          $arrHrs = array();
          for($i = 1; $i<=24; $i++)
          {
            $arrHrs[$i] = $i;
          }
          return $arrHrs; 
        break;
        
        case 'TOTAL-HOURS':
          $sql = 'SELECT SUM(approximate_hours) AS hrs  FROM tbl_change_log';
          $total_hours = Yii::app()->db->createCommand($sql)->queryRow();
          return $total_hours['hrs']; 
        break;             
     }
  }
  
  public static function getSearch($arr)
	{
      $arr[''] = "Please select"; 
      foreach ($arr AS $key => $val) {
         $arrRequestCriticality[$key] =  $val;
      }
      
      return $arr;
	}
   
}