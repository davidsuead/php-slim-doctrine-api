<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Breed
 *
 * @ORM\Table(name="breed")
 * @ORM\Entity(repositoryClass="App\Repository\BreedRepository")
 */
class Breed
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
     * @var int|null
     *
     * @ORM\Column(name="breed_adaptability", type="smallint", nullable=true)
     */
    private $breedAdaptability;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_affection_level", type="smallint", nullable=true)
     */
    private $breedAffectionLevel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_alt_names", type="string", length=100, nullable=true)
     */
    private $breedAltNames;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_cfa_url", type="string", length=100, nullable=true)
     */
    private $breedCfaUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_child_friendly", type="smallint", nullable=true)
     */
    private $breedChildFriendly;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_country_code", type="string", length=100, nullable=true)
     */
    private $breedCountryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_country_codes", type="string", length=100, nullable=true)
     */
    private $breedCountryCodes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_description", type="text", length=65535, nullable=true)
     */
    private $breedDescription;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_dog_friendly", type="smallint", nullable=true)
     */
    private $breedDogFriendly;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_energy_level", type="smallint", nullable=true)
     */
    private $breedEnergyLevel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_experimental", type="smallint", nullable=true)
     */
    private $breedExperimental;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_grooming", type="smallint", nullable=true)
     */
    private $breedGrooming;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_hairless", type="smallint", nullable=true)
     */
    private $breedHairless;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_health_issues", type="smallint", nullable=true)
     */
    private $breedHealthIssues;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_hypoallergenic", type="smallint", nullable=true)
     */
    private $breedHypoallergenic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_id", type="string", length=100, nullable=true)
     */
    private $breedId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_indoor", type="smallint", nullable=true)
     */
    private $breedIndoor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_intelligence", type="smallint", nullable=true)
     */
    private $breedIntelligence;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_lap", type="smallint", nullable=true)
     */
    private $breedLap;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_life_span", type="string", length=100, nullable=true)
     */
    private $breedLifeSpan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_name", type="string", length=100, nullable=true)
     */
    private $breedName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_natural", type="smallint", nullable=true)
     */
    private $breedNatural;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_origin", type="string", length=100, nullable=true)
     */
    private $breedOrigin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_rare", type="smallint", nullable=true)
     */
    private $breedRare;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_reference_image_id", type="string", length=100, nullable=true)
     */
    private $breedReferenceImageId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_rex", type="smallint", nullable=true)
     */
    private $breedRex;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_shedding_level", type="smallint", nullable=true)
     */
    private $breedSheddingLevel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_short_legs", type="smallint", nullable=true)
     */
    private $breedShortLegs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_social_needs", type="smallint", nullable=true)
     */
    private $breedSocialNeeds;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_stranger_friendly", type="smallint", nullable=true)
     */
    private $breedStrangerFriendly;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_suppressed_tail", type="smallint", nullable=true)
     */
    private $breedSuppressedTail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_temperament", type="string", length=100, nullable=true)
     */
    private $breedTemperament;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_vcahospitals_url", type="string", length=100, nullable=true)
     */
    private $breedVcahospitalsUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_vetstreet_url", type="string", length=100, nullable=true)
     */
    private $breedVetstreetUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="breed_vocalisation", type="smallint", nullable=true)
     */
    private $breedVocalisation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_wikipedia_url", type="string", length=100, nullable=true)
     */
    private $breedWikipediaUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_weight_imperial", type="string", length=100, nullable=true)
     */
    private $breedWeightImperial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="breed_weight_metric", type="string", length=100, nullable=true)
     */
    private $breedWeightMetric;

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
     * Get the value of breedAdaptability
     *
     * @return  int|null
     */ 
    public function getBreedAdaptability() : ?int
    {
        return $this->breedAdaptability;
    }

    /**
     * Set the value of breedAdaptability
     *
     * @param  int|null  $breedAdaptability
     *
     * @return  self
     */ 
    public function setBreedAdaptability($breedAdaptability) : self
    {
        $this->breedAdaptability = $breedAdaptability;

        return $this;
    }

    /**
     * Get the value of breedAffectionLevel
     *
     * @return  int|null
     */ 
    public function getBreedAffectionLevel() : ?int
    {
        return $this->breedAffectionLevel;
    }

    /**
     * Set the value of breedAffectionLevel
     *
     * @param  int|null  $breedAffectionLevel
     *
     * @return  self
     */ 
    public function setBreedAffectionLevel($breedAffectionLevel) : self
    {
        $this->breedAffectionLevel = $breedAffectionLevel;

        return $this;
    }

    /**
     * Get the value of breedAltNames
     *
     * @return  string|null
     */ 
    public function getBreedAltNames() : ?string
    {
        return $this->breedAltNames;
    }

    /**
     * Set the value of breedAltNames
     *
     * @param  string|null  $breedAltNames
     *
     * @return  self
     */ 
    public function setBreedAltNames(?string $breedAltNames) : self
    {
        $this->breedAltNames = $breedAltNames;

        return $this;
    }

    /**
     * Get the value of breedCfaUrl
     *
     * @return  string|null
     */ 
    public function getBreedCfaUrl() : ?string
    {
        return $this->breedCfaUrl;
    }

    /**
     * Set the value of breedCfaUrl
     *
     * @param  string|null  $breedCfaUrl
     *
     * @return  self
     */ 
    public function setBreedCfaUrl(?string $breedCfaUrl) : self
    {
        $this->breedCfaUrl = $breedCfaUrl;

        return $this;
    }

    /**
     * Get the value of breedChildFriendly
     *
     * @return  int|null
     */ 
    public function getBreedChildFriendly() : ?int
    {
        return $this->breedChildFriendly;
    }

    /**
     * Set the value of breedChildFriendly
     *
     * @param  int|null  $breedChildFriendly
     *
     * @return  self
     */ 
    public function setBreedChildFriendly(?int $breedChildFriendly) : self
    {
        $this->breedChildFriendly = $breedChildFriendly;

        return $this;
    }

    /**
     * Get the value of breedCountryCode
     *
     * @return  string|null
     */ 
    public function getBreedCountryCode() : ?string
    {
        return $this->breedCountryCode;
    }

    /**
     * Set the value of breedCountryCode
     *
     * @param  string|null  $breedCountryCode
     *
     * @return  self
     */ 
    public function setBreedCountryCode(?string $breedCountryCode) : self
    {
        $this->breedCountryCode = $breedCountryCode;

        return $this;
    }

    /**
     * Get the value of breedCountryCodes
     *
     * @return  string|null
     */ 
    public function getBreedCountryCodes() : ?string
    {
        return $this->breedCountryCodes;
    }

    /**
     * Set the value of breedCountryCodes
     *
     * @param  string|null  $breedCountryCodes
     *
     * @return  self
     */ 
    public function setBreedCountryCodes(?string $breedCountryCodes) : self
    {
        $this->breedCountryCodes = $breedCountryCodes;

        return $this;
    }

    /**
     * Get the value of breedDescription
     *
     * @return  string|null
     */ 
    public function getBreedDescription() : ?string
    {
        return $this->breedDescription;
    }

    /**
     * Set the value of breedDescription
     *
     * @param  string|null  $breedDescription
     *
     * @return  self
     */ 
    public function setBreedDescription(?string $breedDescription) : self
    {
        $this->breedDescription = $breedDescription;

        return $this;
    }

    /**
     * Get the value of breedDogFriendly
     *
     * @return  int|null
     */ 
    public function getBreedDogFriendly() : ?int
    {
        return $this->breedDogFriendly;
    }

    /**
     * Set the value of breedDogFriendly
     *
     * @param  int|null  $breedDogFriendly
     *
     * @return  self
     */ 
    public function setBreedDogFriendly(?int $breedDogFriendly) : self
    {
        $this->breedDogFriendly = $breedDogFriendly;

        return $this;
    }

    /**
     * Get the value of breedEnergyLevel
     *
     * @return  int|null
     */ 
    public function getBreedEnergyLevel() : ?int
    {
        return $this->breedEnergyLevel;
    }

    /**
     * Set the value of breedEnergyLevel
     *
     * @param  int|null  $breedEnergyLevel
     *
     * @return  self
     */ 
    public function setBreedEnergyLevel(?int $breedEnergyLevel) : self
    {
        $this->breedEnergyLevel = $breedEnergyLevel;

        return $this;
    }

    /**
     * Get the value of breedExperimental
     *
     * @return  int|null
     */ 
    public function getBreedExperimental() : ?int
    {
        return $this->breedExperimental;
    }

    /**
     * Set the value of breedExperimental
     *
     * @param  int|null  $breedExperimental
     *
     * @return  self
     */ 
    public function setBreedExperimental(?int $breedExperimental) : self
    {
        $this->breedExperimental = $breedExperimental;

        return $this;
    }

    /**
     * Get the value of breedGrooming
     *
     * @return  int|null
     */ 
    public function getBreedGrooming() : ?int
    {
        return $this->breedGrooming;
    }

    /**
     * Set the value of breedGrooming
     *
     * @param  int|null  $breedGrooming
     *
     * @return  self
     */ 
    public function setBreedGrooming(?int $breedGrooming) : self
    {
        $this->breedGrooming = $breedGrooming;

        return $this;
    }

    /**
     * Get the value of breedHairless
     *
     * @return  int|null
     */ 
    public function getBreedHairless() : ?int
    {
        return $this->breedHairless;
    }

    /**
     * Set the value of breedHairless
     *
     * @param  int|null  $breedHairless
     *
     * @return  self
     */ 
    public function setBreedHairless(?int $breedHairless) : self
    {
        $this->breedHairless = $breedHairless;

        return $this;
    }

    /**
     * Get the value of breedHealthIssues
     *
     * @return  int|null
     */ 
    public function getBreedHealthIssues() : ?int
    {
        return $this->breedHealthIssues;
    }

    /**
     * Set the value of breedHealthIssues
     *
     * @param  int|null  $breedHealthIssues
     *
     * @return  self
     */ 
    public function setBreedHealthIssues(?int $breedHealthIssues) : self
    {
        $this->breedHealthIssues = $breedHealthIssues;

        return $this;
    }

    /**
     * Get the value of breedHypoallergenic
     *
     * @return  int|null
     */ 
    public function getBreedHypoallergenic() : ?int
    {
        return $this->breedHypoallergenic;
    }

    /**
     * Set the value of breedHypoallergenic
     *
     * @param  int|null  $breedHypoallergenic
     *
     * @return  self
     */ 
    public function setBreedHypoallergenic(?int $breedHypoallergenic) : self
    {
        $this->breedHypoallergenic = $breedHypoallergenic;

        return $this;
    }

    /**
     * Get the value of breedId
     *
     * @return  string|null
     */ 
    public function getBreedId() : ?string
    {
        return $this->breedId;
    }

    /**
     * Set the value of breedId
     *
     * @param  string|null  $breedId
     *
     * @return  self
     */ 
    public function setBreedId(?string $breedId) : self
    {
        $this->breedId = $breedId;

        return $this;
    }

    /**
     * Get the value of breedIndoor
     *
     * @return  int|null
     */ 
    public function getBreedIndoor() : ?int
    {
        return $this->breedIndoor;
    }

    /**
     * Set the value of breedIndoor
     *
     * @param  int|null  $breedIndoor
     *
     * @return  self
     */ 
    public function setBreedIndoor(?int $breedIndoor) : self
    {
        $this->breedIndoor = $breedIndoor;

        return $this;
    }

    /**
     * Get the value of breedIntelligence
     *
     * @return  int|null
     */ 
    public function getBreedIntelligence() : ?int
    {
        return $this->breedIntelligence;
    }

    /**
     * Set the value of breedIntelligence
     *
     * @param  int|null  $breedIntelligence
     *
     * @return  self
     */ 
    public function setBreedIntelligence(?int $breedIntelligence) : self
    {
        $this->breedIntelligence = $breedIntelligence;

        return $this;
    }

    /**
     * Get the value of breedLap
     *
     * @return  int|null
     */ 
    public function getBreedLap() : ?int
    {
        return $this->breedLap;
    }

    /**
     * Set the value of breedLap
     *
     * @param  int|null  $breedLap
     *
     * @return  self
     */ 
    public function setBreedLap(?int $breedLap) : self
    {
        $this->breedLap = $breedLap;

        return $this;
    }

    /**
     * Get the value of breedLifeSpan
     *
     * @return  string|null
     */ 
    public function getBreedLifeSpan() : ?string
    {
        return $this->breedLifeSpan;
    }

    /**
     * Set the value of breedLifeSpan
     *
     * @param  string|null  $breedLifeSpan
     *
     * @return  self
     */ 
    public function setBreedLifeSpan(?string $breedLifeSpan) : self
    {
        $this->breedLifeSpan = $breedLifeSpan;

        return $this;
    }

    /**
     * Get the value of breedName
     *
     * @return  string|null
     */ 
    public function getBreedName() : ?string
    {
        return $this->breedName;
    }

    /**
     * Set the value of breedName
     *
     * @param  string|null  $breedName
     *
     * @return  self
     */ 
    public function setBreedName(?string $breedName) : self
    {
        $this->breedName = $breedName;

        return $this;
    }

    /**
     * Get the value of breedNatural
     *
     * @return  int|null
     */ 
    public function getBreedNatural() : ?int
    {
        return $this->breedNatural;
    }

    /**
     * Set the value of breedNatural
     *
     * @param  int|null  $breedNatural
     *
     * @return  self
     */ 
    public function setBreedNatural(?int $breedNatural) : self
    {
        $this->breedNatural = $breedNatural;

        return $this;
    }

    /**
     * Get the value of breedOrigin
     *
     * @return  string|null
     */ 
    public function getBreedOrigin() : ?string
    {
        return $this->breedOrigin;
    }

    /**
     * Set the value of breedOrigin
     *
     * @param  string|null  $breedOrigin
     *
     * @return  self
     */ 
    public function setBreedOrigin(?string $breedOrigin) : self
    {
        $this->breedOrigin = $breedOrigin;

        return $this;
    }

    /**
     * Get the value of breedRare
     *
     * @return  int|null
     */ 
    public function getBreedRare() : ?int
    {
        return $this->breedRare;
    }

    /**
     * Set the value of breedRare
     *
     * @param  int|null  $breedRare
     *
     * @return  self
     */ 
    public function setBreedRare(?int $breedRare) : self
    {
        $this->breedRare = $breedRare;

        return $this;
    }

    /**
     * Get the value of breedReferenceImageId
     *
     * @return  string|null
     */ 
    public function getBreedReferenceImageId() : ?string
    {
        return $this->breedReferenceImageId;
    }

    /**
     * Set the value of breedReferenceImageId
     *
     * @param  string|null  $breedReferenceImageId
     *
     * @return  self
     */ 
    public function setBreedReferenceImageId(?string $breedReferenceImageId) : self
    {
        $this->breedReferenceImageId = $breedReferenceImageId;

        return $this;
    }

    /**
     * Get the value of breedRex
     *
     * @return  int|null
     */ 
    public function getBreedRex() : ?int
    {
        return $this->breedRex;
    }

    /**
     * Set the value of breedRex
     *
     * @param  int|null  $breedRex
     *
     * @return  self
     */ 
    public function setBreedRex(?int $breedRex) : self
    {
        $this->breedRex = $breedRex;

        return $this;
    }

    /**
     * Get the value of breedSheddingLevel
     *
     * @return  int|null
     */ 
    public function getBreedSheddingLevel() : ?int
    {
        return $this->breedSheddingLevel;
    }

    /**
     * Set the value of breedSheddingLevel
     *
     * @param  int|null  $breedSheddingLevel
     *
     * @return  self
     */ 
    public function setBreedSheddingLevel(?int $breedSheddingLevel) : self
    {
        $this->breedSheddingLevel = $breedSheddingLevel;

        return $this;
    }

    /**
     * Get the value of breedShortLegs
     *
     * @return  int|null
     */ 
    public function getBreedShortLegs() : ?int
    {
        return $this->breedShortLegs;
    }

    /**
     * Set the value of breedShortLegs
     *
     * @param  int|null  $breedShortLegs
     *
     * @return  self
     */ 
    public function setBreedShortLegs(?int $breedShortLegs) : self
    {
        $this->breedShortLegs = $breedShortLegs;

        return $this;
    }

    /**
     * Get the value of breedSocialNeeds
     *
     * @return  int|null
     */ 
    public function getBreedSocialNeeds() : ?int
    {
        return $this->breedSocialNeeds;
    }

    /**
     * Set the value of breedSocialNeeds
     *
     * @param  int|null  $breedSocialNeeds
     *
     * @return  self
     */ 
    public function setBreedSocialNeeds(?int $breedSocialNeeds) : self
    {
        $this->breedSocialNeeds = $breedSocialNeeds;

        return $this;
    }

    /**
     * Get the value of breedStrangerFriendly
     *
     * @return  int|null
     */ 
    public function getBreedStrangerFriendly() : ?int
    {
        return $this->breedStrangerFriendly;
    }

    /**
     * Set the value of breedStrangerFriendly
     *
     * @param  int|null  $breedStrangerFriendly
     *
     * @return  self
     */ 
    public function setBreedStrangerFriendly(?int $breedStrangerFriendly) : self
    {
        $this->breedStrangerFriendly = $breedStrangerFriendly;

        return $this;
    }

    /**
     * Get the value of breedSuppressedTail
     *
     * @return  int|null
     */ 
    public function getBreedSuppressedTail() : ?int
    {
        return $this->breedSuppressedTail;
    }

    /**
     * Set the value of breedSuppressedTail
     *
     * @param  int|null  $breedSuppressedTail
     *
     * @return  self
     */ 
    public function setBreedSuppressedTail(?int $breedSuppressedTail) : self
    {
        $this->breedSuppressedTail = $breedSuppressedTail;

        return $this;
    }

    /**
     * Get the value of breedTemperament
     *
     * @return  string|null
     */ 
    public function getBreedTemperament() : ?string
    {
        return $this->breedTemperament;
    }

    /**
     * Set the value of breedTemperament
     *
     * @param  string|null  $breedTemperament
     *
     * @return  self
     */ 
    public function setBreedTemperament(?string $breedTemperament) : self
    {
        $this->breedTemperament = $breedTemperament;

        return $this;
    }

    /**
     * Get the value of breedVcahospitalsUrl
     *
     * @return  string|null
     */ 
    public function getBreedVcahospitalsUrl() : ?string
    {
        return $this->breedVcahospitalsUrl;
    }

    /**
     * Set the value of breedVcahospitalsUrl
     *
     * @param  string|null  $breedVcahospitalsUrl
     *
     * @return  self
     */ 
    public function setBreedVcahospitalsUrl(?string $breedVcahospitalsUrl) : self
    {
        $this->breedVcahospitalsUrl = $breedVcahospitalsUrl;

        return $this;
    }

    /**
     * Get the value of breedVetstreetUrl
     *
     * @return  string|null
     */ 
    public function getBreedVetstreetUrl() : ?string
    {
        return $this->breedVetstreetUrl;
    }

    /**
     * Set the value of breedVetstreetUrl
     *
     * @param  string|null  $breedVetstreetUrl
     *
     * @return  self
     */ 
    public function setBreedVetstreetUrl(?string $breedVetstreetUrl) : self
    {
        $this->breedVetstreetUrl = $breedVetstreetUrl;

        return $this;
    }

    /**
     * Get the value of breedVocalisation
     *
     * @return  int|null
     */ 
    public function getBreedVocalisation() : ?int
    {
        return $this->breedVocalisation;
    }

    /**
     * Set the value of breedVocalisation
     *
     * @param  int|null  $breedVocalisation
     *
     * @return  self
     */ 
    public function setBreedVocalisation(?int $breedVocalisation) : self
    {
        $this->breedVocalisation = $breedVocalisation;

        return $this;
    }

    /**
     * Get the value of breedWikipediaUrl
     *
     * @return  string|null
     */ 
    public function getBreedWikipediaUrl() : ?string
    {
        return $this->breedWikipediaUrl;
    }

    /**
     * Set the value of breedWikipediaUrl
     *
     * @param  string|null  $breedWikipediaUrl
     *
     * @return  self
     */ 
    public function setBreedWikipediaUrl(?string $breedWikipediaUrl) : self
    {
        $this->breedWikipediaUrl = $breedWikipediaUrl;

        return $this;
    }

    /**
     * Get the value of breedWeightImperial
     *
     * @return  string|null
     */ 
    public function getBreedWeightImperial() : ?string
    {
        return $this->breedWeightImperial;
    }

    /**
     * Set the value of breedWeightImperial
     *
     * @param  string|null  $breedWeightImperial
     *
     * @return  self
     */ 
    public function setBreedWeightImperial(?string $breedWeightImperial) : self
    {
        $this->breedWeightImperial = $breedWeightImperial;

        return $this;
    }

    /**
     * Get the value of breedWeightMetric
     *
     * @return  string|null
     */ 
    public function getBreedWeightMetric() : ?string
    {
        return $this->breedWeightMetric;
    }

    /**
     * Set the value of breedWeightMetric
     *
     * @param  string|null  $breedWeightMetric
     *
     * @return  self
     */ 
    public function setBreedWeightMetric(?string $breedWeightMetric) : self
    {
        $this->breedWeightMetric = $breedWeightMetric;

        return $this;
    }
}
