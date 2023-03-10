<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * UserInfo
 *
 * @ORM\Table(name="playerhistory")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\PlayerHistoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PlayerHistory
{
    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Clan", inversedBy="players")
     * @ORM\JoinColumn(nullable=true)
     */
    private $clan;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer", nullable=true)
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalAttack", type="integer", nullable=true)
     */
    private $totalAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalDefence", type="integer", nullable=true)
     */
    private $totalDefence;


    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Player", inversedBy="playerhistories")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $player;


    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


    /**
     * @var integer
     *
     * @ORM\Column(name="darkElixir1", type="integer", nullable=true)
     */
    private $darkElixir1;

    /**
     * @var integer
     *
     * @ORM\Column(name="darkElixir2", type="integer", nullable=true)
     */
    private $darkElixir2;

    /**
     * @var integer
     *
     * @ORM\Column(name="darkElixir3", type="integer", nullable=true)
     */
    private $darkElixir3;

    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hall_town", type="integer", nullable=true)
     */
    private $hallTown  ;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_received", type="integer", nullable=true)
     */
    private $troopReceived;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_sent", type="integer", nullable=true)
     */
    private $troopSent;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack_won", type="integer", nullable=true)
     */
    private $attackWon;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="trophy", type="integer", nullable=true)
     */
    private $trophy;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon1", type="integer", nullable=true)
     */
    private $canon1;

    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence1", type="integer", nullable=true)
     */
    private $air_defence1;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence2", type="integer", nullable=true)
     */
    private $air_defence2;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence3", type="integer", nullable=true)
     */
    private $air_defence3;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence4", type="integer", nullable=true)
     */
    private $air_defence4;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon2", type="integer", nullable=true)
     */
    private $canon2;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon3", type="integer", nullable=true)
     */
    private $canon3;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon4", type="integer", nullable=true)
     */
    private $canon4;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon5", type="integer", nullable=true)
     */
    private $canon5;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon6", type="integer", nullable=true)
     */
    private $canon6;






    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer1", type="integer", nullable=true)
     */
    private $tower_archer1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer2", type="integer", nullable=true)
     */
    private $tower_archer2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer3", type="integer", nullable=true)
     */
    private $tower_archer3;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer4", type="integer", nullable=true)
     */
    private $tower_archer4;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer5", type="integer", nullable=true)
     */
    private $tower_archer5;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer6", type="integer", nullable=true)
     */
    private $tower_archer6;

    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer7", type="integer", nullable=true)
     */
    private $tower_archer7;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic1", type="integer", nullable=true)
     */
    private $tower_magic1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic2", type="integer", nullable=true)
     */
    private $tower_magic2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic3", type="integer", nullable=true)
     */
    private $tower_magic3;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic4", type="integer", nullable=true)
     */
    private $tower_magic4;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar1", type="integer", nullable=true)
     */
    private $mortar1;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar2", type="integer", nullable=true)
     */
    private $mortar2;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar3", type="integer", nullable=true)
     */
    private $mortar3;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar4", type="integer", nullable=true)
     */
    private $mortar4;

    /**
     * @var integer
     *
     * @ORM\Column(name="tesla1", type="integer", nullable=true)
     */
    private $tesla1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tesla2", type="integer", nullable=true)
     */
    private $tesla2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tesla3", type="integer", nullable=true)
     */
    private $tesla3;


    /**
     * @var integer
     *
     * @ORM\Column(name="tesla4", type="integer", nullable=true)
     */
    private $tesla4;


    /**
     * @var integer
     *
     * @ORM\Column(name="inferno1", type="integer", nullable=true)
     */
    private $inferno1;


    /**
     * @var integer
     *
     * @ORM\Column(name="inferno2", type="integer", nullable=true)
     */
    private $inferno2;


    /**
     * @var integer
     *
     * @ORM\Column(name="king", type="integer", nullable=true)
     */
    private $king;


    /**
     * @var integer
     *
     * @ORM\Column(name="queen", type="integer", nullable=true)
     */
    private $queen;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx1", type="integer", nullable=true)
     */
    private $arcx1;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx2", type="integer", nullable=true)
     */
    private $arcx2;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx3", type="integer", nullable=true)
     */
    private $arcx3;



    /**
     * @var integer
     *
     * @ORM\Column(name="archer", type="integer", nullable=true)
     */
    private $archer;


    /**
     * @var integer
     *
     * @ORM\Column(name="barbar", type="integer", nullable=true)
     */
    private $barbar;


    /**
     * @var integer
     *
     * @ORM\Column(name="gobelin", type="integer", nullable=true)
     */
    private $gobelin;

    /**
     * @var integer
     *
     * @ORM\Column(name="geant", type="integer", nullable=true)
     */
    private $geant;

    /**
     * @var integer
     *
     * @ORM\Column(name="wall_breaker", type="integer", nullable=true)
     */
    private $wall_breaker;


    /**
     * @var integer
     *
     * @ORM\Column(name="ballon", type="integer", nullable=true)
     */
    private $ballon;


    /**
     * @var integer
     *
     * @ORM\Column(name="wizard", type="integer", nullable=true)
     */
    private $wizard;


    /**
     * @var integer
     *
     * @ORM\Column(name="healer", type="integer", nullable=true)
     */
    private $healer;


    /**
     * @var integer
     *
     * @ORM\Column(name="dragon", type="integer", nullable=true)
     */
    private $dragon;


    /**
     * @var integer
     *
     * @ORM\Column(name="pekka", type="integer", nullable=true)
     */
    private $pekka;

    /**
     * @var integer
     *
     * @ORM\Column(name="minion", type="integer", nullable=true)
     */
    private $minion;

    /**
     * @var integer
     *
     * @ORM\Column(name="rider", type="integer", nullable=true)
     */
    private $rider;


    /**
     * @var integer
     *
     * @ORM\Column(name="valkyrie", type="integer", nullable=true)
     */
    private $valkyrie;


    /**
     * @var integer
     *
     * @ORM\Column(name="golem", type="integer", nullable=true)
     */
    private $golem;


    /**
     * @var integer
     *
     * @ORM\Column(name="witch", type="integer", nullable=true)
     */
    private $witch;

    /**
     * @var integer
     *
     * @ORM\Column(name="lava", type="integer", nullable=true)
     */
    private $lava;



    /**
     * @var integer
     *
     * @ORM\Column(name="potion_heal", type="integer", nullable=true)
     */
    private $potion_heal;


    /**
     * @var integer
     *
     * @ORM\Column(name="potion_boost", type="integer", nullable=true)
     */
    private $potion_boost;



    /**
     * @var integer
     *
     * @ORM\Column(name="potion_damage", type="integer", nullable=true)
     */
    private $potion_damage;


    /**
     * @var integer
     *
     * @ORM\Column(name="potion_green", type="integer", nullable=true)
     */
    private $potion_green;

    /**
     * @var integer
     *
     * @ORM\Column(name="potion_freeze", type="integer", nullable=true)
     */
    private $potion_freeze;


    /**
     * @var integer
     *
     * @ORM\Column(name="gold1", type="integer", nullable=true)
     */
    private $gold1;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold2", type="integer", nullable=true)
     */
    private $gold2;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold3", type="integer", nullable=true)
     */
    private $gold3;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold4", type="integer", nullable=true)
     */
    private $gold4;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold5", type="integer", nullable=true)
     */
    private $gold5;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold6", type="integer", nullable=true)
     */

    private $gold6;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold7", type="integer", nullable=true)
     */
    private $gold7;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir1", type="integer", nullable=true)
     */
    private $elixir1;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir2", type="integer", nullable=true)
     */
    private $elixir2;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir3", type="integer", nullable=true)
     */
    private $elixir3;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir4", type="integer", nullable=true)
     */
    private $elixir4;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir5", type="integer", nullable=true)
     */
    private $elixir5;
    /**
     * @var integer
     *
     * @ORM\Column(name="elixir6", type="integer", nullable=true)
     */
    private $elixir6;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir7", type="integer", nullable=true)
     */
    private $elixir7;



    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Season", inversedBy="playerHistory")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id", nullable=true)
     */
    private $season;




    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Player
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Set name
     *
     * @param string $name
     * @return PlayerHistory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hallTown
     *
     * @param integer $hallTown
     * @return PlayerHistory
     */
    public function setHallTown($hallTown)
    {
        $this->hallTown = $hallTown;

        return $this;
    }

    /**
     * Get hallTown
     *
     * @return integer
     */
    public function getHallTown()
    {
        return $this->hallTown;
    }

    /**
     * Set troopReceived
     *
     * @param integer $troopReceived
     * @return PlayerHistory
     */
    public function setTroopReceived($troopReceived)
    {
        $this->troopReceived = $troopReceived;

        return $this;
    }

    /**
     * Get troopReceived
     *
     * @return integer
     */
    public function getTroopReceived()
    {
        return $this->troopReceived;
    }

    /**
     * Set troopSent
     *
     * @param integer $troopSent
     * @return PlayerHistory
     */
    public function setTroopSent($troopSent)
    {
        $this->troopSent = $troopSent;

        return $this;
    }

    /**
     * Get troopSent
     *
     * @return integer
     */
    public function getTroopSent()
    {
        return $this->troopSent;
    }

    /**
     * Set attackWon
     *
     * @param integer $attackWon
     * @return PlayerHistory
     */
    public function setAttackWon($attackWon)
    {
        $this->attackWon = $attackWon;

        return $this;
    }

    /**
     * Get attackWon
     *
     * @return integer
     */
    public function getAttackWon()
    {
        return $this->attackWon;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return PlayerHistory
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set trophy
     *
     * @param integer $trophy
     * @return PlayerHistory
     */
    public function setTrophy($trophy)
    {
        $this->trophy = $trophy;

        return $this;
    }

    /**
     * Get trophy
     *
     * @return integer
     */
    public function getTrophy()
    {
        return $this->trophy;
    }

    /**
     * Set canon1
     *
     * @param integer $canon1
     * @return PlayerHistory
     */
    public function setCanon1($canon1)
    {
        $this->canon1 = $canon1;

        return $this;
    }

    /**
     * Get canon1
     *
     * @return integer
     */
    public function getCanon1()
    {
        return $this->canon1;
    }

    /**
     * Set air_defence1
     *
     * @param integer $airDefence1
     * @return PlayerHistory
     */
    public function setAirDefence1($airDefence1)
    {
        $this->air_defence1 = $airDefence1;

        return $this;
    }

    /**
     * Get air_defence1
     *
     * @return integer
     */
    public function getAirDefence1()
    {
        return $this->air_defence1;
    }

    /**
     * Set air_defence2
     *
     * @param integer $airDefence2
     * @return PlayerHistory
     */
    public function setAirDefence2($airDefence2)
    {
        $this->air_defence2 = $airDefence2;

        return $this;
    }

    /**
     * Get air_defence2
     *
     * @return integer
     */
    public function getAirDefence2()
    {
        return $this->air_defence2;
    }

    /**
     * Set air_defence3
     *
     * @param integer $airDefence3
     * @return PlayerHistory
     */
    public function setAirDefence3($airDefence3)
    {
        $this->air_defence3 = $airDefence3;

        return $this;
    }

    /**
     * Get air_defence3
     *
     * @return integer
     */
    public function getAirDefence3()
    {
        return $this->air_defence3;
    }

    /**
     * Set air_defence4
     *
     * @param integer $airDefence4
     * @return PlayerHistory
     */
    public function setAirDefence4($airDefence4)
    {
        $this->air_defence4 = $airDefence4;

        return $this;
    }

    /**
     * Get air_defence4
     *
     * @return integer
     */
    public function getAirDefence4()
    {
        return $this->air_defence4;
    }

    /**
     * Set canon2
     *
     * @param integer $canon2
     * @return PlayerHistory
     */
    public function setCanon2($canon2)
    {
        $this->canon2 = $canon2;

        return $this;
    }

    /**
     * Get canon2
     *
     * @return integer
     */
    public function getCanon2()
    {
        return $this->canon2;
    }

    /**
     * Set canon3
     *
     * @param integer $canon3
     * @return PlayerHistory
     */
    public function setCanon3($canon3)
    {
        $this->canon3 = $canon3;

        return $this;
    }

    /**
     * Get canon3
     *
     * @return integer
     */
    public function getCanon3()
    {
        return $this->canon3;
    }

    /**
     * Set canon4
     *
     * @param integer $canon4
     * @return PlayerHistory
     */
    public function setCanon4($canon4)
    {
        $this->canon4 = $canon4;

        return $this;
    }

    /**
     * Get canon4
     *
     * @return integer
     */
    public function getCanon4()
    {
        return $this->canon4;
    }

    /**
     * Set canon5
     *
     * @param integer $canon5
     * @return PlayerHistory
     */
    public function setCanon5($canon5)
    {
        $this->canon5 = $canon5;

        return $this;
    }

    /**
     * Get canon5
     *
     * @return integer
     */
    public function getCanon5()
    {
        return $this->canon5;
    }

    /**
     * Set canon6
     *
     * @param integer $canon6
     * @return PlayerHistory
     */
    public function setCanon6($canon6)
    {
        $this->canon6 = $canon6;

        return $this;
    }

    /**
     * Get canon6
     *
     * @return integer
     */
    public function getCanon6()
    {
        return $this->canon6;
    }

    /**
     * Set tower_archer1
     *
     * @param integer $towerArcher1
     * @return PlayerHistory
     */
    public function setTowerArcher1($towerArcher1)
    {
        $this->tower_archer1 = $towerArcher1;

        return $this;
    }

    /**
     * Get tower_archer1
     *
     * @return integer
     */
    public function getTowerArcher1()
    {
        return $this->tower_archer1;
    }

    /**
     * Set tower_archer2
     *
     * @param integer $towerArcher2
     * @return PlayerHistory
     */
    public function setTowerArcher2($towerArcher2)
    {
        $this->tower_archer2 = $towerArcher2;

        return $this;
    }

    /**
     * Get tower_archer2
     *
     * @return integer
     */
    public function getTowerArcher2()
    {
        return $this->tower_archer2;
    }

    /**
     * Set tower_archer3
     *
     * @param integer $towerArcher3
     * @return PlayerHistory
     */
    public function setTowerArcher3($towerArcher3)
    {
        $this->tower_archer3 = $towerArcher3;

        return $this;
    }

    /**
     * Get tower_archer3
     *
     * @return integer
     */
    public function getTowerArcher3()
    {
        return $this->tower_archer3;
    }

    /**
     * Set tower_archer4
     *
     * @param integer $towerArcher4
     * @return PlayerHistory
     */
    public function setTowerArcher4($towerArcher4)
    {
        $this->tower_archer4 = $towerArcher4;

        return $this;
    }

    /**
     * Get tower_archer4
     *
     * @return integer
     */
    public function getTowerArcher4()
    {
        return $this->tower_archer4;
    }

    /**
     * Set tower_archer5
     *
     * @param integer $towerArcher5
     * @return PlayerHistory
     */
    public function setTowerArcher5($towerArcher5)
    {
        $this->tower_archer5 = $towerArcher5;

        return $this;
    }

    /**
     * Get tower_archer5
     *
     * @return integer
     */
    public function getTowerArcher5()
    {
        return $this->tower_archer5;
    }

    /**
     * Set tower_archer6
     *
     * @param integer $towerArcher6
     * @return PlayerHistory
     */
    public function setTowerArcher6($towerArcher6)
    {
        $this->tower_archer6 = $towerArcher6;

        return $this;
    }

    /**
     * Get tower_archer6
     *
     * @return integer
     */
    public function getTowerArcher6()
    {
        return $this->tower_archer6;
    }

    /**
     * Set tower_archer7
     *
     * @param integer $towerArcher7
     * @return PlayerHistory
     */
    public function setTowerArcher7($towerArcher7)
    {
        $this->tower_archer7 = $towerArcher7;

        return $this;
    }

    /**
     * Get tower_archer7
     *
     * @return integer
     */
    public function getTowerArcher7()
    {
        return $this->tower_archer7;
    }

    /**
     * Set tower_magic1
     *
     * @param integer $towerMagic1
     * @return PlayerHistory
     */
    public function setTowerMagic1($towerMagic1)
    {
        $this->tower_magic1 = $towerMagic1;

        return $this;
    }

    /**
     * Get tower_magic1
     *
     * @return integer
     */
    public function getTowerMagic1()
    {
        return $this->tower_magic1;
    }

    /**
     * Set tower_magic2
     *
     * @param integer $towerMagic2
     * @return PlayerHistory
     */
    public function setTowerMagic2($towerMagic2)
    {
        $this->tower_magic2 = $towerMagic2;

        return $this;
    }

    /**
     * Get tower_magic2
     *
     * @return integer
     */
    public function getTowerMagic2()
    {
        return $this->tower_magic2;
    }

    /**
     * Set tower_magic3
     *
     * @param integer $towerMagic3
     * @return PlayerHistory
     */
    public function setTowerMagic3($towerMagic3)
    {
        $this->tower_magic3 = $towerMagic3;

        return $this;
    }

    /**
     * Get tower_magic3
     *
     * @return integer
     */
    public function getTowerMagic3()
    {
        return $this->tower_magic3;
    }

    /**
     * Set tower_magic4
     *
     * @param integer $towerMagic4
     * @return PlayerHistory
     */
    public function setTowerMagic4($towerMagic4)
    {
        $this->tower_magic4 = $towerMagic4;

        return $this;
    }

    /**
     * Get tower_magic4
     *
     * @return integer
     */
    public function getTowerMagic4()
    {
        return $this->tower_magic4;
    }

    /**
     * Set mortar1
     *
     * @param integer $mortar1
     * @return PlayerHistory
     */
    public function setMortar1($mortar1)
    {
        $this->mortar1 = $mortar1;

        return $this;
    }

    /**
     * Get mortar1
     *
     * @return integer
     */
    public function getMortar1()
    {
        return $this->mortar1;
    }

    /**
     * Set mortar2
     *
     * @param integer $mortar2
     * @return PlayerHistory
     */
    public function setMortar2($mortar2)
    {
        $this->mortar2 = $mortar2;

        return $this;
    }

    /**
     * Get mortar2
     *
     * @return integer
     */
    public function getMortar2()
    {
        return $this->mortar2;
    }

    /**
     * Set mortar3
     *
     * @param integer $mortar3
     * @return PlayerHistory
     */
    public function setMortar3($mortar3)
    {
        $this->mortar3 = $mortar3;

        return $this;
    }

    /**
     * Get mortar3
     *
     * @return integer
     */
    public function getMortar3()
    {
        return $this->mortar3;
    }

    /**
     * Set mortar4
     *
     * @param integer $mortar4
     * @return PlayerHistory
     */
    public function setMortar4($mortar4)
    {
        $this->mortar4 = $mortar4;

        return $this;
    }

    /**
     * Get mortar4
     *
     * @return integer
     */
    public function getMortar4()
    {
        return $this->mortar4;
    }

    /**
     * Set tesla1
     *
     * @param integer $tesla1
     * @return PlayerHistory
     */
    public function setTesla1($tesla1)
    {
        $this->tesla1 = $tesla1;

        return $this;
    }

    /**
     * Get tesla1
     *
     * @return integer
     */
    public function getTesla1()
    {
        return $this->tesla1;
    }

    /**
     * Set tesla2
     *
     * @param integer $tesla2
     * @return PlayerHistory
     */
    public function setTesla2($tesla2)
    {
        $this->tesla2 = $tesla2;

        return $this;
    }

    /**
     * Get tesla2
     *
     * @return integer
     */
    public function getTesla2()
    {
        return $this->tesla2;
    }

    /**
     * Set tesla3
     *
     * @param integer $tesla3
     * @return PlayerHistory
     */
    public function setTesla3($tesla3)
    {
        $this->tesla3 = $tesla3;

        return $this;
    }

    /**
     * Get tesla3
     *
     * @return integer
     */
    public function getTesla3()
    {
        return $this->tesla3;
    }

    /**
     * Set tesla4
     *
     * @param integer $tesla4
     * @return PlayerHistory
     */
    public function setTesla4($tesla4)
    {
        $this->tesla4 = $tesla4;

        return $this;
    }

    /**
     * Get tesla4
     *
     * @return integer
     */
    public function getTesla4()
    {
        return $this->tesla4;
    }

    /**
     * Set inferno1
     *
     * @param integer $inferno1
     * @return PlayerHistory
     */
    public function setInferno1($inferno1)
    {
        $this->inferno1 = $inferno1;

        return $this;
    }

    /**
     * Get inferno1
     *
     * @return integer
     */
    public function getInferno1()
    {
        return $this->inferno1;
    }

    /**
     * Set inferno2
     *
     * @param integer $inferno2
     * @return PlayerHistory
     */
    public function setInferno2($inferno2)
    {
        $this->inferno2 = $inferno2;

        return $this;
    }

    /**
     * Get inferno2
     *
     * @return integer
     */
    public function getInferno2()
    {
        return $this->inferno2;
    }

    /**
     * Set king
     *
     * @param integer $king
     * @return PlayerHistory
     */
    public function setKing($king)
    {
        $this->king = $king;

        return $this;
    }

    /**
     * Get king
     *
     * @return integer
     */
    public function getKing()
    {
        return $this->king;
    }

    /**
     * Set queen
     *
     * @param integer $queen
     * @return PlayerHistory
     */
    public function setQueen($queen)
    {
        $this->queen = $queen;

        return $this;
    }

    /**
     * Get queen
     *
     * @return integer
     */
    public function getQueen()
    {
        return $this->queen;
    }

    /**
     * Set arcx1
     *
     * @param integer $arcx1
     * @return PlayerHistory
     */
    public function setArcx1($arcx1)
    {
        $this->arcx1 = $arcx1;

        return $this;
    }

    /**
     * Get arcx1
     *
     * @return integer
     */
    public function getArcx1()
    {
        return $this->arcx1;
    }

    /**
     * Set arcx2
     *
     * @param integer $arcx2
     * @return PlayerHistory
     */
    public function setArcx2($arcx2)
    {
        $this->arcx2 = $arcx2;

        return $this;
    }

    /**
     * Get arcx2
     *
     * @return integer
     */
    public function getArcx2()
    {
        return $this->arcx2;
    }

    /**
     * Set arcx3
     *
     * @param integer $arcx3
     * @return PlayerHistory
     */
    public function setArcx3($arcx3)
    {
        $this->arcx3 = $arcx3;

        return $this;
    }

    /**
     * Get arcx3
     *
     * @return integer
     */
    public function getArcx3()
    {
        return $this->arcx3;
    }

    /**
     * Set archer
     *
     * @param integer $archer
     * @return PlayerHistory
     */
    public function setArcher($archer)
    {
        $this->archer = $archer;

        return $this;
    }

    /**
     * Get archer
     *
     * @return integer
     */
    public function getArcher()
    {
        return $this->archer;
    }

    /**
     * Set barbar
     *
     * @param integer $barbar
     * @return PlayerHistory
     */
    public function setBarbar($barbar)
    {
        $this->barbar = $barbar;

        return $this;
    }

    /**
     * Get barbar
     *
     * @return integer
     */
    public function getBarbar()
    {
        return $this->barbar;
    }

    /**
     * Set gobelin
     *
     * @param integer $gobelin
     * @return PlayerHistory
     */
    public function setGobelin($gobelin)
    {
        $this->gobelin = $gobelin;

        return $this;
    }

    /**
     * Get gobelin
     *
     * @return integer
     */
    public function getGobelin()
    {
        return $this->gobelin;
    }

    /**
     * Set geant
     *
     * @param integer $geant
     * @return PlayerHistory
     */
    public function setGeant($geant)
    {
        $this->geant = $geant;

        return $this;
    }

    /**
     * Get geant
     *
     * @return integer
     */
    public function getGeant()
    {
        return $this->geant;
    }

    /**
     * Set wall_breaker
     *
     * @param integer $wallBreaker
     * @return PlayerHistory
     */
    public function setWallBreaker($wallBreaker)
    {
        $this->wall_breaker = $wallBreaker;

        return $this;
    }

    /**
     * Get wall_breaker
     *
     * @return integer
     */
    public function getWallBreaker()
    {
        return $this->wall_breaker;
    }

    /**
     * Set ballon
     *
     * @param integer $ballon
     * @return PlayerHistory
     */
    public function setBallon($ballon)
    {
        $this->ballon = $ballon;

        return $this;
    }

    /**
     * Get ballon
     *
     * @return integer
     */
    public function getBallon()
    {
        return $this->ballon;
    }

    /**
     * Set wizard
     *
     * @param integer $wizard
     * @return PlayerHistory
     */
    public function setWizard($wizard)
    {
        $this->wizard = $wizard;

        return $this;
    }

    /**
     * Get wizard
     *
     * @return integer
     */
    public function getWizard()
    {
        return $this->wizard;
    }

    /**
     * Set healer
     *
     * @param integer $healer
     * @return PlayerHistory
     */
    public function setHealer($healer)
    {
        $this->healer = $healer;

        return $this;
    }

    /**
     * Get healer
     *
     * @return integer
     */
    public function getHealer()
    {
        return $this->healer;
    }

    /**
     * Set dragon
     *
     * @param integer $dragon
     * @return PlayerHistory
     */
    public function setDragon($dragon)
    {
        $this->dragon = $dragon;

        return $this;
    }

    /**
     * Get dragon
     *
     * @return integer
     */
    public function getDragon()
    {
        return $this->dragon;
    }

    /**
     * Set pekka
     *
     * @param integer $pekka
     * @return PlayerHistory
     */
    public function setPekka($pekka)
    {
        $this->pekka = $pekka;

        return $this;
    }

    /**
     * Get pekka
     *
     * @return integer
     */
    public function getPekka()
    {
        return $this->pekka;
    }

    /**
     * Set minion
     *
     * @param integer $minion
     * @return PlayerHistory
     */
    public function setMinion($minion)
    {
        $this->minion = $minion;

        return $this;
    }

    /**
     * Get minion
     *
     * @return integer
     */
    public function getMinion()
    {
        return $this->minion;
    }

    /**
     * Set rider
     *
     * @param integer $rider
     * @return PlayerHistory
     */
    public function setRider($rider)
    {
        $this->rider = $rider;

        return $this;
    }

    /**
     * Get rider
     *
     * @return integer
     */
    public function getRider()
    {
        return $this->rider;
    }

    /**
     * Set valkyrie
     *
     * @param integer $valkyrie
     * @return PlayerHistory
     */
    public function setValkyrie($valkyrie)
    {
        $this->valkyrie = $valkyrie;

        return $this;
    }

    /**
     * Get valkyrie
     *
     * @return integer
     */
    public function getValkyrie()
    {
        return $this->valkyrie;
    }

    /**
     * Set golem
     *
     * @param integer $golem
     * @return PlayerHistory
     */
    public function setGolem($golem)
    {
        $this->golem = $golem;

        return $this;
    }

    /**
     * Get golem
     *
     * @return integer
     */
    public function getGolem()
    {
        return $this->golem;
    }

    /**
     * Set witch
     *
     * @param integer $witch
     * @return PlayerHistory
     */
    public function setWitch($witch)
    {
        $this->witch = $witch;

        return $this;
    }

    /**
     * Get witch
     *
     * @return integer
     */
    public function getWitch()
    {
        return $this->witch;
    }

    /**
     * Set lava
     *
     * @param integer $lava
     * @return PlayerHistory
     */
    public function setLava($lava)
    {
        $this->lava = $lava;

        return $this;
    }

    /**
     * Get lava
     *
     * @return integer
     */
    public function getLava()
    {
        return $this->lava;
    }

    /**
     * Set potion_heal
     *
     * @param integer $potionHeal
     * @return PlayerHistory
     */
    public function setPotionHeal($potionHeal)
    {
        $this->potion_heal = $potionHeal;

        return $this;
    }

    /**
     * Get potion_heal
     *
     * @return integer
     */
    public function getPotionHeal()
    {
        return $this->potion_heal;
    }

    /**
     * Set potion_boost
     *
     * @param integer $potionBoost
     * @return PlayerHistory
     */
    public function setPotionBoost($potionBoost)
    {
        $this->potion_boost = $potionBoost;

        return $this;
    }

    /**
     * Get potion_boost
     *
     * @return integer
     */
    public function getPotionBoost()
    {
        return $this->potion_boost;
    }

    /**
     * Set potion_damage
     *
     * @param integer $potionDamage
     * @return PlayerHistory
     */
    public function setPotionDamage($potionDamage)
    {
        $this->potion_damage = $potionDamage;

        return $this;
    }

    /**
     * Get potion_damage
     *
     * @return integer
     */
    public function getPotionDamage()
    {
        return $this->potion_damage;
    }

    /**
     * Set potion_green
     *
     * @param integer $potionGreen
     * @return PlayerHistory
     */
    public function setPotionGreen($potionGreen)
    {
        $this->potion_green = $potionGreen;

        return $this;
    }

    /**
     * Get potion_green
     *
     * @return integer
     */
    public function getPotionGreen()
    {
        return $this->potion_green;
    }

    /**
     * Set potion_freeze
     *
     * @param integer $potionFreeze
     * @return PlayerHistory
     */
    public function setPotionFreeze($potionFreeze)
    {
        $this->potion_freeze = $potionFreeze;

        return $this;
    }

    /**
     * Get potion_freeze
     *
     * @return integer
     */
    public function getPotionFreeze()
    {
        return $this->potion_freeze;
    }

    /**
     * Set gold1
     *
     * @param integer $gold1
     * @return PlayerHistory
     */
    public function setGold1($gold1)
    {
        $this->gold1 = $gold1;

        return $this;
    }

    /**
     * Get gold1
     *
     * @return integer
     */
    public function getGold1()
    {
        return $this->gold1;
    }

    /**
     * Set gold2
     *
     * @param integer $gold2
     * @return PlayerHistory
     */
    public function setGold2($gold2)
    {
        $this->gold2 = $gold2;

        return $this;
    }

    /**
     * Get gold2
     *
     * @return integer
     */
    public function getGold2()
    {
        return $this->gold2;
    }

    /**
     * Set gold3
     *
     * @param integer $gold3
     * @return PlayerHistory
     */
    public function setGold3($gold3)
    {
        $this->gold3 = $gold3;

        return $this;
    }

    /**
     * Get gold3
     *
     * @return integer
     */
    public function getGold3()
    {
        return $this->gold3;
    }

    /**
     * Set gold4
     *
     * @param integer $gold4
     * @return PlayerHistory
     */
    public function setGold4($gold4)
    {
        $this->gold4 = $gold4;

        return $this;
    }

    /**
     * Get gold4
     *
     * @return integer
     */
    public function getGold4()
    {
        return $this->gold4;
    }

    /**
     * Set gold5
     *
     * @param integer $gold5
     * @return PlayerHistory
     */
    public function setGold5($gold5)
    {
        $this->gold5 = $gold5;

        return $this;
    }

    /**
     * Get gold5
     *
     * @return integer
     */
    public function getGold5()
    {
        return $this->gold5;
    }

    /**
     * Set gold6
     *
     * @param integer $gold6
     * @return PlayerHistory
     */
    public function setGold6($gold6)
    {
        $this->gold6 = $gold6;

        return $this;
    }

    /**
     * Get gold6
     *
     * @return integer
     */
    public function getGold6()
    {
        return $this->gold6;
    }

    /**
     * Set gold7
     *
     * @param integer $gold7
     * @return PlayerHistory
     */
    public function setGold7($gold7)
    {
        $this->gold7 = $gold7;

        return $this;
    }

    /**
     * Get gold7
     *
     * @return integer
     */
    public function getGold7()
    {
        return $this->gold7;
    }

    /**
     * Set elixir1
     *
     * @param integer $elixir1
     * @return PlayerHistory
     */
    public function setElixir1($elixir1)
    {
        $this->elixir1 = $elixir1;

        return $this;
    }

    /**
     * Get elixir1
     *
     * @return integer
     */
    public function getElixir1()
    {
        return $this->elixir1;
    }

    /**
     * Set elixir2
     *
     * @param integer $elixir2
     * @return PlayerHistory
     */
    public function setElixir2($elixir2)
    {
        $this->elixir2 = $elixir2;

        return $this;
    }

    /**
     * Get elixir2
     *
     * @return integer
     */
    public function getElixir2()
    {
        return $this->elixir2;
    }

    /**
     * Set elixir3
     *
     * @param integer $elixir3
     * @return PlayerHistory
     */
    public function setElixir3($elixir3)
    {
        $this->elixir3 = $elixir3;

        return $this;
    }

    /**
     * Get elixir3
     *
     * @return integer
     */
    public function getElixir3()
    {
        return $this->elixir3;
    }

    /**
     * Set elixir4
     *
     * @param integer $elixir4
     * @return PlayerHistory
     */
    public function setElixir4($elixir4)
    {
        $this->elixir4 = $elixir4;

        return $this;
    }

    /**
     * Get elixir4
     *
     * @return integer
     */
    public function getElixir4()
    {
        return $this->elixir4;
    }

    /**
     * Set elixir5
     *
     * @param integer $elixir5
     * @return PlayerHistory
     */
    public function setElixir5($elixir5)
    {
        $this->elixir5 = $elixir5;

        return $this;
    }

    /**
     * Get elixir5
     *
     * @return integer
     */
    public function getElixir5()
    {
        return $this->elixir5;
    }

    /**
     * Set elixir6
     *
     * @param integer $elixir6
     * @return PlayerHistory
     */
    public function setElixir6($elixir6)
    {
        $this->elixir6 = $elixir6;

        return $this;
    }

    /**
     * Get elixir6
     *
     * @return integer
     */
    public function getElixir6()
    {
        return $this->elixir6;
    }

    /**
     * Set elixir7
     *
     * @param integer $elixir7
     * @return PlayerHistory
     */
    public function setElixir7($elixir7)
    {
        $this->elixir7 = $elixir7;

        return $this;
    }

    /**
     * Get elixir7
     *
     * @return integer
     */
    public function getElixir7()
    {
        return $this->elixir7;
    }

    /**
     * Set clan
     *
     * @param \COC\COCBundle\Entity\Clan $clan
     * @return PlayerHistory
     */
    public function setClan(\COC\COCBundle\Entity\Clan $clan = null)
    {
        $this->clan = $clan;

        return $this;
    }

    /**
     * Get clan
     *
     * @return \COC\COCBundle\Entity\Clan
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * Set season
     *
     * @param \COC\COCBundle\Entity\Season $season
     * @return PlayerHistory
     */
    public function setSeason(\COC\COCBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return \COC\COCBundle\Entity\Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set player
     *
     * @param \COC\COCBundle\Entity\Player $player
     * @return PlayerHistory
     */
    public function setPlayer(\COC\COCBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \COC\COCBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return PlayerHistory
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set totalAttack
     *
     * @param integer $totalAttack
     * @return PlayerHistory
     */
    public function setTotalAttack($totalAttack)
    {
        $this->totalAttack = $totalAttack;

        return $this;
    }

    /**
     * Get totalAttack
     *
     * @return integer
     */
    public function getTotalAttack()
    {
        return $this->totalAttack;
    }

    /**
     * Set totalDefence
     *
     * @param integer $totalDefence
     * @return PlayerHistory
     */
    public function setTotalDefence($totalDefence)
    {
        $this->totalDefence = $totalDefence;

        return $this;
    }

    /**
     * Get totalDefence
     *
     * @return integer
     */
    public function getTotalDefence()
    {
        return $this->totalDefence;
    }

    /**
     * Set darkElixir1
     *
     * @param integer $darkElixir1
     * @return PlayerHistory
     */
    public function setDarkElixir1($darkElixir1)
    {
        $this->darkElixir1 = $darkElixir1;

        return $this;
    }

    /**
     * Get darkElixir1
     *
     * @return integer 
     */
    public function getDarkElixir1()
    {
        return $this->darkElixir1;
    }

    /**
     * Set darkElixir2
     *
     * @param integer $darkElixir2
     * @return PlayerHistory
     */
    public function setDarkElixir2($darkElixir2)
    {
        $this->darkElixir2 = $darkElixir2;

        return $this;
    }

    /**
     * Get darkElixir2
     *
     * @return integer 
     */
    public function getDarkElixir2()
    {
        return $this->darkElixir2;
    }

    /**
     * Set darkElixir3
     *
     * @param integer $darkElixir3
     * @return PlayerHistory
     */
    public function setDarkElixir3($darkElixir3)
    {
        $this->darkElixir3 = $darkElixir3;

        return $this;
    }

    /**
     * Get darkElixir3
     *
     * @return integer 
     */
    public function getDarkElixir3()
    {
        return $this->darkElixir3;
    }
}
