// Page d'inscription

    //     // Intercepter la soumission du formulaire
        const formInscription= document.querySelector(".formInscrip");
        console.log(formInscription);

        formInscription.addEventListener("submit", function(event) {
             event.preventDefault(); // Empêcher la soumission du formulaire

             const formData = new FormData(formInscription);// Récupérer les données du formulaire
             formData.append("submit", "");
             console.log([...formData.entries()]);

      //        Envoyer les données à un fichier PHP 
             fetch("http://localhost/debutsdelafin2/createAccount.php", {
                 method: 'POST',
                 body: formData
             })
             .then(response => {
                 console.log(response);
                 return response.json();
    //              Traiter la réponse si nécessaire
             })
             .then(data=>{
                console.log(data);
             })
             .catch(error => {
                 console.error(error);
             });
         });

         
    //Page de connexion

    //     // Intercepter la soumission du formulaire
    const formConnexion= document.querySelector(".formConnexion");
    console.log(formConnexion);

    formConnexion.addEventListener("submit", function(event) {
         event.preventDefault(); // Empêcher la soumission du formulaire

         const formData = new FormData(formConnexion);// Récupérer les données du formulaire
         formData.append("submit", "");
         console.log([...formData.entries()]);

  //        Envoyer les données à un fichier PHP 
         fetch("http://localhost/debutsdelafin2/connection.php", {
             method: 'POST',
             body: formData
         })
         .then(response => {
             console.log(response);
             return response.json();
//              Traiter la réponse si nécessaire
         })
         .then(data=>{
            console.log(data);
         })
         .catch(error => {
             console.error(error);
         });
     });