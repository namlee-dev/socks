<?php

namespace Socks\Models;

use Socks\Utils\Database;
use PDO;

class Size extends CoreModel
{
    private $general;
    private $total;
    private $caston;
    private $castonTotal;
    private $toeRepeat;
    private $gussetRepeat;
    private $gussetSole;
    private $gussetTotal;
    private $turnR1Principal;
    private $turnR1Contrasting;
    private $turn;
    private $turnRepeat;
    private $turnTotal;
    private $flapR1;
    private $flapR2;
    private $flapSide;
    private $flapCenter;

    /**
     * Find 1 size by his name
     *
     * @param [string] $size_name
     * @return self
     */
    public static function find(string $size_name)
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM `size` WHERE `name` = :name ;";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->bindValue(':name', $size_name, PDO::PARAM_STR);
        $pdoStatement->execute();
        $size = $pdoStatement->fetchObject(Size::class);

        return $size;
    }

    /**
     * Find all sizes
     *
     * @return self[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM `size` ;";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->execute();
        $sizeList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Size::class);

        return $sizeList;
    }

    /**
     * Get the value of general
     */
    public function getGeneral()
    {
        return $this->general;
    }

    /**
     * Set the value of general
     *
     * @return  self
     */
    public function setGeneral($general)
    {
        $this->general = $general;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of toeRepeat
     */
    public function getToeRepeat()
    {
        return $this->toeRepeat;
    }

    /**
     * Set the value of toeRepeat
     *
     * @return  self
     */
    public function setToeRepeat($toeRepeat)
    {
        $this->toeRepeat = $toeRepeat;

        return $this;
    }

    /**
     * Get the value of GussetSole
     */
    public function getGussetSole()
    {
        return $this->gussetSole;
    }

    /**
     * Set the value of GussetSole
     *
     * @return  self
     */
    public function setGussetSole($gussetSole)
    {
        $this->gussetSole = $gussetSole;

        return $this;
    }

    /**
     * Get the value of gussetTotal
     */
    public function getGussetTotal()
    {
        return $this->gussetTotal;
    }

    /**
     * Set the value of gussetTotal
     *
     * @return  self
     */
    public function setGussetTotal($gussetTotal)
    {
        $this->gussetTotal = $gussetTotal;

        return $this;
    }

    /**
     * Get the value of turnR1Principal
     */
    public function getTurnR1Principal()
    {
        return $this->turnR1Principal;
    }

    /**
     * Set the value of turnR1Principal
     *
     * @return  self
     */
    public function setTurnR1Principal($turnR1Principal)
    {
        $this->turnR1Principal = $turnR1Principal;

        return $this;
    }

    /**
     * Get the value of turnR1Contrasting
     */
    public function getTurnR1Contrasting()
    {
        return $this->turnR1Contrasting;
    }

    /**
     * Set the value of turnR1Contrasting
     *
     * @return  self
     */
    public function setTurnR1Contrasting($turnR1Contrasting)
    {
        $this->turnR1Contrasting = $turnR1Contrasting;

        return $this;
    }

    /**
     * Get the value of turn
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * Set the value of turn
     *
     * @return  self
     */
    public function setTurn($turn)
    {
        $this->turn = $turn;

        return $this;
    }

    /**
     * Get the value of turnRepeat
     */
    public function getTurnRepeat()
    {
        return $this->turnRepeat;
    }

    /**
     * Set the value of turnRepeat
     *
     * @return  self
     */
    public function setTurnRepeat($turnRepeat)
    {
        $this->turnRepeat = $turnRepeat;

        return $this;
    }

    /**
     * Get the value of turnTotal
     */
    public function getTurnTotal()
    {
        return $this->turnTotal;
    }

    /**
     * Set the value of turnTotal
     *
     * @return  self
     */
    public function setTurnTotal($turnTotal)
    {
        $this->turnTotal = $turnTotal;

        return $this;
    }

    /**
     * Get the value of flapR1
     */
    public function getFlapR1()
    {
        return $this->flapR1;
    }

    /**
     * Set the value of flapR1
     *
     * @return  self
     */
    public function setFlapR1($flapR1)
    {
        $this->flapR1 = $flapR1;

        return $this;
    }

    /**
     * Get the value of flapR2
     */
    public function getFlapR2()
    {
        return $this->flapR2;
    }

    /**
     * Set the value of flapR2
     *
     * @return  self
     */
    public function setFlapR2($flapR2)
    {
        $this->flapR2 = $flapR2;

        return $this;
    }

    /**
     * Get the value of gussetRepeat
     */
    public function getGussetRepeat()
    {
        return $this->gussetRepeat;
    }

    /**
     * Set the value of gussetRepeat
     *
     * @return  self
     */
    public function setGussetRepeat($gussetRepeat)
    {
        $this->gussetRepeat = $gussetRepeat;

        return $this;
    }

    /**
     * Get the value of flapCenter
     */
    public function getFlapCenter()
    {
        return $this->flapCenter;
    }

    /**
     * Set the value of flapCenter
     *
     * @return  self
     */
    public function setFlapCenter($flapCenter)
    {
        $this->flapCenter = $flapCenter;

        return $this;
    }

    /**
     * Get the value of flapSide
     */
    public function getFlapSide()
    {
        return $this->flapSide;
    }

    /**
     * Set the value of flapSide
     *
     * @return  self
     */
    public function setFlapSide($flapSide)
    {
        $this->flapSide = $flapSide;

        return $this;
    }

    /**
     * Get the value of caston
     */
    public function getCaston()
    {
        return $this->caston;
    }

    /**
     * Set the value of caston
     *
     * @return  self
     */
    public function setCaston($caston)
    {
        $this->caston = $caston;

        return $this;
    }

    /**
     * Get the value of castonTotal
     */
    public function getCastonTotal()
    {
        return $this->castonTotal;
    }

    /**
     * Set the value of castonTotal
     *
     * @return  self
     */
    public function setCastonTotal($castonTotal)
    {
        $this->castonTotal = $castonTotal;

        return $this;
    }
}
