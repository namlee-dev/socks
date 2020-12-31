<?php

namespace Socks\Controllers;

use Socks\Models\Motif;
use Socks\Models\Pattern;
use Socks\Models\Size;


class PatternController extends CoreController
{
    /**
     * Display the asked pattern in the asked size in French
     */
    public function getPattern()
    {
        // dump($_POST);

        // Retrieve the data from form
        $tailleFromForm = filter_input(INPUT_POST, 'taille');
        $motifFromForm = filter_input(INPUT_POST, 'motif');
        // dump($tailleFromForm, $motifFromForm);

        // Find the pattern and size
        $taille = Size::find($tailleFromForm);
        $motif = Motif::find($motifFromForm);
        // dump($taille, $motif);

        // Retrieve the user informations to get the user role
        $currentUser = $_SESSION['userObject'];
        $userRole = $currentUser->getRole();
        // dump($userRole);

        // Between Two Ferns not available in size XS
        if ($taille->getId() == '1' && $motif->getId() == '2') {
            $this->show('pattern/not_available', [
                'taille' => $taille,
                'motif' => $motif,
                ]);
            exit;
        }

        if ($userRole === 'test') {
            // Display the pattern
            $this->show('pattern/test_pattern', [
                'taille' => $taille,
                'motif' => $motif,
                ]);
        } else {
            // Display the pattern
            $this->show('pattern/pattern', [
                'taille' => $taille,
                'motif' => $motif,
                ]);
        }
    }

    /**
     * Display the asked pattern in the asked size in English
     */
    public function getPatternEn()
    {
        // dump($_POST);

        // Retrieve the data from form
        $sizeFromForm = filter_input(INPUT_POST, 'size');
        $patternFromForm = filter_input(INPUT_POST, 'pattern');
        // dump($sizeFromForm, $patternFromForm);

        // Retrieve the pattern and size
        $size = Size::find($sizeFromForm);
        $pattern = pattern::find($patternFromForm);
        // dump($size, $pattern);

        // Retrieve the user informations to get the user role
        $currentUser = $_SESSION['userObject'];
        $userRole = $currentUser->getRole();
        // dump($userRole);

        // Between Two Ferns not available in size XS
        if ($size->getId() == '1' && $pattern->getId() == '2') {
            $this->show('pattern/not_available_en', [
                'size' => $size,
                'pattern' => $pattern,
                ]);
            exit;
        }

        if ($userRole === 'test') {
            // Display the pattern
             $this->showEn('pattern/test_pattern', [
                'size' => $size,
                'pattern' => $pattern,
                ]);
        } else {
            // Display the pattern
            $this->showEn('pattern/pattern', [
                'size' => $size,
                'pattern' => $pattern,
                ]);
        }
    }
}