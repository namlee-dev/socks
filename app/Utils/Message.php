<?php

namespace Socks\Utils;

class Message {
    // Login
    public static $wrongLogin = 'Utilisateur inconnu ou mot de passe incorrect / Unknown user or wrong password';
    public static $wrongEmail = 'Le courriel ne correspond à aucun compte / Email does not match any account';
    public static $sendPasswordReset = 'Un courriel a été envoyé à l\'adresse courriel que vous avez fournie. Veuillez suivre le lien dans le courriel pour terminer votre demande de réinitialisation de mot de passe. / An email has been sent to the email you have provided. Please follow the link int the email to complete your password reset request.';
    public static $connectFr = 'Votre mot de passe a bien été mis à jour, <a href= "https://socks.maillesnam.com">vous pouvez vous connecter</a>';
    public static $connect = 'Your password has been updated successfully, <a href= "https://socks.maillesnam.com">you can login</a>';

    // Add or Edit an user in French
    public static $nameFr = 'Merci de compléter le prénom';
    public static $lastnameFr = 'Merci de compléter le nom';
    public static $emailFr = 'Merci de compléter le courriel';
    public static $regexFr = 'Votre mot de passe doit contenir au minimum 8 caractères dont 1 minuscule, 1 majuscule, 1 chifre et 1 caractère spécial (#%&*=@$)';
    public static $matchPasswordFr = 'Le mot de passe et sa confirmation ne correspondent pas';
    public static $passwordFr = 'Merci de compléter le mot de passe';
    public static $confirmPasswordFr = 'Merci de compléter la confirmation du mot de passe';
    public static $updatedProfileFr = 'Votre profil a bien été mis à jour. Si vous avez changé le courriel ou le mot de passe, veuillez vous déconnecter et vous reconnecter avec les nouveaux identifiants';

    public static $role = 'Merci de compléter le rôle';

    // Add or Edit an user in English
    public static $name = 'Please complete the first name';
    public static $lastname = 'Please complete the last name';
    public static $email = 'Please complete the email';
    public static $regex = 'Your password must contain at least 8 characters including 1 lowercase, 1 uppercase, 1 number and 1 special character (#%&*=@$)';
    public static $matchPassword = 'The password and its confirmation do not match';
    public static $password = 'Please complete the password';
    public static $confirmPassword = 'Please complete the password confirmation';
    public static $updatedProfile = 'Your profile has been updated successfully. If you have changed the email or password, please log out and log back in with the new identifiers';

    // Add or Edit a pattern in French
    public static $patternNameFr = 'Merci de compléter le nom';
    public static $yarnFr = 'Merci de compléter le fil';
    public static $needlesFr = 'Merci de compléter les aiguilles';
    public static $gaugeFr = 'Merci de compléter l\'échantillon';
    public static $materialFr = 'Merci de compléter le matériel';
    public static $patternFr = 'Merci de compléter le motif';

    // Add or Edit a pattern in English
    public static $patternName = 'Please complete the name';
    public static $yarn = 'Please complete the yarn';
    public static $needles = 'Please complete the needles';
    public static $gauge = 'Please complete the gauge';
    public static $material = 'Please complete the material';
    public static $pattern = 'Please complete the pattern';

    // Pattern
    public static $testNotAllowedFr = 'Vous n\'avez pas accès à cette fonctionnalité';
    public static $testNotAllowed = 'You do not have access to this feature';
    public static $warningBTWFr = 'Ce patron n\'est pas prévu en taille XS';
    public static $warningBTW = 'This pattern is not provided in size XS';
}