<?php
class VluchtBookValidator
{
    /**
     * Validat all the input fields of VluchtBook for the create or update views.
     * @param VluchtBookEntity $data
     * @return boolean
     */
    public static function validateVluchtBookInputFields(VluchtBookEntity $data): bool
    {
        try {
            $isViewValid = false;

            // Validate fields
            // VluchtBook number validation.
            if (is_null($data->VluchtBookNumber)) {
                $data->VluchtBookNumberError = 'Please enter VluchtBook number.';
            } elseif (!is_int($data->VluchtBookNumber)) {
                $data->VluchtBookNumberError = 'VluchtBook number is incorrect integer format.';
            }

            // Gender validation.
            if (empty("$data->Gender")) {
                $data->GenderError = 'Please enter gender.';
            } elseif (!is_string($data->Gender)) {
                $data->GenderError = 'Gender is incorrect text format.';
            } elseif (strlen($data->Gender) > 50) {
                $data->GenderError = 'Gender is too long!.';
            }

            // Title validation.
            if (!is_string($data->Title)) {
                $data->TitleError = 'Title is incorrect text format.';
            } elseif (strlen($data->Title) > 10) {
                $data->TitleError = 'Title is too long!.';
            }

            // FirstName validation.
            if (empty("$data->FirstName")) {
                $data->FirstNameError = 'Please enter firstName.';
            } elseif (!is_string($data->FirstName)) {
                $data->FirstNameError = 'FirstName is incorrect text format.';
            } elseif (strlen($data->FirstName) > 50) {
                $data->FirstNameError = 'FirstName is too long!.';
            }

            // LastName validation.
            if (empty("$data->LastName")) {
                $data->LastNameError = 'Please enter lastName.';
            } elseif (!is_string($data->LastName)) {
                $data->LastNameError = 'LastName is incorrect text format.';
            } elseif (strlen($data->LastName) > 50) {
                $data->LastNameError = 'LastName is too long!.';
            }

            // NickName validation.
            if (!is_string($data->NickName)) {
                $data->NickNameError = 'NickName is incorrect text format.';
            } elseif (strlen($data->NickName) > 50) {
                $data->NickNameError = 'NickName is too long!.';
            }

            // BirthDate validation.
            if (empty("$data->BirthDate")) {
                $data->BirthDateError = 'Please enter birthDate.';
            }
            // elseif(!preg_match($birthDateRegExp, $data->BirthDate))
            // {
            //     $data->BirthDateError = 'BirthDate is incorrect date format.';
            // } 

            // Street validation.
            if (empty("$data->Street")) {
                $data->StreetError = 'Please enter street name.';
            } elseif (!is_string($data->Street)) {
                $data->StreetError = 'Street is incorrect text format.';
            } elseif (strlen($data->Street) > 50) {
                $data->StreetError = 'Company street is too long!.';
            }

            // HomeNumber validation.
            if (is_null($data->HomeNumber)) {
                $data->HomeNumberError = 'Please enter home number of house/bulding.';
            } elseif (!is_int($data->HomeNumber)) {
                $data->HomeNumberError = 'VluchtBook home number is incorrect integer format.';
            }

            // Number extension validation
            if (!is_string($data->NumberExtension)) {
                $data->NumberExtensionError = 'VluchtBook number extension is incorrect text format.';
            } elseif (strlen($data->NumberExtension) > 10) {
                $data->NumberExtensionError = 'Company number extension is too long!.';
            }

            // ZipCode validation.
            if (empty("$data->ZipCode")) {
                $data->ZipCodeError = 'Please enter zipcode of house/building.';
            } elseif (!preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]|[A-Z]{2}$/i', $data->ZipCode)) {
                $data->ZipCodeError  = 'Company zipCode is invalid!.';
            }

            // Place validation.
            if (empty("$data->Place")) {
                $data->PlaceError = 'Please enter the place of house/building.';
            } elseif (!is_string($data->Place)) {
                $data->PlaceError = 'Place is incorrect text format.';
            } elseif (strlen($data->Place) > 50) {
                $data->PlaceError = 'Place is too long!.';
            }

            // Note validation.
            if (!is_string($data->Note)) {
                $data->NoteError = 'Note is incorrect text format.';
            } elseif (strlen($data->Note) > 200) {
                $data->NoteError = 'Note is too long!.';
            }

            $isVluchtBookNumberError         = empty("$data->VluchtBookNumberError");
            $isGenderErrorEmpty             = empty("$data->GenderError");
            $isTitleErrorEmpty              = empty("$data->TitleError");
            $isFirstNameErrorEmpty          = empty("$data->FirstNameError");
            $isLastNameErrorEmpty           = empty("$data->LastNameError");
            $isNickNameErrorEmpty           = empty("$data->NickNameError");
            $isBirthDateErrorEmpty          = empty("$data->BirthDateError");
            $isStreetErrorEmpty             = empty("$data->StreetError");
            $isHomeNumberErrorEmpty         = empty("$data->HomeNumberError");
            $isNumberExtensionErrorEmpty    = empty("$data->NumberExtensionError");
            $isZipCodeErrorEmpty            = empty("$data->ZipCodeError");
            $isPlaceErrorEmpty              = empty("$data->PlaceError");
            $isNoteErrorEmpty               = empty("$data->NoteError");

            if (
                $isVluchtBookNumberError
                && $isGenderErrorEmpty
                && $isTitleErrorEmpty
                && $isFirstNameErrorEmpty
                && $isLastNameErrorEmpty
                && $isNickNameErrorEmpty
                && $isBirthDateErrorEmpty
                && $isStreetErrorEmpty
                && $isHomeNumberErrorEmpty
                && $isNumberExtensionErrorEmpty
                && $isZipCodeErrorEmpty
                && $isPlaceErrorEmpty
                && $isNoteErrorEmpty
            ) {
                $isViewValid = true;
            }
            return $isViewValid;
        } catch (Exception $ex) {
            error_log("Failed to valide selected VluchtBook in class VluchtBookValidator->validatVluchtBookInputFields!", 0);
        }
    }
}
