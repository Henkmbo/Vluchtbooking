<?php
class VluchtBookModel
{
    private Database $Db;

   

    /**
     * Constructor VluchtBookModel
     * @param [type] $db
     */
    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }

    /**
     * Fetch the all VluchtBooks from database.
     * @return mixed
     */
    public function getVluchtBooks(): array
    {
        try {
            // Use sql script to fetch all VluchtBooks from hrmmysql database.
            $getAllVluchtBooksQuery = "CALL spGetVluchtBooks()";

            $this->Db->query($getAllVluchtBooksQuery);

            $result = $this->Db->resultSet();

            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to get all VluchtBooks from database in class VluchtBookModel method getVluchtBooks!", 0);
            die('ERROR : Failed to get all VluchtBooks from database in class VluchtBookModel method getVluchtBooks! ' . $ex->getMessage());
        }
    }

    /**
     * Fetch the selected VluchtBook from database.
     * @param [type] $id
     * @return VluchtBookEntity
     */
    public function getVluchtBookInfoById(int $id): VluchtBookEntity
    {
        try {
            // Call sp from database HRM.
            $getSelectedVluchtBook = "SELECT * 
                                         FROM   VluchtBook 
                                         WHERE  Id = :id";

            $this->Db->query($getSelectedVluchtBook);

            $this->Db->bind(':id', $id);

            $result = $this->Db->single();
            $VluchtBookObj = VluchtBookHelper::mapVluchtBookRowToObject($result);

            return $VluchtBookObj ?? new VluchtBookEntity();
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to get VluchtBook by id from database in class VluchtBookModel method getVluchtBookById!", 0);
            die('ERROR : Failed to get VluchtBook by id from database in class VluchtBookModel method getVluchtBookById! ' . $ex->getMessage());
        }
    }

    /**
     * Modify the selected VluchtBook in database.
     * @param VluchtBookEntity $selectedVluchtBook
     * @return void
     */
    public function updateVluchtBook(VluchtBookEntity $selectedVluchtBook): bool
    {
        try {
            // Update the selected VluchtBook in database.
            $getSelectedVluchtBook = "UPDATE  VluchtBook 
                                         SET     VluchtBookNumber	= :VluchtBookNumber	
                                                 ,Gender		    = :gender
                                                 ,Title		        = :title
                                                 ,FirstName         = :firstName
                                                 ,LastName          = :lastName
                                                 ,NickName          = :nickName
                                                 ,BirthDate         = :birthDate
                                                 ,Street			= :street			
                                                 ,HomeNumber		= :homeNumber		
                                                 ,NumberExtension	= :numberExtension
                                                 ,ZipCode			= :zipCode		
                                                 ,Place			    = :place				
                                                 ,IsActive		    = :isActive		
                                                 ,Note		        = :note	
                                                 ,DateModified	    = :dateModified
                                          WHERE   Id                = :id";

            

            $this->Db->query($getSelectedVluchtBook);

            // Execute function
            if ($this->Db->execute()) {
                error_log("INFO : Selected VluchtBook has been modified in class VluchtBookModel method updateVluchtBook!", 0);
                return true;
            } else {
                error_log("ERROR : Selected VluchtBook has been not modified in class VluchtBookModel method updateVluchtBook!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to update selected VluchtBook by id from database in class VluchtBookModel method updateVluchtBook!", 0);
            die('ERROR : Failed to update selected VluchtBook from database in class VluchtBookModel method updateAepplicant! ' . $ex->getMessage());
        }
    }

    /**
     * Create new VluchtBook in database.
     * @param VluchtBookEntity $newVluchtBook
     * @return boolean
     */
    public function createVluchtBook(VluchtBookEntity $newVluchtBook): bool
    {
        try {
            // Create new VluchtBook in database.
            $newVluchtBookQuery = "INSERT INTO VluchtBook
                                        (					
                                             VluchtBookNumber
                                            ,Gender			
                                            ,Title			
                                            ,FirstName		
                                            ,LastName		
                                            ,NickName    	
                                            ,BirthDate	
                                            ,Street			
                                            ,HomeNumber			
                                            ,NumberExtension
                                            ,ZipCode		
                                            ,Place			
                                            ,VluchtBookkey			
                                            ,IsActive		
                                            ,Note  	
                                            ,DateCreated 
                                            ,DateModified
                                        )
                                        VALUES
                                        (
                                             :VluchtBookNumber
                                            ,:gender
                                            ,:title
                                            ,:firstName
                                            ,:lastName
                                            ,:nickName
                                            ,:birthDate
                                            ,:street			
                                            ,:homeNumber	
                                            ,:numberExtension
                                            ,:zipCode		
                                            ,:place	
                                            ,:VluchtBookkey			
                                            ,:isActive		
                                            ,:note	
                                            ,:dateCreated
                                            ,:dateModified
                                        )";

            $this->Db->query($newVluchtBookQuery);
            $this->Db->bind(':VluchtBookNumber', $newVluchtBook->VluchtBookNumber);
            $this->Db->bind(':gender', $newVluchtBook->Gender);
            $this->Db->bind(':title', $newVluchtBook->Title);
            $this->Db->bind(':firstName', $newVluchtBook->FirstName);
            $this->Db->bind(':lastName', $newVluchtBook->LastName);
            $this->Db->bind(':nickName', $newVluchtBook->NickName);
            $this->Db->bind(':birthDate', $newVluchtBook->BirthDate);
            $this->Db->bind(':street', $newVluchtBook->Street);
            $this->Db->bind(':homeNumber', $newVluchtBook->HomeNumber);
            $this->Db->bind(':numberExtension', $newVluchtBook->NumberExtension);
            $this->Db->bind(':zipCode', $newVluchtBook->ZipCode);
            $this->Db->bind(':place', $newVluchtBook->Place);
            $this->Db->bind(':VluchtBookkey', com_create_guid());
            $this->Db->bind(':isActive', $newVluchtBook->IsActive);
            $this->Db->bind(':note', $newVluchtBook->Note);
            $this->Db->bind(':dateCreated', DateTimeHelper::ConvertDateTimeToStringDateTime());
            $this->Db->bind(':dateModified', DateTimeHelper::ConvertDateTimeToStringDateTime());

            // Execute function
            if ($this->Db->execute()) {
                error_log("INFO : New VluchtBook has been created in class VluchtBookModel method createVluchtBook!", 0);
                return true;
            } else {
                error_log("ERROR : New VluchtBook has been not created in class VluchtBookModel method createVluchtBook!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to create new VluchtBook in database in class VluchtBookModel method createVluchtBook!", 0);
            die('ERROR : Failed to create new VluchtBook in database in class VluchtBookModel method createVluchtBook ' . $ex->getMessage());
        }
    }

    /**
     * Delete selected VluchtBook from database.
     * @param integer $id
     * @return boolean
     */
    public function deleteVluchtBook(int $id): bool
    {
        // var_dump($id);exit;
        try {
            // Delete the selected VluchtBook from database.
            $deletedVluchtBookQuery = "CALL spDeleteVluchtBook(:id)";
            $this->Db->query($deletedVluchtBookQuery);
            $this->Db->bind(':id', $id);

            // Execute function
            if ($this->Db->execute()) {
                error_log("INFO : Selected VluchtBook has been deleted in class VluchtBookModel method deleteVluchtBook!", 0);
                return true;
            } else {
                error_log("ERROR : Selected VluchtBook has been not deleted in class VluchtBookModel method deleteVluchtBook!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to delete selected VluchtBook in database in class VluchtBookModel method deleteVluchtBook!", 0);
            die('ERROR : Failed to delete selected VluchtBook in database in class VluchtBookModel method deleteVluchtBook ' . $ex->getMessage());
        }
    }
}