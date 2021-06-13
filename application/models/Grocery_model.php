 <?php
 class Grocery_model extends grocery_CRUD_Model  {

    function join_relation($field_name , $related_table , $related_field_title)
    {
		$related_primary_key = $this->get_primary_key($related_table);

		if($related_primary_key !== false)
		{
			$unique_name = $this->_unique_join_name($field_name);
			$this->db->join( $related_table.' as '.$unique_name , "{$this->table_name}.$related_primary_key = $unique_name.$field_name",'left');

			$this->relation[$field_name] = array($field_name , $related_table , $related_field_title);

			return true;
		}

    	return false;
    }
}