<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;

use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @Vich\Uploadable
 */
class User implements UserInterface
{








    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress ;



    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

   /* *
     * @ORM\Column(type="json")
*/
    private $roles = [];


    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
    */
    private $password;

    /* *
     * @ORM\Column(type="string", length=255)
     * @var string

    private $image;
*/
    /* *
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File

    private $imageFile;
 */




    /* *
     * @ORM\Column(type="boolean")

    private $published;

    /**
     * @ORM\Column (type="datetime", nullable=true)


    private $dateCreation;
*/
    /* *
     * @ORM\Column(type="datetime", nullable=true)

    private $updatedDate;
*/

    /* *
     * @ORM\Column(type="datetime", nullable=true)

    private $updatedAt;
     */
    /* *
     * @ORM\Column(type="integer")

    private $authorId;

    /**
     * @ORM\Column (type="string", length=255)
     * @var string


    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File

    private $imageFile;


*/



    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
    */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */

     public function getRoles(): array
       {
           $roles = $this->roles;
           // guarantee every user at least has ROLE_USER
           $roles[] = 'ROLE_USER';

           return array_unique($roles);
       }

       public function setRoles(array $roles): self
       {
           $this->roles = $roles;

           return $this;
       }


        /**
        * @see UserInterface
        */

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
*/
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
*/
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    public function getAdress(): ?string
    {
        return $this->adress;
    }


    public function setAdress($adress)
    {
        $this->adress = $adress;
    }


  //  public function setImageFile(File $image = null)
  //  {
    //    $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
      //  if ($image) {
            //if 'updatedAt' is not defined in your entity, use another property
        //    $this->updatedAt = new \DateTime('now');
    //}
    //}

    //public function getImageFile()
    //{
      //  return $this->imageFile;
    //}

    //public function setImage($image)
    //{
      //  $this->image = $image;
    //}

    //public function getImage()
    //{
      //  return $this->image;
    //}

    /**
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * @param mixed $updatedDate
     */
    public function setUpdatedDate($updatedDate): void
    {
        $this->updatedDate = $updatedDate;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }



}
