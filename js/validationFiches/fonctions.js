/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//function afficheFiche() {
//    let xhr = new XMLHttpRequest();
//    xhr.onreadystatechange = function () {
//        if (this.readyState == 4 && this.status == 200) {
//            document.getElementById('fiche').innerHTML = xhr.responseText;
//            document.getElementById("btnRecherche").style.visibility = "hidden";
//            document.getElementById("btnRecherche").disabled = true;
//            document.getElementById("btnCorriger").style.visibility = "visible";
//            document.getElementById("btnReset").style.visibility = "visible";
//            document.getElementById("btnCorriger").disabled = false;
//            document.getElementById("btnReset").disabled = false;
//        }
//    };
//    xhr.open("post", "index.php?uc=rechercheFiche&action=afficheRecherche", true);
//    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//    let parametres = [document.getElementById('idVi').value];
//    parametres.push(document.getElementById('selectDate').value);
//    xhr.send(parametres);
//}

function chercheDates() {
    if (document.getElementById('idVi').value == 'none') {
        document.getElementById("retour").style.visibility = "hidden";
        document.getElementById("btnRecherche").style.visibility = "hidden";
        document.getElementById("btnRecherche").disabled = true;
    } else {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('retour').innerHTML = xhr.responseText;
                document.getElementById('retour').style.visibility = "visible";
                document.getElementById("btnRecherche").style.visibility = "visible";
                if (document.getElementById("selectDate").value == "none") {
                    document.getElementById("btnRecherche").disabled = true;
                } else {
                    document.getElementById("btnRecherche").disabled = false;
                }
            }
        };
        xhr.open("post", "index.php?uc=rechercheFiche&action=dateAjax", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let parametres = document.getElementById('idVi').value;

        xhr.send(parametres);
    }
}

//function updateFraisForfait(){
//    let xhr = new XMLHttpRequest();
//    xhr.onreadystatechange = function () {
//        if (this.readyState == 4 && this.status == 200) {
//            document.getElementById('succesErreur').innerHTML = xhr.responseText;
//            document.getElementById("succesErreur").style.display = "block";
//        }
//        setTimeout(cacheMessage, 5000);
//    };
//    xhr.open("post", "index.php?uc=rechercheFiche&action=corrigerFrais", true);
//    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//    let parametres = [document.getElementById('ETP').value];
//    parametres.push(document.getElementById('KM').value);
//    parametres.push(document.getElementById('NUI').value);
//    parametres.push(document.getElementById('REP').value);
//    xhr.send(parametres);
//}
//
//function cacheMessage(){
//    document.getElementById("succesErreur").style.display = "none";
//}

function activeBtnRecherche() {
    document.getElementById('btnRecherche').style.visibility = "visible";
    document.getElementById('btnRecherche').disabled = "false";
}