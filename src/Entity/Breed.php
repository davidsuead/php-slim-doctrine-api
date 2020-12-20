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


}
