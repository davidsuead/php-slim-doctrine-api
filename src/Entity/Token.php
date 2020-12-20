<?php

namespace App\Entity;

use DateTime;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Token
 *
 * @ORM\Table(name="token", uniqueConstraints={@ORM\UniqueConstraint(name="token", columns={"token"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TokenRepository")
 */
class Token
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=1000, nullable=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="refresh_token", type="string", length=100, nullable=false)
     */
    private $refreshToken;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="expired_at", type="datetime", nullable=false)
     */
    private $expiredAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of token
     *
     * @return  string
     */ 
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @param  string  $token
     *
     * @return  self
     */ 
    public function setToken(string $token) : self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of refreshToken
     *
     * @return  string
     */ 
    public function getRefreshToken() : string
    {
        return $this->refreshToken;
    }

    /**
     * Set the value of refreshToken
     *
     * @param  string  $refreshToken
     *
     * @return  self
     */ 
    public function setRefreshToken(string $refreshToken) : self
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * Get the value of expiredAt
     *
     * @return  DateTime
     */ 
    public function getExpiredAt() : DateTime
    {
        return $this->expiredAt;
    }

    /**
     * Set the value of expiredAt
     *
     * @param  DateTime  $expiredAt
     *
     * @return  self
     */ 
    public function setExpiredAt(DateTime $expiredAt) : self
    {
        $this->expiredAt = $expiredAt;

        return $this;
    }

    /**
     * Get the value of active
     *
     * @return  bool
     */ 
    public function getActive() : bool
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @param  bool  $active
     *
     * @return  self
     */ 
    public function setActive(bool $active) : self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of user
     *
     * @return  User
     */ 
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param  User  $user
     *
     * @return  self
     */ 
    public function setUser(User $user) : self
    {
        $this->user = $user;

        return $this;
    }
}
