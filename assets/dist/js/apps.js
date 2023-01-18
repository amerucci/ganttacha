
    let allFormers = document.getElementById("myText").value;
    let allFormersArray = JSON.parse(allFormers);

    let allCities = document.getElementById("resultsAllCities").value;
    let allCitiesArray = JSON.parse(allCities);

    //INFO ABOUT FORMING

    let formingsBlock = document.querySelectorAll('.gantt-block')
    formingsBlock.forEach(forming => {
      forming.addEventListener('click',function() {
        modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = this.getAttribute('forming-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME TRAINING
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameForming')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Nom de la formation"
      

      //INPUT NAME TRAINING
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameForming');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'formingName');
      inputNameFormer.setAttribute('placeholder', 'Nom de la formation');
      inputNameFormer.required = true
      inputNameFormer.disabled = true
      inputNameFormer.value = this.getAttribute('forming-title')

      //LABEL INPUT START TRAINING
      let labelInputStart = document.createElement('label');
      labelInputStart.setAttribute('for', 'inputStart')
      labelInputStart.setAttribute('class', 'form-label')
      labelInputStart.innerText = "Date de début de formation"

      //INPUT START TRAINING
      let inputStart = document.createElement('input');
      inputStart.setAttribute('type', 'date');
      inputStart.setAttribute('id', 'inputStart');
      inputStart.setAttribute('class', 'form-control');
      inputStart.setAttribute('name', 'formingStart');
      inputStart.required = true
      inputStart.disabled = true
      inputStart.value = new Date(this.getAttribute('forming-start'))

      alert(new Date(this.getAttribute('forming-start')).toLocaleDateString("en-US"))

      //LABEL INPUT START TRAINING
      let labelInputEnd = document.createElement('label');
      labelInputEnd.setAttribute('for', 'inputEnd')
      labelInputEnd.setAttribute('class', 'form-label')
      labelInputEnd.innerText = "Date de fin de formation"

      //INPUT START TRAINING
      let inputEnd = document.createElement('input');
      inputEnd.setAttribute('type', 'date');
      inputEnd.setAttribute('id', 'inputEnd');
      inputEnd.setAttribute('class', 'form-control');
      inputEnd.setAttribute('name', 'formingEnd');
      inputEnd.required = true

      //LABEL INPUT SELECT FORMER TRAINING
      let labelSelectFormerTraining = document.createElement('label');
      labelSelectFormerTraining.setAttribute('for', 'SelectFormerTraining')
      labelSelectFormerTraining.setAttribute('class', 'form-label')
      labelSelectFormerTraining.innerText = "Formateur"

      //INPUT SELECT FORMER TRAINING
      let SelectFormerTraining = document.createElement('select');
      SelectFormerTraining.setAttribute('id', 'SelectFormerTraining');
      SelectFormerTraining.setAttribute('class', 'form-select');
      SelectFormerTraining.setAttribute('name', 'idformer');
      SelectFormerTraining.required = true

      //INPUT SELECT FORMER TRAINING

      allFormersArray.forEach(former => {
        let optionFormerTraining = document.createElement('option');
        optionFormerTraining.value = former['id_trainer']
        optionFormerTraining.text = former['name_trainer']
        SelectFormerTraining.appendChild(optionFormerTraining)
      });

      //LABEL INPUT SELECT CITY TRAINING
      let labelSelectCityTraining = document.createElement('label');
      labelSelectCityTraining.setAttribute('for', 'SelectCityTraining')
      labelSelectCityTraining.setAttribute('class', 'form-label')
      labelSelectCityTraining.innerText = "Formateur"

      //INPUT SELECT CITY TRAINING
      let SelectCityTraining = document.createElement('select');
      SelectCityTraining.setAttribute('id', 'SelectCityTraining');
      SelectCityTraining.setAttribute('class', 'form-select');
      SelectCityTraining.setAttribute('name', 'idcity');
      SelectCityTraining.required = true

      //INPUT SELECT CITY TRAINING

      allCitiesArray.forEach(city => {
        let optionCityTraining = document.createElement('option');
        optionCityTraining.value = city['id_city']
        optionCityTraining.text = city['name_city']
        SelectCityTraining.appendChild(optionCityTraining)
      });


      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveTraining')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Ajouter la formation'


      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(labelInputStart)
      divTitle.appendChild(inputStart)
      divTitle.appendChild(labelInputEnd)
      divTitle.appendChild(inputEnd)

      divTitle.appendChild(labelSelectFormerTraining)
      divTitle.appendChild(SelectFormerTraining)
      divTitle.appendChild(labelSelectCityTraining)
      divTitle.appendChild(SelectCityTraining)

      form.appendChild(divTitle)
      form.appendChild(submitNameFormer) 
     
      })
    
    });


    // Get the modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("addTraining");
    var span = document.getElementsByClassName("close")[0];

    //Function when clickin on addin training
    document.querySelector("#addTraining").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addTraining").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME TRAINING
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameForming')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Nom de la formation"

      //INPUT NAME TRAINING
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameForming');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'formingName');
      inputNameFormer.setAttribute('placeholder', 'Nom de la formation');
      inputNameFormer.required = true

      //LABEL INPUT START TRAINING
      let labelInputStart = document.createElement('label');
      labelInputStart.setAttribute('for', 'inputStart')
      labelInputStart.setAttribute('class', 'form-label')
      labelInputStart.innerText = "Date de début de formation"

      //INPUT START TRAINING
      let inputStart = document.createElement('input');
      inputStart.setAttribute('type', 'date');
      inputStart.setAttribute('id', 'inputStart');
      inputStart.setAttribute('class', 'form-control');
      inputStart.setAttribute('name', 'formingStart');
      inputStart.required = true

      //LABEL INPUT START TRAINING
      let labelInputEnd = document.createElement('label');
      labelInputEnd.setAttribute('for', 'inputEnd')
      labelInputEnd.setAttribute('class', 'form-label')
      labelInputEnd.innerText = "Date de fin de formation"

      //INPUT START TRAINING
      let inputEnd = document.createElement('input');
      inputEnd.setAttribute('type', 'date');
      inputEnd.setAttribute('id', 'inputEnd');
      inputEnd.setAttribute('class', 'form-control');
      inputEnd.setAttribute('name', 'formingEnd');
      inputEnd.required = true

      //LABEL INPUT SELECT FORMER TRAINING
      let labelSelectFormerTraining = document.createElement('label');
      labelSelectFormerTraining.setAttribute('for', 'SelectFormerTraining')
      labelSelectFormerTraining.setAttribute('class', 'form-label')
      labelSelectFormerTraining.innerText = "Formateur"

      //INPUT SELECT FORMER TRAINING
      let SelectFormerTraining = document.createElement('select');
      SelectFormerTraining.setAttribute('id', 'SelectFormerTraining');
      SelectFormerTraining.setAttribute('class', 'form-select');
      SelectFormerTraining.setAttribute('name', 'idformer');
      SelectFormerTraining.required = true

      //INPUT SELECT FORMER TRAINING

      allFormersArray.forEach(former => {
        let optionFormerTraining = document.createElement('option');
        optionFormerTraining.value = former['id_trainer']
        optionFormerTraining.text = former['name_trainer']
        SelectFormerTraining.appendChild(optionFormerTraining)
      });

      //LABEL INPUT SELECT CITY TRAINING
      let labelSelectCityTraining = document.createElement('label');
      labelSelectCityTraining.setAttribute('for', 'SelectCityTraining')
      labelSelectCityTraining.setAttribute('class', 'form-label')
      labelSelectCityTraining.innerText = "Formateur"

      //INPUT SELECT CITY TRAINING
      let SelectCityTraining = document.createElement('select');
      SelectCityTraining.setAttribute('id', 'SelectCityTraining');
      SelectCityTraining.setAttribute('class', 'form-select');
      SelectCityTraining.setAttribute('name', 'idcity');
      SelectCityTraining.required = true

      //INPUT SELECT CITY TRAINING

      allCitiesArray.forEach(city => {
        let optionCityTraining = document.createElement('option');
        optionCityTraining.value = city['id_city']
        optionCityTraining.text = city['name_city']
        SelectCityTraining.appendChild(optionCityTraining)
      });


      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveTraining')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Ajouter la formation'


      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(labelInputStart)
      divTitle.appendChild(inputStart)
      divTitle.appendChild(labelInputEnd)
      divTitle.appendChild(inputEnd)

      divTitle.appendChild(labelSelectFormerTraining)
      divTitle.appendChild(SelectFormerTraining)
      divTitle.appendChild(labelSelectCityTraining)
      divTitle.appendChild(SelectCityTraining)

      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)
    })
    //Function when clickin on addin trainer
    document.querySelector("#addTrainer").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addTrainer").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME FORMER
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameFormerId')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Formateur"

      //INPUT NAME FORMER
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameFormerId');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'formerName');
      inputNameFormer.required = true

      //INPUT NAME FORMER EXPLAINATION
      // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      let helpNameFormer = document.createElement('div');
      helpNameFormer.setAttribute('class', 'form-text')
      helpNameFormer.setAttribute('id', 'inputNameFormer-help')
      helpNameFormer.innerText = "Saisir le prénom et nom du formateur"

      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveFormer')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Soumettre le formateur'


      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(helpNameFormer)
      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)

    })


    //Function when clickin on adding city
    document.querySelector("#addCity").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addCity").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME CITY
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameFormerId')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Ville"

      //INPUT NAME CITY
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameFormerId');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'trainingCity');
      inputNameFormer.required = true

      //INPUT NAME CITY EXPLAINATION
      // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      let helpNameFormer = document.createElement('div');
      helpNameFormer.setAttribute('class', 'form-text')
      helpNameFormer.setAttribute('id', 'inputNameFormer-help')
      helpNameFormer.innerText = "Ville de la formation"

      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveCity')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Créer la ville'

      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(helpNameFormer)
      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)

    })

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
      //Erase content
      document.querySelector("#modalForm").innerHTML = ""
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        //Erase content
        document.querySelector("#modalForm").innerHTML = ""
      }
    }

    //DELETING FORMER
    let deleteBtns = document.querySelectorAll('.deleteBtn')
    console.log(deleteBtns)
    deleteBtns.forEach(element => {
      element.addEventListener('click', function() {
        modal.style.display = "block";
        document.querySelector("#modalTitle").innerHTML = 'Suppression'
        let form = document.querySelector("#modalForm")
        let divTitle = document.createElement('div');
        divTitle.className = "mb-3"
        let divMessage = document.createElement('div')
        divMessage.setAttribute('class', 'alert alert-danger')
        divMessage.innerHTML = "Attention vous êtes sur le point de supprimer le formateur<br/><b> " + element.getAttribute('data-name_former') + "</b>"

        //INTERACTION BUTTON
        let interractionButtons = document.createElement('div');
        interractionButtons.className = "mb-2"
        let cancelButton = document.createElement('button')
        cancelButton.setAttribute('type', 'button')
        cancelButton.setAttribute('class', 'btn btn-light')
        cancelButton.textContent = "Annuler"
        cancelButton.addEventListener('click', function() {
          modal.style.display = "none"
          document.querySelector("#modalForm").innerHTML = ""
        })

        let confirmButton = document.createElement('button')
        confirmButton.setAttribute('type', 'submit')
        confirmButton.setAttribute('class', 'btn btn-danger ms-3')
        confirmButton.setAttribute('name', 'toDelete')
        confirmButton.textContent = "Confirmer"
        confirmButton.value = element.getAttribute('data-id')



        form.appendChild(divMessage)
        interractionButtons.appendChild(cancelButton)
        interractionButtons.appendChild(confirmButton)
        form.appendChild(interractionButtons)
        form.appendChild(divTitle)
        form.appendChild(submitNameFormer)

      })

    });
