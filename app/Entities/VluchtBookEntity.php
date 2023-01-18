<?php

/**
 * Database table VluchtBook fields 
 */
class VluchtBookEntity
{
    private int $id;

    private int $BedrijfId;
    private string $BedrijfError;

    private int $VluchtBookId;
    private string $VluchtBookError;


    // System fields
    private bool $IsActief;
    private string $Opmerking;
    private string $DateCreated;
    private string $DateModified;

    /**
     * Magic get generator property.
     * @param [type] $property
     * @return void
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Magic set generator property.
     * @param [type] $property
     * @param [type] $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
