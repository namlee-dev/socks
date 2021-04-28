<?php

namespace Socks\Controllers;

use Socks\Models\Motif;
use Socks\Models\Pattern;
use Socks\Models\Size;
use Socks\Utils\Message;

class PatternController extends CoreController
{
    /**
     * Display the asked pattern in French
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

        if ($tailleFromForm === "Toutes les tailles") {
            // Find the pattern
            $motif = Motif::find($motifFromForm);
            // Retrieve all sizes
            $tailles = Size::findAll();

            // Messages
            $alertMessageList = [];

            if ($motif->getId() === '2') {
                $alertMessageList [] = Message::$warningBTWFr;
            }

            if ($userRole === 'test') {
                // Display the pattern
                $this->show('pattern/test_all_sizes', [
                    'tailles' => $tailles,
                    'motif' => $motif,
                    'alertMessageList' => $alertMessageList,
                ]);
            } else {
                // Display the pattern
                $this->show('pattern/all_sizes', [
                    'tailles' => $tailles,
                    'motif' => $motif,
                    'alertMessageList' => $alertMessageList,
                ]);
            }
        } else {
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
    }

    /**
     * Display the asked pattern in English
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

        if ($sizeFromForm === "All sizes") {
            // Find the pattern
            $pattern = Pattern::find($patternFromForm);
            // Retrieve all sizes
            $sizes = Size::findAll();

            // Messages
            $alertMessageList = [];

            if ($pattern->getId() === '2') {
                $alertMessageList [] = Message::$warningBTW;
            }

            if ($userRole === 'test') {
                // Display the pattern
                $this->showEn('pattern/test_all_sizes', [
                    'sizes' => $sizes,
                    'pattern' => $pattern,
                    'alertMessageList' => $alertMessageList,
                ]);
            } else {
                // Display the pattern
                $this->showEn('pattern/all_sizes', [
                    'sizes' => $sizes,
                    'pattern' => $pattern,
                    'alertMessageList' => $alertMessageList,
                ]);
            }
        } else {

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
}