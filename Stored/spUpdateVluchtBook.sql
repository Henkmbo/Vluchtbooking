	USE VluchtBoeking;
    DROP PROCEDURE IF EXISTS spUpdateVluchtBook;
    
    DELIMITER //
        
	CREATE PROCEDURE spUpdateVluchtBook
	(
		-- VluchtId
		-- Id						INT	UNSIGNED
		Id						INT

		--  Passasier
		,Voornaam				VARCHAR(80)
		,Achternaam				VARCHAR(80)
		-- ,Geboortedatum			DATETIME UNSIGNED
		,Geboortedatum			DATETIME

		-- Contact
		,Straatnaam				VARCHAR(50)
		,Huisnummer				VARCHAR(11)
		,Toevoeging				VARCHAR(50) 
		,Postcode				VARCHAR(10)
		,Plaats					VARCHAR(50) 
		,Mobiel					VARCHAR(20)
		,Email					VARCHAR(255)

		-- Vlucht
		,Bestemming				VARCHAR(100)
		,Vertrekdatum			DATE
		,Vertrektijd			TIME
		,isActief				BIT 
		,opmerking				VARCHAR(255) 
	)
    
    BEGIN
    	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    	BEGIN
        	ROLLBACK;
        	SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
    	END;
        
		START TRANSACTION;	
			-- Stap_01
			UPDATE 	 Passasier AS Pssr

			SET		 Pssr.Voornaam 			= Voornaam
					,Pssr.Achternaam		= Achternaam
					,Pssr.Geboortedatum	= Geboortedatum
					,Pssr.DatumGewijzigd	= SYSDATE(6)		

			WHERE	Pssr.Id = Id;

			-- Stap_02
			UPDATE `Contact` 
			SET `Straatnaam` = Straatnaam, 
			`Huisnummer` = Huisnummer,
			`Toevoeging` = Toevoeging,
			`Postcode` = Postcode, 
			`Plaats` = Plaats, 
			`Mobiel` = Mobiel,
			`Email` = Email
			
			WHERE `Contact`.`PassasierId` = Id;

			-- Stap_03
			UPDATE `Vlucht` 
			SET `Bestemming` = Bestemming, 
			`Vertrekdatum` = Vertrekdatum, 
			`Vertrektijd` = Vertrektijd
			
			WHERE `Vlucht`.`PassasierId` = Id;
                
            COMMIT;	
	END //
        
 /*****************************************Debug SP*****************************************

	CALL spUpdateVluchtBook( 3 )		
   ********************************************************************************************/