<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mensagem
 *
 * @ORM\Table(name="mensagem")
 * @ORM\Entity()
 *
 */
class Mensagem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime $data
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_name", type="string", length=255, nullable=true)
     */
    private $topicName;

    /**
     * @var float
     *
     * @ORM\Column(name="topic_value", type="float", nullable=false)
     */
    private $topicValue;

    /**
     * Get the value of id
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  integer  $id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get $data
     *
     * @return  \DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set $data
     *
     * @param  \DateTime  $createdAt  $data
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of topicName
     *
     * @return  string
     */ 
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * Set the value of topicName
     *
     * @param  string  $topicName
     *
     * @return  self
     */ 
    public function setTopicName(string $topicName)
    {
        $this->topicName = $topicName;

        return $this;
    }

    /**
     * Get the value of topicValue
     *
     * @return  float
     */ 
    public function getTopicValue()
    {
        return $this->topicValue;
    }

    /**
     * Set the value of topicValue
     *
     * @param  float  $topicValue
     *
     * @return  self
     */ 
    public function setTopicValue(float $topicValue)
    {
        $this->topicValue = $topicValue;

        return $this;
    }
}