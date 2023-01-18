<?php
class VluchtBookHelper
{
    /**
     * Create new empty VluchtBook object.
     * @return VluchtBookEntity
     */
    public static function createEmptyVluchtBookObject(): VluchtBookEntity
    {
        $newEmptyVluchtBook = new VluchtBookEntity();

        $newEmptyVluchtBook->Id = 0;

        $newEmptyVluchtBook->VluchtBookNumber = 0;
        $newEmptyVluchtBook->VluchtBookNumberError = '';

        $newEmptyVluchtBook->Gender = '';
        $newEmptyVluchtBook->GenderError = '';

        $newEmptyVluchtBook->Title = '';
        $newEmptyVluchtBook->TitleError = '';

        $newEmptyVluchtBook->FirstName = '';
        $newEmptyVluchtBook->FirstNameError = '';

        $newEmptyVluchtBook->LastName = '';
        $newEmptyVluchtBook->LastNameError = '';

        $newEmptyVluchtBook->NickName = '';
        $newEmptyVluchtBook->NickNameError = '';

        $newEmptyVluchtBook->BirthDate = '';
        $newEmptyVluchtBook->BirthDateError = '';

        $newEmptyVluchtBook->Street = '';
        $newEmptyVluchtBook->StreetError = '';

        $newEmptyVluchtBook->HomeNumber = 0;
        $newEmptyVluchtBook->HomeNumberError = '';

        $newEmptyVluchtBook->NumberExtension = '';
        $newEmptyVluchtBook->NumberExtensionError = '';

        $newEmptyVluchtBook->ZipCode = '';
        $newEmptyVluchtBook->ZipCodeError = '';

        $newEmptyVluchtBook->Place = '';
        $newEmptyVluchtBook->PlaceError = '';

        $newEmptyVluchtBook->IsActive = '';

        $newEmptyVluchtBook->Note = '';
        $newEmptyVluchtBook->NoteError = '';

        return $newEmptyVluchtBook;
    }

    /**
     * Map the selected database VluchtBook row from to VluchtBook object. 
     * @param mixed $selectedVluchtBook
     * @return VluchtBookEntity
     */
    public static function mapVluchtBookRowToObject(mixed $selectedVluchtBook): VluchtBookEntity
    {
        $modifiedVluchtBook = new VluchtBookEntity();

        $modifiedVluchtBook->Id                   = $selectedVluchtBook->Id;

        $modifiedVluchtBook->VluchtBookNumber      = $selectedVluchtBook->VluchtBookNumber;
        $modifiedVluchtBook->VluchtBookNumberError = '';

        $modifiedVluchtBook->Gender               = $selectedVluchtBook->Gender;
        $modifiedVluchtBook->GenderError          = '';

        $modifiedVluchtBook->Title                = $selectedVluchtBook->Title;
        $modifiedVluchtBook->TitleError           = '';

        $modifiedVluchtBook->FirstName            = $selectedVluchtBook->FirstName;
        $modifiedVluchtBook->FirstNameError       = '';

        $modifiedVluchtBook->LastName             = $selectedVluchtBook->LastName;
        $modifiedVluchtBook->LastNameError        = '';

        $modifiedVluchtBook->NickName             = $selectedVluchtBook->NickName;
        $modifiedVluchtBook->NickNameError        = '';

        $modifiedVluchtBook->BirthDate            = $selectedVluchtBook->BirthDate;
        $modifiedVluchtBook->BirthDateError       = '';

        $modifiedVluchtBook->Street               = $selectedVluchtBook->Street;
        $modifiedVluchtBook->StreetError          = '';

        $modifiedVluchtBook->HomeNumber           = $selectedVluchtBook->HomeNumber;
        $modifiedVluchtBook->HomeNumberError      = '';

        $modifiedVluchtBook->NumberExtension      = !empty("$selectedVluchtBook->NumberExtension") ? $selectedVluchtBook->NumberExtension : '';
        $modifiedVluchtBook->NumberExtensionError = '';

        $modifiedVluchtBook->ZipCode              = $selectedVluchtBook->ZipCode;
        $modifiedVluchtBook->ZipCodeError         = '';

        $modifiedVluchtBook->Place                = $selectedVluchtBook->Place;
        $modifiedVluchtBook->PlaceError           = '';

        $modifiedVluchtBook->VluchtBookkey         = $selectedVluchtBook->VluchtBookkey;

        $modifiedVluchtBook->IsActive             = $selectedVluchtBook->IsActive ? 1 : 0;

        $modifiedVluchtBook->Note                 = !empty("$selectedVluchtBook->Note") ? $selectedVluchtBook->Note : '';
        $modifiedVluchtBook->NoteError            = '';

        $modifiedVluchtBook->DateCreated          = $selectedVluchtBook->DateCreated;

        $modifiedVluchtBook->DateModified         = $selectedVluchtBook->DateModified;

        return $modifiedVluchtBook;
    }

    /**
     * Set the values of input fields from the view to VluchtBook object.
     * @param [type] $inputPost
     * @param string $methodType
     * @return VluchtBookEntity
     */
    public static function setInputVluchtBookFieldsToVluchtBookObject($inputPost, string $methodType): VluchtBookEntity
    {
        $VluchtBook = new VluchtBookEntity();

        if ($methodType == 'update') {
            $VluchtBook->Id = isset($inputPost['Id']) ? $inputPost['Id'] : 0;
        }

        $VluchtBook->VluchtBookNumber             = $inputPost['VluchtBookNumber'];
        $VluchtBook->VluchtBookNumberError        = '';

        $VluchtBook->Gender                      = $inputPost['Genders'];
        $VluchtBook->GenderError                 = '';

        $VluchtBook->Title                       = $inputPost['Titles'];
        $VluchtBook->TitleError                  = '';

        $VluchtBook->FirstName                   = trim($inputPost['FirstName']);
        $VluchtBook->FirstNameError              = '';

        $VluchtBook->LastName                    = trim($inputPost['LastName']);
        $VluchtBook->LastNameError               = '';

        $VluchtBook->NickName                    = trim($inputPost['NickName']);
        $VluchtBook->NickNameError               = '';

        $VluchtBook->BirthDate                   = trim($inputPost['BirthDate']);
        $VluchtBook->BirthDateError              = '';

        $VluchtBook->Street                      = trim($inputPost['Street']);
        $VluchtBook->StreetError                 = '';

        $VluchtBook->HomeNumber                  = $inputPost['HomeNumber'];
        $VluchtBook->HomeNumberError             = '';

        $VluchtBook->NumberExtension             = isset($inputPost['NumberExtension']) ? trim($inputPost['NumberExtension']) : '';
        $VluchtBook->NumberExtensionError        = '';

        $VluchtBook->ZipCode                     = trim($inputPost['ZipCode']);
        $VluchtBook->ZipCodeError                = '';

        $VluchtBook->Place                       = trim($inputPost['Place']);
        $VluchtBook->PlaceError                  = '';

        $VluchtBook->IsActive                    = isset($inputPost['IsActive']) ? 1 : 0;

        $VluchtBook->Note                        = isset($inputPost['Note']) ? trim($inputPost['Note']) : '';
        $VluchtBook->NoteError                   = '';

        return $VluchtBook;
    }
}
