<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="phones")
 * @ORM\Entity
 */
class Phone
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=15)
     */
    private $phone;
    /**
     * @var Person
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="phones")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setPerson($person)
    {
        $this->person = $person;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
