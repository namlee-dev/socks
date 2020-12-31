<?php

namespace Socks\Controllers;

use Socks\Models\Motif;
use Socks\Models\Pattern;
use Socks\Models\Size;

class MainController extends CoreController
{
    // STEP For site in French
    /**
     * Display the home page
     */
    public function home()
    {
        // Retrieve all the patterns and sizes
        $motifListe = Motif::findAll();
        $tailleListe = Size::findAll();

        // Display the home page
        $this->show('main/home', [
            'motifListe' => $motifListe,
            'tailleListe' => $tailleListe,
            'token' => $this->createToken(),
        ]);
    }

    /**
     * Display the abbreviations page
     */
    public function abbreviations()
    {
        $this->show('main/abbreviations');
    }

    /**
     * Display the tutoriels page
     */
    public function tutorials()
    {
        $this->show('main/tutorials');
    }

    /**
     * Display the gallery page
     */
    public function gallery()
    {
        $this->show('main/gallery');
    }

    // STEP For site in English
    /**
     * Display the home page
     */
    public function homeEn()
    {
        // Retrieve all the patterns and sizes
        $patternList = Pattern::findAll();
        $sizeList = Size::findAll();

        // Display the home page
        $this->showEn('main/home', [
            'patternList' => $patternList,
            'sizeList' => $sizeList,
            'token' => $this->createToken(),
        ]);
    }

    /**
     * Display the abbreviations page
     */
    public function abbreviationsEn()
    {
        $this->showEn('main/abbreviations');
    }

    /**
     * Display the tutoriels page
     */
    public function tutorialsEn()
    {
        $this->showEn('main/tutorials');
    }

    /**
     * Display the gallery page
     */
    public function galleryEn()
    {
        $this->showEn('main/gallery');
    }
}
