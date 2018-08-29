<?php

    /**
     * le fichier config.php regroupe toutes les fonctions en rapport avec la base de donnees
     * le fait de mettre toutes les fonctions dans ce fichier me permet de faciliter les futurs modifications
     */


    /**
     * cette fonction retourne une variable de la connexion a la base de donnees
     */ 
    function database() {
        $db = null;
        try{
            $db = new PDO('mysql:host=localhost;dbname=smarteventproject;charset=utf8','root','');
            return $db;
        }
        catch(PDOException $e) {
            die("Erreur " . $e->getMessage());
        }
    }

    /**
     * Ajout d'un nouveau utilisateur
     * cette fonction prend en paramétre 4 valeurs de type chaine de caractére (prenom, nom, email, mot de passe)
     */
    function add_user($prenom_user, $nom_user, $email_user, $password_user) {
        $db = database();
        $query = 'INSERT INTO users(prenom_user, nom_user, email_user, mot_passe_user) VALUES (?, ?, ?, ?)';
        $request = $db->prepare($query);
        $request->execute(array($prenom_user, $nom_user, $email_user, $password_user));
    }

    /**
     * Confirmation email utilisateur
     */
    function confirm_email($true, $id_user){
        $db = database();
        $query = 'UPDATE users set confirme_mail_user=? where id_user=?';
        $request = $db->prepare($query);
        $request->execute(array($true, $id_user));
    }

    /**
     * Connoxion : identification et authentification
     * cette fonction retourne la requete
     * cela va permettre de manipuler les resultats de la requete
     */
    function connexion($email_user) {
        $db = database();
        $query = 'SELECT * FROM users WHERE email_user=?';
        $request = $db->prepare($query);
        $request->execute(array($email_user));
        
        return $request;
    }

    /**
     * Ajout d'un evenement
     */
    function add_listing($title, $opening, $closing, $description, $address, $ticket, $picture, $posteur) {
        $db = database();
        $query = 'INSERT INTO evenements(titre_event, ouverture_event, cloture_event, description_event, lieu_event, prix_ticket, image_event, posteur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $request = $db->prepare($query);
        $request->execute(array($title, $opening, $closing, $description, $address, $ticket, $picture, $posteur));
    }

    /**
     * affichage des evenements visible pour tous les utilisateurs
     * cette fonction retourne la variable $request
     */
    function show_all_listing() {
        $db = database();
        $query = 'SELECT * FROM evenements ORDER BY id_event LIMIT 10';
        $request = $db->prepare($query);
        $request->execute();

        return $request;
    }

    /**
     * affichage des evenements visible que pour l'utilisateur qui les a publier
     * cette fonction retourne la variable $request
     */
    function show_listing($posteur) {
        $db = database();
        $query = 'SELECT * FROM evenements WHERE posteur=? ORDER BY id_event DESC LIMIT 6';
        $request = $db->prepare($query);
        $request->execute(array($posteur));

        return $request;
    }

    /**
     * suppression d'un evenement
     */
    function delete_listing($id_event) {
        $db = database();
        $query = 'DELETE FROM evenements WHERE id_event=?';
        $request = $db->prepare($query);
        $request->execute(array($id_event));
    }

    /**
     * modification d'un evenement
     */
    function update_listing($title_event, $opening, $closing, $description, $address, $ticket, $event_picture, $id_event) {
        $db = database();
        $query = 'UPDATE evenements SET titre_event=?, ouverture_event=?, cloture_event=?, description_event=?, lieu_event=?, prix_ticket=?, image_event=? WHERE id_event=?';
        $request = $db->prepare($query);
        $request->execute(array($title_event, $opening, $closing, $description, $address, $ticket, $event_picture, $id_event));
    }

    /**
     * suppression utilisateur
     */
    function delete_user($id_user) {
        $db = database;
        $query = 'DELETE FROM users WHERE id_user=?';
        $request = $db->prepare($query);
        $request->execute(array($id_user));
    }

    /**
     * modification profil utilisateur
     */
    function update_user($new_first_name, $new_last_name, $new_password, $phone_number, $id_user) {
        $db = database();
        $query = 'UPDATE users SET prenom_user=?, nom_user=?, mot_passe_user=?, tel_user=? WHERE id_user=?';
        $request = $db->prepare($query);
        $request->execute(array($new_first_name, $new_last_name, $new_password, $phone_number, $id_user));
    }

    /**
     * mail envoyé pour la confirmation
     */
    function mail_confirm($email) {
        $db = database();
        $query = 'UPDATE users set confirme_mail_user = 1 WHERE email_user = ?';
        $request = $db->prepare($query);
        $request->execute(array($email));
    }

    /**
     * affichage des détails sur un evenement
     * prend en parametre l'id de l'evenement
     * et retourne la variable request
     */
    function detail_event($id_event) {
        $db = database();
        $query = 'SELECT * FROM evenements WHERE id_event=?';
        $request = $db->prepare($query);
        $request->execute(array($id_event));

        return $request;
    }

?>