<?php

class MJobseeker extends CI_Model {

   	public function register( $table, $array )
   	{
   		
   		$query = $this->db->insert( $table, $array );
   		
   		if( $query )
   		{
   			return true;
   		}
   		else
   		{
   			return false;
   		}
   		
   	}	
   	
   	function updateRecord( $table, $array, $where )
   	{
   	
   		foreach ( $where as $key => $value )
   		{
   				
   			$this->db->where($key, $value);
   				
   		}
   	
   	
   		$this->db->update($table, $array);
   	
   		return true;
   	
   	}
   	
   	function fetchSingleRow( $table, $columns, $where )
   	{
   		$this->db->select( $columns );
   		$this->db->from( $table );
   	
   	
   		if( $where != '' || $where != NULL ) :
   	
   		foreach ( $where as $key => $value )
   		{
   				
   			$this->db->where($key, $value);
   				
   		}
   	
   		endif;
   	
   		$query = $this->db->get();
   	
   		if( $query )
   		{
   			return $query;
   		}
   		else
   		{
   			return false;
   		}
   	}
   	function getJobTypes()
   	{
   		$q = " SELECT * FROM `job_type` ";
   		$results = $this->db->query($q);
   		return $results;
   	}
   	function getCategories()
   	{
   		$q = " SELECT * FROM `category` WHERE status = '1' ";
   		$results = $this->db->query($q);
   		return $results;
   	}
   	function getSubCategories()
   	{
   		$q = " SELECT * FROM `category` WHERE status = '1' AND pid != '0' ";
   		$results = $this->db->query($q);
   		return $results;
   	}
   	function getdegree()
   	{
   		$q = " SELECT * FROM `degree` ";
   		$results = $this->db->query($q);
   		return $results;
   	}
   	function deleteRecord($table,$where)
   	{
   		
   	
   		foreach ( $where as $key => $value )
   		{
   				
   			$this->db->where($key, $value);   			
   			$this->db->delete($table);
   				
   		}
   	
   		return true;
   	}
	
}