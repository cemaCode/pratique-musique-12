
<?php

if (isset($_GET['func'])) {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
    $db = new dbController();
    $function = $_GET['func'];
    switch ($function) {
        case 'modify_text':
            $param = $_GET['txt_accueil'];
            $db->changeFrontPageText($param);
            echo "Texte de la page d'accueil modifié avec succès.";
            break;
        case 'delete_offre':
            $param = $_GET['s_idOffre'];
            $ret = $db->deleteOffre($param);
            if ($ret == true) {
                echo "Offre #$param supprimée avec succès.";
            } else {
                echo "Impossible de supprimer l'offre #$param.";
            }
            break;
        case 'add_offre':

            $nom = $_GET["f_o_nom"];
            $desc = $_GET["f_o_desc"];
            $rubrique = $_GET["f_o_rubrique"];
            $niveau = $_GET["f_o_niveau"];
            $instru = $_GET["f_o_instru"];
            $contact = $_GET["f_o_struct"];

            $db->addOffre($nom, $desc, $rubrique, $niveau, $instru, $contact);
            

            break;
        case 'add_instrument':
            $param = $_GET['f_i_instru'];
            $ret = $db->addInstrument($param);

            break;
        case 'delete_instrument':
            $param = $_GET['f_s_instru'];
            $ret = $db->deleteInstrument($param);
            if ($ret == true) {
                echo "Instrument $param supprimée avec succès.";
            } else {
                echo "Impossible de supprimer l'instrument $param.";
            }
            break;
        case 'add_user':
            $mail = $_GET['f_mail'];
            $passwd = $_GET['f_mdp'];
            $role = $_GET['f_role'];
            $db->addUser($mail, $passwd, $role);
            break;
        case 'delete_user':
            $param = $_GET['f_s_user'];
            $ret = $db->deleteUser($param);
            if ($ret == true) {
                echo "Utilisateur $param supprimé avec succès.";
            } else {
                echo "Impossible de supprimer l'utilisateur $param.";
            }
            break;
        case "add_structure":
            $nom = $_GET["f_s_nom"];
            $contact = $_GET["f_s_contact"];
            $tel = $_GET["f_s_tel"];
            $website = $_GET["f_s_website"];
            $adresse = $_GET["f_s_adresse"];
            $insee = $_GET["f_s_commune"];
            $link_user = $_GET["f_s_userlink"];

            $db->addStructure($nom, $contact, $tel, $website, $adresse, $insee, $link_user);
            break;
        case "delete_structure":
            $param = $_GET["f_del_struct"];

            $ret = $db->deleteStructure($param);
            if ($ret == true) {
                echo "Structure $param supprimée avec succès.";
            } else {
                echo "Impossible de supprimer la structure $param.";
            }

            break;
    }
}
?>
