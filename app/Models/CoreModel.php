<?php

namespace Socks\Models;

abstract class CoreModel
{
    protected $id;
    protected $name;

    /**
     * To save an object in DB
     * If it does not exist, it has no id and we do an insert()
     * If it exists in DB, it has an id and we do an update()
     */
    public function save()
    {
        if ($this->id !== null) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
