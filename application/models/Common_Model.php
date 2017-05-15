<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();	
	}
	
	/**********  count total rows  **********/
	public function countRows($tblname,$primaryfield,$id)
	{
		 $this->db->select('*');
		 $this->db->from($tblname);
		 if($where!='')
		 	$this->db->where($primaryfield,$id);
		 $result = $this->db->get();
		 return $result->num_rows();
	}//end of function
	 
	/*** select all data from a table with pagination  ***/
	public function getAll($tblname,$limit,$page,$primaryfield,$id)
	{
		 $this->db->select('*');
		 $this->db->from($tblname);
		 if($where!='')
		 	$this->db->where($primaryfield,$id);
		 $this->db->limit($limit,$page);
		
		 //$this->db->order_by('created_at','DESC');
		 //$this->db->group_by('temp_companycategories.CompanyID');
		 $result = $this->db->get();
		 return $result;
	}//end of function


	/** select single row from a table  **/
	public function getRow($table,$primaryfield,$id)
    {
        $this->db->where($primaryfield,$id);
        $result = $this->db->get($table);
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
        return false;
    }
	 
	/***** select single value from a row  *******/
	public function getValue($table,$primaryfield,$fieldname,$id)
    {
        $this->db->select($fieldname);
        $this->db->where($primaryfield,$id);
        $result = $this->db->get($table);
        if($result->num_rows() > 0)
        {
            return $result->result();
        }
        return array();
    }
	 
	/****** insert values in table ******/
	public function insert($tblname,$data)
	{
		$this->db->insert($tblname,$data);
		return $this->db->insert_id();
	}//end of function
	 
	/***** Update a row from a table ********/
	public function update($table,$data,$primaryfield,$id)
    {
        $this->db->where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        return $q;
    }
	
	/*** Delete a row from a table ******/
	public function delete($table,$primaryfield,$id)
    {
    	$this->db->where($primaryfield,$id);
    	$this->db->delete($table);
    }
	// Check whether a value has duplicates in the database
    public function has_duplicate($value, $tabletocheck, $fieldtocheck)
    {
        $this->db->select($fieldtocheck);
        $this->db->where($fieldtocheck,$value);
        $result = $this->db->get($tabletocheck);
 
        if($result->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
	/******* Get latest version row data from a table *******/
	public function getLatestVersion($tblname,$primaryfield,$id, $orderby)
	 { 
		$this->db->select('*');
		$this->db->from($tblname);
		if($where!='')
			$this->db->where($primaryfield,$id);
		$this->db->order_by($orderby, 'DESC');
		$result = $this->db->get();
		return $result->row();
	 }//end of function
	
	 
	/*** Get usermeta value from usermeta table ***/
	public function getUsermeta($userId, $metaKey)
	{ 
		$this->db->select('meta_value');
		$this->db->from('sj_user_meta');
		$this->db->where('meta_key', $metaKey);
		$this->db->where('user_id', $userId);
		$result = $this->db->get();
		return $result->row();
	}//end of function
	
	/****** insert metaValue in table ******/
	public function insertUsermeta($metaKey, $metaValue, $userId)
	{
		$data = array(
			'meta_key'  => $metaKey,
			'meta_value'  => $metaValue
		);
		$this->db->insert('sj_user_meta',$data);
		$this->db->where('user_id', $userId);
		return $this->db->insert_id();
	}//end of function
	
	/****** update metaValue in table ******/
	public function updateUsermeta($metaKey, $metaValue, $userId)
	{
		$data = array(
			'meta_value'  => $metaValue
		);
		$this->db->update('sj_user_meta',$data);
		$this->db->where('meta_key', $metaKey);
		$this->db->where('user_id', $userId);
		return true;
	}//end of function
	
	/*** Get all message from table for with pagination ***/
	public function getAllMessages($tblname,$primaryfield,$id,$limit,$page)
	{
		 $this->db->select('*');
		 $this->db->from($tblname);
		 $this->db->where($primaryfield,$id);
		 $this->db->limit($limit,$page);
		 //$this->db->order_by('created_at','DESC');
		 $result = $this->db->get();
		 return $result;
	
	}//end of function
	
	/*** Get letest message from table for user id ***/
	public function getLatestMessages($userId, $tblname)
	{ 
		$this->db->select('*');
		$this->db->from($tblname);
		$this->db->where('to_id', $userId);
		$this->db->order_by('date_sent', 'DESC');
		$result = $this->db->get();
		return $result->row();
	}//end of function
	
	/*** Get unread message from table for user id ***/
	public function getUnreadMessages($userId, $tblname)
	{ 
		$this->db->select('*');
		$this->db->from($tblname);
		$this->db->where('to_id', $userId);
		$this->db->where('is_read', 0);
		$this->db->order_by('date_sent', 'DESC');
		$result = $this->db->get();
		return $result->row();
	}//end of function
	 
	/*** Get sent message from table for user id ***/
	public function getSentMessages($userId, $tblname)
	{ 
		$this->db->select('*');
		$this->db->from($tblname);
		$this->db->where('from_id', $userId);
		$this->db->order_by('date_sent', 'DESC');
		$result = $this->db->get();
		return $result->row();
	}//end of function
	 
	/*** Get message from table for and from user ***/
	public function getMessagesByUsers($userTo,$useFrom,$tblname)
	{ 
		$this->db->select('*');
		$this->db->from($tblname);
		$this->db->where('from_id', $useFrom);
		$this->db->where('to_id', $userTo);
		$this->db->order_by('date_sent', 'DESC');
		$result = $this->db->get();
		return $result->row();
	}//end of function
	 
	 
	  
	/*** Get setting meta value from settings table ***/
	public function getSettingMeta($metaKey)
	{ 
		$this->db->select('meta_value');
		$this->db->from('sj_settings');
		$this->db->where('meta_key', $metaKey);
		//$this->db->where('id', $Id);
		$result = $this->db->get();
		return $result->row();
	}//end of function
	
	/****** insert settings Value in table ******/
	public function insertSettingsMeta($metaKey, $metaValue)
	{
		$currentDate = date('Y-m-d');
		$data = array(
			'meta_key'  => $metaKey,
			'meta_value'  => $metaValue,
			'date_added'  => $currentDate
		);
		$this->db->insert('sj_settings',$data);
		return $this->db->insert_id();
	}//end of function
	
	/****** update metaValue in table ******/
	public function updateSettingMeta($metaKey, $metaValue)
	{
		$data = array(
			'meta_value'  => $metaValue
		);
		$this->db->update('sj_settings', $data);
		$this->db->where('meta_key', $metaKey);
		return true;
	}//end of function
	
}

/* End of file */