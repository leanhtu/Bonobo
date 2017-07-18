<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=255, nullable=true)
     */
    private $userPassword;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_age", type="integer", nullable=true)
     */
    private $userAge;

    /**
     * @var string
     *
     * @ORM\Column(name="user_famille", type="string", length=255, nullable=true)
     */
    private $userFamille;

    /**
     * @var string
     *
     * @ORM\Column(name="user_race", type="string", length=255, nullable=true)
     */
    private $userRace;

    /**
     * @var string
     *
     * @ORM\Column(name="user_nourriture", type="string", length=255, nullable=true)
     */
    private $userNourriture;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function getUserPassword(){
        return $this->userPassword;
    }
    public function setUserPassword($userPassword){
        $this->userPassword= $userPassword;
    }
    public function getUserAge(){
        return $this->userAge;
    }
    public function setUserAge($userAge){
        $this->userAge= $userAge;
    }
    public function getUserFamille(){
        return $this->userFamille;
    }
    public function setUserFamille($userFamille){
        $this->userFamille= $userFamille;
    }
    public function getUserRace(){
        return $this->userRace;
    }
    public function setUserRace($userRace){
        $this->userRace = $userRace;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId= $userId;
    }

}
