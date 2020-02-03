<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="persons")
 * @ORM\Entity
 */
class Person
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $personid;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $personname;
    /**
     * @var Phone
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="person", cascade={"persist"}, orphanRemoval=true)
     */
    private $phones;
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

    public function getPersonid(): int
    {
        return $this->personid;
    }

    public function getPersonname(): string
    {
        return $this->personname;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setPersonid(string $personid)
    {
        $this->personid = $personid;
    }

    public function setPersonname(string $personname)
    {
        $this->personname = $personname;
    }

    public function setPhones(Phone $phones)
    {
        $phones->setPerson($this);
        $phoneNumber = $phones->getPhone();
        if (is_array($phoneNumber)) {
            foreach ($phoneNumber as $phone) {
                $phones->setPhone($phone);
                $this->phones[] = clone $phones;
            }
        } else {
            $this->phones = [$phones];
        }
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
