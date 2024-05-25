<?php
class DbConfig 
{   
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = ''; 
    private $_database = 'test';
    
    protected $connection;
    
    public function __construct()
    {
        $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        
        // Check if connection was successful
        if ($this->connection->connect_error) {
            // If connection fails, output error message and exit
            die('Connect Error (' . $this->connection->connect_errno . ') ' . $this->connection->connect_error);
        }           
    }
}
?>
