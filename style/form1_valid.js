function validation()
   
    { 
      //pour affiche
               var   val= true;

          //valide donne etudiant
            var nom_eleve_fr        =   document.forms["valid_form"]["nom_fr"];
            var prenom_eleve_fr     =   document.forms["valid_form"]["prenom_fr"];
            var nom_eleve_ar        =   document.forms["valid_form"]["nom_ar"];
            var prenom_eleve_ar     =   document.forms["valid_form"]["prenom_ar"];
            var adress_fr           =   document.forms["valid_form"]["adress_fr"];
            var adress_ar           =   document.forms["valid_form"]["adress_ar"];
            var cni                 =   document.forms["valid_form"]["CNI"];
            var cne                 =   document.forms["valid_form"]["CNE"];
            var code_postal         =   document.forms["valid_form"]["code_postal"];
            var nationalite         =   document.forms["valid_form"]["nationalite"];
            var numero              =   document.forms["valid_form"]["num_tel"];
            var birthday_eleve      =   document.forms["valid_form"]["date_naissance_eleve"];
          
                  //valid select
            var pays_naissance      =   document.valid_form.pays;
            var ville_naissance     =   document.valid_form.ville;
            var sexe                =   document.valid_form.sexe;

          //valide donne pere
            var nom_pere_fr         =   document.forms["valid_form"]["Nom_pere"];
            var prenom_pere_fr      =   document.forms["valid_form"]["prenom_pere"];
            var cni_pere            =   document.forms["valid_form"]["CNI_pere"];
            var birthday_pere       =   document.forms["valid_form"]["date_naissance_pere"];
            
            
          //valide donne mere  
            var nom_mere_fr         =   document.forms["valid_form"]["Nom_mere"];
            var prenom_mere_fr      =   document.forms["valid_form"]["prenom_mere"];
            var cni_mere            =   document.forms["valid_form"]["CNI_mere"];
            var birthday_mere       =   document.forms["valid_form"]["date_naissance_mere"];
            
            
          //valide donne assurance        
            
            var assurance           =   document.valid_form.Assurance;

      //variabl regEx 

            var alphabet_ar         =      /^[\u0600-\u06ff]+$/;
            var alphabet_fr         =      /^[A-Za-z]+$/;
            var adrss_ar            =      /[\u0600-\u06ff]/;
            var adrss_fr            =      /[A-Za-z]/;
            var num_cne             =      /^(\b[A-Z]{1})+([0-9]{9})+$/;
            var num_cni             =      /^(\b[A-Z]{1,2})+[ ]+([0-9]{5,6})+$/;
            var tel                 =      /^\++([0-9]{1,3})\)*[ ]+([0-9]{4})*[ ]+([0-9]{4})$/;
            var date_naissance      =      /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;
            var cpostal             =      /^([0-9]{5})+$/;
            
            
            //saisir en arabic 


      if(!nom_eleve_ar.value.match(alphabet_ar))
      {
      document.getElementById('msg_nom_ar').innerHTML=" Entrer un nom valide (en arabe)";
      val = false;
      }
      if(nom_eleve_ar.value.match(alphabet_ar))
      {
      document.getElementById('msg_nom_ar').innerHTML="";
      val = false;
      }

      if(!prenom_eleve_ar.value.match(alphabet_ar))
      {
      document.getElementById('msg_prenom_ar').innerHTML=" Entrer un prénom valide (en arabe)";
      val = false;
      }
      if(prenom_eleve_ar.value.match(alphabet_ar))
      {
      document.getElementById('msg_prenom_ar').innerHTML="";
      val = false;
      }

      if(!adress_ar.value.match(adrss_ar))
      {
      document.getElementById('msg_adresse_ar').innerHTML="Entrer une adresse valide (en arabe)";
      val = false;
      }
      if(adress_ar.value.match(adrss_ar))
      {
      document.getElementById('msg_adresse_ar').innerHTML="";
      val = false;
      }

            //saisir en francais

      if(!nom_eleve_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_fr').innerHTML=" Entrer un nom valide (en français)";
      val = false;
      }
      if(nom_eleve_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_fr').innerHTML="";
      val = false;
      }

      if(!prenom_eleve_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_fr').innerHTML="Entrer un prénom valide (en français)";
      val = false;
      }
      if(prenom_eleve_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_fr').innerHTML="";
      val = false;
      }

      if(!adress_fr.value.match(adrss_fr))
      {
      document.getElementById('msg_adresse_fr').innerHTML=" Entrer une adresse valide (en français) ";
      val = false;
      }
      if(adress_fr.value.match(adrss_fr))
      {
      document.getElementById('msg_adresse_fr').innerHTML="";
      val = false;
      }

      if(!cni.value.match(num_cni))
      {
      document.getElementById('msg_cni').innerHTML=" Veuillez entrer votre CNI, tout en respectant la forme donnée";
      val = false;
      }
      if(cni.value.match(num_cni))
      {
      document.getElementById('msg_cni').innerHTML="";
      val = false;
      }

      if(!cne.value.match(num_cne))
      {
      document.getElementById('msg_cne').innerHTML=" Veuillez entrer votre CNE, tout en respectant la forme donnée";
      val = false;
      }
      if(cne.value.match(num_cne))
      {
      document.getElementById('msg_cne').innerHTML="";
      val = false;
      }

      if(pays_naissance.value == "default")
      {
      document.getElementById('msg_pays').innerHTML=" Veuillez Choisir votre pays de naissance";
      val = false;
      }
      if(pays_naissance.value != "default")
      {
      document.getElementById('msg_pays').innerHTML="";
      val = false;
      }

      if(ville_naissance.value == "default")
      {
      document.getElementById('msg_ville').innerHTML=" Veuillez Choisir votre ville de naissance";
      val = false;
      }
      if(ville_naissance.value != "default")
      {
      document.getElementById('msg_ville').innerHTML="";
      val = false;
      }

      if(!birthday_eleve.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_eleve').innerHTML=" Veuillez entrer votre  date de naissance , tout en respectant la forme donnée";
      val = false;
      }
      if(birthday_eleve.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_eleve').innerHTML="";
      val = false;
      }

      if(sexe.value == "default")
      {
      document.getElementById('msg_sexe').innerHTML=" Veuillez Choisir votre sexe ";
      val = false;
      }
      if(sexe.value != "default")
      {
      document.getElementById('msg_sexe').innerHTML="";
      val = false;
      }

      if(!code_postal.value.match(cpostal))
      {
      document.getElementById('msg_cpostal').innerHTML=" Veuillez entrer le code postal (composé de 5 chiffres) ";
      val = false;
      }
      if(code_postal.value.match(cpostal))
      {
      document.getElementById('msg_cpostal').innerHTML="";
      val = false;
      }

      if(!nationalite.value.match(alphabet_fr))
      {
      document.getElementById('msg_nationalite').innerHTML="Veuillez entrer votre nationalité ";
      val = false;
      }
      if(nationalite.value.match(alphabet_fr))
      {
      document.getElementById('msg_nationalite').innerHTML="";
      val = false;
      }

      if(!numero.value.match(tel))
      {
      document.getElementById('msg_tel').innerHTML=" Veuillez entrer un  numéro de téléphone, tout en respectant la forme donnée";
      val = false;
      }
      if(numero.value.match(tel))
      {
      document.getElementById('msg_tel').innerHTML="";
      val = false;
      }

            //valide de saisir donnes pere

      if(!nom_pere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_pere').innerHTML="  Veuillez entrer le nom valide de votre père (en français) ";
      val = false;
      }
      if(nom_pere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_pere').innerHTML="";
      val = false;
      }

      if(!prenom_pere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_pere').innerHTML="Veuillez entrer le prénom valide de votre père (en français) ";
      val = false;
      }
      if(prenom_pere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_pere').innerHTML="";
      val = false;
      }

      if(!cni_pere.value.match(num_cni))
      {
      document.getElementById('msg_cni_pere').innerHTML=" Veuillez entrer le CNI du père, tout en respectant la forme donnée";
      val = false;
      }
      if(cni_pere.value.match(num_cni))
      {
      document.getElementById('msg_cni_pere').innerHTML="";
      val = false;
      }
      if(!birthday_pere.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_pere').innerHTML=" Veuillez entrer la date de naissance du père, tout en respectant la forme donnée";
      val = false;
      }
      if(birthday_pere.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_pere').innerHTML="";
      val = false;
      }


            //valide de saisir donnes pere

      if(!nom_mere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_mere').innerHTML=" Veuillez entrer le nom valide de votre mère (en français) ";
      val = false;
      }
      if(nom_mere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_nom_mere').innerHTML="";
      val = false;
      }

      if(!prenom_mere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_mere').innerHTML="  Veuillez entrer le prénom valide de votre mère (en français)";
      val = false;
      }
      if(prenom_mere_fr.value.match(alphabet_fr))
      {
      document.getElementById('msg_prenom_mere').innerHTML="";
      val = false;
      }

      if(!cni_mere.value.match(num_cni))
      {
      document.getElementById('msg_cni_mere').innerHTML="  Veuillez entrer le  CNI du mère, tout en respectant la forme donné";
      val = false;
      }
      if(cni_mere.value.match(num_cni))
      {
      document.getElementById('msg_cni_mere').innerHTML="";
      val = false;
      }
      if(!birthday_mere.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_mere').innerHTML="  Veuillez entrer la date de naissance du mère, tout en respectant la forme donnée";
      val = false;
      }
      if(birthday_mere.value.match(date_naissance))
      {
      document.getElementById('msg_birthday_mere').innerHTML="";
      val = false;
      }

            //valide donne assurance
      
      if(assurance.value == "default")
      {
      document.getElementById('msg_assurance').innerHTML=" Veuillez Choisir le type de votre d'assurance médicale ";
      val = false;
      }
      if(assurance.value != "default")
      {
      document.getElementById('msg_assurance').innerHTML="";
      val = false;
      }

      return val;
}

