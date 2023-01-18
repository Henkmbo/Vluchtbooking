    USE VluchtBoeking;
    DROP PROCEDURE IF EXISTS spDeleteVluchtBook;
    
    DELIMITER //
        
	CREATE PROCEDURE spDeleteVluchtBook
	(
		id	INT	UNSIGNED
	)
    BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
        
		START TRANSACTION;					
			-- Stap_01
			-- Delete contact
			DELETE	Cntct
			FROM 	Contact AS Cntct
			WHERE	Cntct.PassasierId = id;
			
			
			-- Stap_02
			-- Delete vlucht
			DELETE	VLGT
			FROM 	Vlucht AS VLGT
			WHERE	VLGT.PassasierId = id;

			-- Stap_03
			-- Delete passasier
			DELETE  Pssr
			FROM 	Passasier AS Pssr
			WHERE	Pssr.Id = id;
            
        COMMIT;	
	END //
        
 /*****************************************Debug SP*****************************************
	CALL spDeleteVluchtBook(1)		
  ********************************************************************************************/