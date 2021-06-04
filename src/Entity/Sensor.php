<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Sensor
 *
 * @ORM\Table(name="sensor")
 * @ORM\Entity()
 *
 */
class Sensor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_SIGPB_LOG", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_name", type="string", length=255, nullable=true)
     */
    private $topicName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_enabled", type="boolean", nullable=true, options={"default":"1"})
     */
    private $isEnabled;

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
     * Get $createdAt
     *
     * @return  \DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set $createdAt
     *
     * @param  \DateTime  $createdAt  $createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get $updatedAt
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set $updatedAt
     *
     * @param  \DateTime  $updatedAt  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  string
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param  string  $nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;

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
     * Get the value of isEnabled
     *
     * @return  bool
     */ 
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Set the value of isEnabled
     *
     * @param  bool  $isEnabled
     *
     * @return  self
     */ 
    public function setIsEnabled(bool $isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }
}