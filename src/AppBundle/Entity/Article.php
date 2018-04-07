<?php
/**
 * Created by PhpStorm.
 * User: FIRAS
 * Date: 27/01/2018
 * Time: 12:35
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;


/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ligne", mappedBy="article",cascade={"persist"})
     */
    protected $lignes;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie", mappedBy="article")
     */
    private $categorie;
    /**
     * Many Groups have Many Users.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Option", mappedBy="article")
     */
    private $option;
    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Type("datetime")
     */
    private $date_pub;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Type("string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Type("string")
     */
    private $description;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Type("integer")
     */
    private $quantity = 0;
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Type("float")
     */
    private $prix;
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Type("float")
     */
    private $oldprix;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Type("string")
     */
    private $ref;
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vendeur", inversedBy="articles")
     * @ORM\JoinColumn(name="vendeur_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $vendeur;
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Images", mappedBy="article")
     */
    private $images;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->lignes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Article
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set commande
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return Article
     */
    public function setCommande(\AppBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \AppBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Get images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set images
     *
     * @param string $images
     *
     * @return Article
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Article
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Add avi
     *
     * @param \AppBundle\Entity\Avis $avi
     *
     * @return Article
     */
    public function addAvi(\AppBundle\Entity\Avis $avi)
    {
        $this->avis[] = $avi;

        return $this;
    }

    /**
     * Remove avi
     *
     * @param \AppBundle\Entity\Avis $avi
     */
    public function removeAvi(\AppBundle\Entity\Avis $avi)
    {
        $this->avis->removeElement($avi);
    }

    /**
     * Get avis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return Article
     */
    public function addImage(\AppBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Images $image
     */
    public function removeImage(\AppBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Article
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get datePub
     *
     * @return \DateTime
     */
    public function getDatePub()
    {
        return $this->date_pub;
    }

    /**
     * Set datePub
     *
     * @param \DateTime $datePub
     *
     * @return Article
     */
    public function setDatePub($datePub)
    {
        $this->date_pub = $datePub;

        return $this;
    }

    /**
     * Get oldprix
     *
     * @return float
     */
    public function getOldprix()
    {
        return $this->oldprix;
    }

    /**
     * Set oldprix
     *
     * @param float $oldprix
     *
     * @return Article
     */
    public function setOldprix($oldprix)
    {
        $this->oldprix = $oldprix;

        return $this;
    }

    /**
     * Get vendeur
     *
     * @return \AppBundle\Entity\Vendeur
     */
    public function getVendeur()
    {
        return $this->vendeur;
    }

    /**
     * Set vendeur
     *
     * @param \AppBundle\Entity\Vendeur $vendeur
     *
     * @return Article
     */
    public function setVendeur(\AppBundle\Entity\Vendeur $vendeur = null)
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function addCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return Article
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Add option
     *
     * @param \AppBundle\Entity\Option $option
     *
     * @return Article
     */
    public function addOption(\AppBundle\Entity\Option $option)
    {
        $this->option[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \AppBundle\Entity\Option $option
     */
    public function removeOption(\AppBundle\Entity\Option $option)
    {
        $this->option->removeElement($option);
    }

    /**
     * Get option
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * Add lignes
     *
     * @param Ligne $ligne
     * @return Article
     */
    public function addUserRecipeAssociation(Ligne $ligne)
    {
        $this->lignes[] = $ligne;
        return $this;
    }

    /**
     * Remove lignes
     *
     * @param Ligne $ligne
     */
    public function removeUserRecipeAssociation(Ligne $ligne)
    {
        $this->lignes->removeElement($ligne);
    }

    /**
     * Get ligne
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRecipeAssociations()
    {
        return $this->lignes;
    }


}
