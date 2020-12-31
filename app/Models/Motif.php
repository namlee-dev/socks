<?php

namespace Socks\Models;

use Socks\Utils\Database;
use PDO;

class Motif extends CoreModel
{
    private $yarn;
    private $needles;
    private $gauge;
    private $material;
    private $pattern;
    private $legStart;
    private $legEnd;
    private $chart;

    /**
     * Find 1 pattern by his name
     *
     * @param [string] $motif_name
     * @return self
     */
    public static function find(string $motif_name)
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM `motif` WHERE `name` = :name ;";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->bindValue(':name', $motif_name, PDO::PARAM_STR);
        $pdoStatement->execute();
        $motif = $pdoStatement->fetchObject(Motif::class);

        return $motif;
    }

    /**
     * Find 1 pattern by his id
     *
     * @param int $id
     * @return self
     */
    public static function findId(int $id)
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM `motif` WHERE `id` = :id ;";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_STR);
        $pdoStatement->execute();
        $motif = $pdoStatement->fetchObject(Motif::class);

        return $motif;
    }

    /**
     * Find all patterns
     *
     * @return self[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM `motif` ;";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->execute();
        $motifListe = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Motif::class);

        return $motifListe;
    }

    /**
     * Insert a new pattern
     */
    public function insert()
    {
        // Request to insert a new pattern
        $sql = 'INSERT INTO `motif` (name, yarn, needles, gauge, material, pattern, legStart,  legEnd, chart)
                VALUES (:name, :yarn, :needles, :gauge, :material, :pattern, :legStart, :legEnd, :chart)';
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        // Set parameters
        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':yarn', $this->yarn);
        $pdoStatement->bindValue(':needles', $this->needles);
        $pdoStatement->bindValue(':gauge', $this->gauge);
        $pdoStatement->bindValue(':material', $this->material);
        $pdoStatement->bindValue(':pattern', $this->pattern);
        $pdoStatement->bindValue(':legStart', $this->legStart);
        $pdoStatement->bindValue(':legEnd', $this->legEnd);
        $pdoStatement->bindValue(':chart', $this->chart);
        // Execute
        $result = $pdoStatement->execute();
        // If it is ok, it will be added after the last ID
        if ($result) {
            $this->id = $pdo->lastInsertId();
        }

        return $result;
    }

    /**
     * Edit a pattern
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `motif`
                SET
                    `name` = :name,
                    `yarn` =  :yarn,
                    `needles` = :needles,
                    `gauge` = :gauge,
                    `material` = :material,
                    `pattern` = :pattern,
                    `legStart` = :legStart,
                    `legEnd` = :legEnd,
                    `chart` = :chart
                WHERE `id` = :id
                ;";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':yarn', $this->yarn);
        $pdoStatement->bindValue(':needles', $this->needles);
        $pdoStatement->bindValue(':gauge', $this->gauge);
        $pdoStatement->bindValue(':material', $this->material);
        $pdoStatement->bindValue(':pattern', $this->pattern);
        $pdoStatement->bindValue(':legStart', $this->legStart);
        $pdoStatement->bindValue(':legEnd', $this->legEnd);
        $pdoStatement->bindValue(':chart', $this->chart);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $pdoStatement->execute();

        return($pdoStatement->rowCount() > 0);
    }

    /**
     * Delete a pattern
     */
    public function delete(int $id)
    {
        // Request to delete an user
        $sql = 'DELETE FROM `motif` WHERE `id` = :id';
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        // Set parameters
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        // Execute
        $pdoStatement->execute();

        return ($pdoStatement->rowCount() == 1);
    }

    /**
     * Get the value of pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set the value of pattern
     *
     * @return  self
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get the value of yarn
     */
    public function getYarn()
    {
        return $this->yarn;
    }

    /**
     * Set the value of yarn
     *
     * @return  self
     */
    public function setYarn($yarn)
    {
        $this->yarn = $yarn;

        return $this;
    }

    /**
     * Get the value of needles
     */
    public function getNeedles()
    {
        return $this->needles;
    }

    /**
     * Set the value of needles
     *
     * @return  self
     */
    public function setNeedles($needles)
    {
        $this->needles = $needles;

        return $this;
    }

    /**
     * Get the value of gauge
     */
    public function getGauge()
    {
        return $this->gauge;
    }

    /**
     * Set the value of gauge
     *
     * @return  self
     */
    public function setGauge($gauge)
    {
        $this->gauge = $gauge;

        return $this;
    }

    /**
     * Get the value of material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set the value of material
     *
     * @return  self
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get the value of legStart
     */
    public function getLegStart()
    {
        return $this->legStart;
    }

    /**
     * Set the value of legStart
     *
     * @return  self
     */
    public function setLegStart($legStart)
    {
        $this->legStart = $legStart;

        return $this;
    }

    /**
     * Get the value of legEnd
     */
    public function getLegEnd()
    {
        return $this->legEnd;
    }

    /**
     * Set the value of legEnd
     *
     * @return  self
     */
    public function setLegEnd($legEnd)
    {
        $this->legEnd = $legEnd;

        return $this;
    }

    /**
     * Get the value of chart
     */
    public function getChart()
    {
        return $this->chart;
    }

    /**
     * Set the value of chart
     *
     * @return  self
     */
    public function setChart($chart)
    {
        $this->chart = $chart;

        return $this;
    }
}
