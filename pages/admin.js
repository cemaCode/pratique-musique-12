

function modifyText() {

    var func = "modify_text";
    var text = document.getElementById("txt_accueil").value;
    text = text.replace(/[\r\n]/gm, '');

    var getRequest = "func=" + func + "&txt_accueil=" + text;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result_f_txt_accueil").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
    xmlhttp.send();

}

function deleteOffre() {

    var func = "delete_offre";
    var offre = document.getElementById("s_offre").value;
    var idOffre = offre.split('#')[0];
    var getRequest = "func=" + func + "&s_idOffre=" + idOffre;

    var confirmation = confirm("Souhaitez vous suprimer l'offre '" + offre + "' ?")

    if (confirmation) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_suppr_offre").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }

}


 function addOffre() {

    //TODO 
    var func = "add_offre";
    var nom = document.getElementById("f_o_nom").value;
    var desc = document.getElementById("f_o_desc").value;
    var rubrique = document.getElementById("f_o_rubrique").value;
    var niveau = document.getElementById("f_o_niveau").value;
    var instru = document.getElementById("f_o_instru").value;
    var contact = document.getElementById("f_o_struct").value;
    contact = contact.split('| ')[1];
    var getRequest = "func=" + func + "&f_o_nom=" + nom+ "&f_o_rubrique=" + rubrique+ "&f_o_desc=" + desc+ "&f_o_niveau=" + niveau + "&f_o_instru=" + instru+ "&f_o_struct=" + contact;

    if(nom != '' && desc != '' && rubrique != '' && contact != '' && niveau != ''  ){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result_f_ajout_offre").innerHTML = this.responseText;
        }
    };
    

    xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
    xmlhttp.send();}
    else {
        alert("Veuillez renseigner tous les champs marquées par '*'");
    }


} 


function addInstrument() {
    var func = "add_instrument";
    var instrument = document.getElementById("f_i_instru").value;
    var getRequest = "func=" + func + "&f_i_instru=" + instrument;
    if (instrument != '') {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_ajout_instrument").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }
    else {
        alert("Champs 'instrument' non renseigné")
    }
}


function deleteInstrument() {
    var func = "delete_instrument";
    var instrument = document.getElementById("f_s_instru").value;
    var getRequest = "func=" + func + "&f_s_instru=" + instrument;

    if (instrument != '') {
        var confirmation = confirm("Souhaitez vous suprimer l'instrument '" + instrument + "' ?")

        if (confirmation) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result_f_suppr_instrument").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
            xmlhttp.send();
        }
    }
}



function addUser() {
    var func = "add_user";
    var mail = document.getElementById("f_mail").value;
    var passwd = document.getElementById("f_mdp").value;
    var role = document.getElementById("f_role").value;
    var getRequest = "func=" + func + "&f_mail=" + mail + "&f_mdp=" + passwd + "&f_role=" + role;

    if (mail != "" && passwd != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_ajout_user").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }
    else {
        alert("Champs 'mail' ou 'mot de passe' non renseignés")
    }
}


function deleteUser() {
    var func = "delete_user";
    var user = document.getElementById("f_s_user").value;
    var mail = user.split('|')[0];
    var getRequest = "func=" + func + "&f_s_user=" + mail;


    var confirmation = confirm("Souhaitez vous suprimer l'utilisateur '" + user + "' ?")

    if (confirmation) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_suppr_utilisateur").innerHTML = this.responseText;

            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }

}



function addStructure() {

    var func = "add_structure";
    var nom = document.getElementById("f_s_nom").value;
    var contact = document.getElementById("f_s_contact").value;
    var tel = document.getElementById("f_s_tel").value;
    var website = document.getElementById("f_s_website").value;
    var adresse = document.getElementById("f_s_adresse").value;
    var insee = document.getElementById("f_s_commune").value;
    var link_user = document.getElementById("f_s_userlink").value;
    // alert(nom +" |  " + contact +" |  " + tel +" |  " + website +" |  " + adresse +" |  " + insee);
    var getRequest = "func=" + func + "&f_s_nom=" + nom + "&f_s_contact=" + contact + "&f_s_tel=" + tel + "&f_s_website=" + website + "&f_s_adresse=" + adresse + "&f_s_commune=" + insee + "&f_s_userlink=" + link_user;

    if (nom != "" && contact != "" && tel != "" && website != "" && adresse != "" && insee != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_ajout_struct").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }
    else {
        alert("Veuillez renseigner tous les champs marquées par '*'");
    }
}



function deleteStructure() {
    var func = "delete_structure";
    var structure = document.getElementById("f_del_struct").value;
    var contact = structure.split(" | ")[1];
    var getRequest = "func=" + func + "&f_del_struct=" + contact;


    var confirmation = confirm("Souhaitez vous suprimer l'instrument '" + structure + "' ("+contact+") ?")

    if (confirmation) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result_f_del_struct").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "adminModifs.php?" + getRequest, true);
        xmlhttp.send();
    }

}

