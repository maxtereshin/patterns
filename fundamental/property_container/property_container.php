<?php

interface PropertyContainerInterface
{
    function addProperty($propertyName, $value);
    function updateProperty($propertyName, $value);
    function getProperty($propertyName);
    function deleteProperty($propertyName);
}

class PropertyContainer implements PropertyContainerInterface
{
    private array $propertyContainer = [];

    function addProperty($propertyName, $value): void
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    function updateProperty($propertyName, $value): void
    {
        if (!isset($this->propertyContainer[$propertyName]))
        {
            echo "property {$propertyName} not found <br>";
            return;
        }

        $this->propertyContainer[$propertyName] = $value;
    }

    function getProperty($propertyName)
    {
        if (!isset($this->propertyContainer[$propertyName]))
        {
            echo "property {$propertyName} not found <br>";
            return null;
        }
        return $this->propertyContainer[$propertyName];
    }

    function deleteProperty($propertyName): void
    {
        unset($this->propertyContainer[$propertyName]);
    }

}

class BlogPost extends PropertyContainer
{
    private string $title;

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}