<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Relation
 *
 * @ORM\Table(name="relation", indexes={@ORM\Index(name="relation_ibfk_1", columns={"friend1_id"})})
 * @ORM\Entity
 */
class Relation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="friend2_id", type="integer", nullable=true)
     */
    private $friend2Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="friend1_id", referencedColumnName="user_id")
     * })
     */
    private $friend1;
    public function __construct()
    {
        $this->friend1 = new ArrayCollection();
    }
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->friend1 = $user;    
        return $this;
    }
    public function getFriend2Id(){
        return $this->friend2Id;
    }
    public function setFriend2Id($friend2Id){
        $this->friend2Id = $friend2Id;
    }
    public function getFriend1(){
        return $this->friend1;
    }
    public function setFriend1(ArrayCollection $friend1){
        $this->friend1 = $friend1;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


}
