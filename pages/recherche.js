function afficherResultats() {
    var rubrique = document.getElementById("rubrique_offre");
    var niveau = document.getElementById("niveau_offre");
    var motCle = document.getElementById("mots_cle");
   
    rubrique=rubrique.value;
    niveau=niveau.value;
    motCle=motCle.value;

    var getRequest = "f_rubrique="+rubrique+"&f_niveau="+niveau+"&f_mot_cle="+motCle;
    console.log(getRequest);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultats").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "rechercheOffres.php?"+getRequest , true);
    xmlhttp.send();
}
  