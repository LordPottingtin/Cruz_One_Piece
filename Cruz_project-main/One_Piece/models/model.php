<?php
//these examples are pulled from https://www.studentstutorial.com/
//example of different functions one might use in a model file
//these examples would be used with either _GET or _POST depending on
//how the user wants it set up. I would probably recommend _POST for sercurity
include_once 'database_connection.php';

//the current applicaiton's data is based off of teh CSV file being read in
//via the JS within home.html
class Index_Model
{   
    //get everything from the DB to show
    //this would be called by the controller to give to the view
	public function getAllrecords()
	{
		return $this->conn->select("SELECT * FROM `database` ORDER BY id DESC");
	}
    //if we had need to insert new data inton our DB, our controller
    //would call this function sand insert a new set of data via an array
	public function submit_index($data)
	{
		$this->conn->insert('database', $data);
	}
    //get a singluar record based on given ID supplied by user interaction on a form
    public function getOnerecord($id)
	{
		return $this->conn->select("SELECT * FROM `database` WHERE id='".$id."' LIMIT 1");
	}
    //accepts given data and arguymentr as ID and updates the singular record
	public function edit_submit_index($data,$arg)
	{
		
		$this->conn->update('database', $data,
				"`id` = $arg");
	}
    //accepts ID and deletes from database a singular record
    public function delete_index($id)   
	{
		$this->db->delete('database', "`id` = {$id}");
		
	}
}