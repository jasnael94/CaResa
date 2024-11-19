<?php

trait Timestamp
{
    public $createdAt;

    public $updateAt;

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updateAt;
    }


    public function setUpdateAt(\DateTime $updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }
}

?>