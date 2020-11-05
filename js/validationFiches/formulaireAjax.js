/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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
        let parametres = "idVi=" + document.getElementById('idVi').value;
        xhr.send(parametres);
    }
}

let inputVi = document.getElementById('idVi');
inputVi.addEventListener("change", chercheDates, false);