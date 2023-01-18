    USE VluchtBoeking;
    DROP PROCEDURE IF EXISTS spGetVluchtBooksById;
    
    DELIMITER //

	CREATE PROCEDURE spGetVluchtBooksById(Id INT)
	BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
         
		START TRANSACTION;	
			SELECT	 	 VLGT.Id									AS Id
						-- Passasier
						,Pssr.Voornaam								AS Voornaam
						,Pssr.Achternaam							AS Achternaam
						,Pssr.Geboortedatum							AS Geboortedatum
					
						-- Contact
						,Cntct.Straatnaam							AS Straat
						,Cntct.Huisnummer							AS Huisnummer
						,Cntct.Toevoeging							AS Toevoeging
						,Cntct.Postcode								AS Postcode
						,Cntct.Plaats								AS Plaats
						,Cntct.Mobiel								AS Mobiel
						,Cntct.Email 								AS Email

						-- Vlucht
						,VLGT.Bestemming							AS Bestemming
						,VLGT.Vertrekdatum							AS Vertrekdatum
						,VLGT.Vertrektijd							AS Vertrektijd		
	
			FROM	 	Vlucht AS VLGT
	
			INNER JOIN 	Passasier AS Pssr
					ON 	Pssr.Id = VLGT.PassasierId
	
			INNER JOIN 	Contact AS Cntct
					ON 	Cntct.PassasierId = Pssr.Id
			
			WHERE VLGT.Id = Id;
			COMMIT;	
                
	END //
    DELIMITER ;
	
/*****************************************Debug SP*****************************************
    
		CALL spGetVluchtBooksById()
	
********************************************************************************************/