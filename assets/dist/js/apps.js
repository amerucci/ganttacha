// FUNCTION TO CONVERT TIMESTAMP UNIX

function convertDate(date) {
  var unixTimestamp = parseInt(date);
  var date = new Date(unixTimestamp * 1000);
  return (
    date.getFullYear() +
    "-" +
    ("0" + String(date.getMonth() + 1)).slice(-2) +
    "-" +
    ("0" + String(date.getDate())).slice(-2)
  );
}

let allFormers = document.getElementById("myText").value;
let allFormersArray = JSON.parse(allFormers);

let allCities = document.getElementById("resultsAllCities").value;
let allCitiesArray = JSON.parse(allCities);

//INFO ABOUT FORMING

let formingsBlock = document.querySelectorAll(".gantt-block");

formingsBlock.forEach((forming) => {
  forming.addEventListener("click", function () {
    modal.style.display = "block";
    document.querySelector("#modalTitle").innerHTML =
      "Informations sur la formation";
    let form = document.querySelector("#modalForm");
    let divTitle = document.createElement("div");
    divTitle.className = "mb-3";

    //LABEL INPUT NAME TRAINING
    let labelInputNameFormer = document.createElement("label");
    labelInputNameFormer.setAttribute("for", "inputNameForming");
    labelInputNameFormer.setAttribute("class", "form-label");
    labelInputNameFormer.innerText = "Nom de la formation";

    //INPUT NAME TRAINING
    let inputNameFormer = document.createElement("input");
    inputNameFormer.setAttribute("type", "text");
    inputNameFormer.setAttribute("id", "inputNameForming");
    inputNameFormer.setAttribute("class", "form-control");
    inputNameFormer.setAttribute("name", "formingName");
    inputNameFormer.setAttribute("placeholder", "Nom de la formation");
    inputNameFormer.required = true;
    inputNameFormer.disabled = true;
    inputNameFormer.value = this.getAttribute("forming-title");

    //LABEL INPUT START TRAINING
    let labelInputStart = document.createElement("label");
    labelInputStart.setAttribute("for", "inputStart");
    labelInputStart.setAttribute("class", "form-label");
    labelInputStart.innerText = "Date de début de formation";

    //INPUT START TRAINING
    let inputStart = document.createElement("input");
    inputStart.setAttribute("type", "date");
    inputStart.setAttribute("id", "inputStart");
    inputStart.setAttribute("class", "form-control");
    inputStart.setAttribute("name", "formingStart");
    inputStart.required = true;
    inputStart.disabled = true;
    inputStart.value = convertDate(this.getAttribute("forming-start"));

    //LABEL INPUT START TRAINING
    let labelInputEnd = document.createElement("label");
    labelInputEnd.setAttribute("for", "inputEnd");
    labelInputEnd.setAttribute("class", "form-label");
    labelInputEnd.innerText = "Date de fin de formation";

    //INPUT START TRAINING
    let inputEnd = document.createElement("input");
    inputEnd.setAttribute("type", "date");
    inputEnd.setAttribute("id", "inputEnd");
    inputEnd.setAttribute("class", "form-control");
    inputEnd.setAttribute("name", "formingEnd");
    inputEnd.required = true;
    inputEnd.disabled = true;
    inputEnd.value = convertDate(this.getAttribute("forming-end"));

    //LABEL INPUT SELECT FORMER TRAINING
    let labelSelectFormerTraining = document.createElement("label");
    labelSelectFormerTraining.setAttribute("for", "SelectFormerTraining");
    labelSelectFormerTraining.setAttribute("class", "form-label");
    labelSelectFormerTraining.innerText = "Formateur";

    //INPUT SELECT FORMER TRAINING
    let SelectFormerTraining = document.createElement("select");
    SelectFormerTraining.setAttribute("id", "SelectFormerTraining");
    SelectFormerTraining.setAttribute("class", "form-select");
    SelectFormerTraining.setAttribute("name", "idformer");
    SelectFormerTraining.required = true;
    SelectFormerTraining.disabled = true;

    //INPUT SELECT FORMER TRAINING

    allFormersArray.forEach((former) => {
      let selectedFormer = this.getAttribute("forming-id-former");
      let optionFormerTraining = document.createElement("option");
      optionFormerTraining.value = former["id_trainer"];
      optionFormerTraining.text = former["name_trainer"];
      SelectFormerTraining.appendChild(optionFormerTraining);
      console.log(selectedFormer + "->" + former["id_trainer"]);
      if (former["id_trainer"] === selectedFormer) {
        optionFormerTraining.selected = true;
      }
    });

    //LABEL INPUT SELECT CITY TRAINING
    let labelSelectCityTraining = document.createElement("label");
    labelSelectCityTraining.setAttribute("for", "SelectCityTraining");
    labelSelectCityTraining.setAttribute("class", "form-label");
    labelSelectCityTraining.innerText = "Formateur";

    //INPUT SELECT CITY TRAINING

    let SelectCityTraining = document.createElement("select");
    SelectCityTraining.setAttribute("id", "SelectCityTraining");
    SelectCityTraining.setAttribute("class", "form-select");
    SelectCityTraining.setAttribute("name", "idcity");
    SelectCityTraining.required = true;
    SelectCityTraining.disabled = true;

    //INPUT SELECT CITY TRAINING
    let selectedCity = this.getAttribute("forming-id-city");
    allCitiesArray.forEach((city) => {
      let optionCityTraining = document.createElement("option");
      optionCityTraining.value = city["id_city"];
      optionCityTraining.text = city["name_city"];
      SelectCityTraining.appendChild(optionCityTraining);
      if (city["id_city"] === selectedCity) {
        optionCityTraining.selected = true;
      }
    });

    let inputHidden = document.createElement("input");
    inputHidden.setAttribute("type", "hidden");
    inputHidden.setAttribute("name", "idforming");
    inputHidden.value = this.getAttribute("forming-id");

    //INPUT SUBMIT BUTTON
    let submitNameFormer = document.createElement("button");
    submitNameFormer.setAttribute("class", "btn btn-warning enableInput");
    submitNameFormer.setAttribute("type", "submit");
    submitNameFormer.setAttribute("name", "updateTraining");
    submitNameFormer.setAttribute("value", "true");
    submitNameFormer.innerText = "Modifier la formation";

    //ENABLE INPUT
    submitNameFormer.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      let inputs = document.querySelectorAll("input");
      let selects = document.querySelectorAll("select");
      inputs.forEach((input) => {
        input.disabled = false;
      });
      selects.forEach((select) => {
        select.disabled = false;
      });
      submitNameFormer.setAttribute("class", "btn btn-primary ");
      submitNameFormer.innerText = "Sauvegarder les modifications";
      this.addEventListener("click", function () {
        window.location =
          "?formingName=" +
          inputNameFormer.value +
          "&formingStart=" +
          inputStart.value +
          "&formingEnd=" +
          inputEnd.value +
          "&idforming=" +
          inputHidden.value +
          "&idformer=" +
          SelectFormerTraining.value +
          "&idcity=" +
          SelectCityTraining.value +
          "&updateTraining=true";
      });

      //
    });

    let deleterForm = document.createElement("button");
    deleterForm.setAttribute("class", "btn btn-danger ms-3");
    deleterForm.setAttribute("type", "submit");
    deleterForm.setAttribute("name", "deleteTraining");
    deleterForm.setAttribute("value", "true");
    deleterForm.innerText = "Supprimer la formation";
    // WHEN CLICKING FIRST TIME ON DELETE FORMING
    deleterForm.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector("#modalForm").innerHTML =
        '<input type="hidden" name="idTrainingToDelete" value="' +
        inputHidden.value +
        '"><div class="alert alert-danger">Attention vous êtes sur le point de supprimer la formation<br><b>' +
        inputNameFormer.value +
        '</b></div><button class="btn btn-light" type="submit" name="updateTraining" id="cancelEdition" value="true">Annuler</button><button class="btn btn-danger ms-3" type="submit" name="deleteTraining" value="true">Confirmer la suppression</button>';
      document
        .querySelector("#cancelEdition")
        .addEventListener("click", function (f) {
          f.preventDefault();
          document.querySelector("#modalForm").innerHTML = "";
          modal.style.display = "none";
        });
    });

    divTitle.appendChild(labelInputNameFormer);
    divTitle.appendChild(inputNameFormer);
    divTitle.appendChild(labelInputStart);
    divTitle.appendChild(inputStart);
    divTitle.appendChild(labelInputEnd);
    divTitle.appendChild(inputEnd);
    divTitle.appendChild(inputHidden);

    divTitle.appendChild(labelSelectFormerTraining);
    divTitle.appendChild(SelectFormerTraining);
    divTitle.appendChild(labelSelectCityTraining);
    divTitle.appendChild(SelectCityTraining);

    form.appendChild(divTitle);
    form.appendChild(submitNameFormer);
    form.appendChild(deleterForm);
  });
});

//ENABLE INPUT

// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("addTraining");
var span = document.getElementsByClassName("close")[0];

//Function when clickin on addin training
document.querySelector("#addTraining").addEventListener("click", function () {
  //alert(document.getElementById("addTraining").getAttribute('data-title'))
  modal.style.display = "block";
  document.querySelector("#modalTitle").innerHTML = document
    .getElementById("addTraining")
    .getAttribute("data-title");
  let form = document.querySelector("#modalForm");
  let divTitle = document.createElement("div");
  divTitle.className = "mb-3";

  //LABEL INPUT NAME TRAINING
  let labelInputNameFormer = document.createElement("label");
  labelInputNameFormer.setAttribute("for", "inputNameForming");
  labelInputNameFormer.setAttribute("class", "form-label");
  labelInputNameFormer.innerText = "Nom de la formation";

  //INPUT NAME TRAINING
  let inputNameFormer = document.createElement("input");
  inputNameFormer.setAttribute("type", "text");
  inputNameFormer.setAttribute("id", "inputNameForming");
  inputNameFormer.setAttribute("class", "form-control");
  inputNameFormer.setAttribute("name", "formingName");
  inputNameFormer.setAttribute("placeholder", "Nom de la formation");
  inputNameFormer.required = true;

  //LABEL INPUT START TRAINING
  let labelInputStart = document.createElement("label");
  labelInputStart.setAttribute("for", "inputStart");
  labelInputStart.setAttribute("class", "form-label");
  labelInputStart.innerText = "Date de début de formation";

  //INPUT START TRAINING
  let inputStart = document.createElement("input");
  inputStart.setAttribute("type", "date");
  inputStart.setAttribute("id", "inputStart");
  inputStart.setAttribute("class", "form-control");
  inputStart.setAttribute("name", "formingStart");
  inputStart.required = true;

  //LABEL INPUT START TRAINING
  let labelInputEnd = document.createElement("label");
  labelInputEnd.setAttribute("for", "inputEnd");
  labelInputEnd.setAttribute("class", "form-label");
  labelInputEnd.innerText = "Date de fin de formation";

  //INPUT START TRAINING
  let inputEnd = document.createElement("input");
  inputEnd.setAttribute("type", "date");
  inputEnd.setAttribute("id", "inputEnd");
  inputEnd.setAttribute("class", "form-control");
  inputEnd.setAttribute("name", "formingEnd");
  inputEnd.required = true;

  //LABEL INPUT SELECT FORMER TRAINING
  let labelSelectFormerTraining = document.createElement("label");
  labelSelectFormerTraining.setAttribute("for", "SelectFormerTraining");
  labelSelectFormerTraining.setAttribute("class", "form-label");
  labelSelectFormerTraining.innerText = "Formateur";

  //INPUT SELECT FORMER TRAINING
  let SelectFormerTraining = document.createElement("select");
  SelectFormerTraining.setAttribute("id", "SelectFormerTraining");
  SelectFormerTraining.setAttribute("class", "form-select");
  SelectFormerTraining.setAttribute("name", "idformer");
  SelectFormerTraining.required = true;

  //INPUT SELECT FORMER TRAINING

  allFormersArray.forEach((former) => {
    let optionFormerTraining = document.createElement("option");
    optionFormerTraining.value = former["id_trainer"];
    optionFormerTraining.text = former["name_trainer"];
    SelectFormerTraining.appendChild(optionFormerTraining);
  });

  //LABEL INPUT SELECT CITY TRAINING
  let labelSelectCityTraining = document.createElement("label");
  labelSelectCityTraining.setAttribute("for", "SelectCityTraining");
  labelSelectCityTraining.setAttribute("class", "form-label");
  labelSelectCityTraining.innerText = "Formateur";

  //INPUT SELECT CITY TRAINING
  let SelectCityTraining = document.createElement("select");
  SelectCityTraining.setAttribute("id", "SelectCityTraining");
  SelectCityTraining.setAttribute("class", "form-select");
  SelectCityTraining.setAttribute("name", "idcity");
  SelectCityTraining.required = true;

  //INPUT SELECT CITY TRAINING

  allCitiesArray.forEach((city) => {
    let optionCityTraining = document.createElement("option");
    optionCityTraining.value = city["id_city"];
    optionCityTraining.text = city["name_city"];
    SelectCityTraining.appendChild(optionCityTraining);
  });

  //INPUT SUBMIT BUTTON
  let submitNameFormer = document.createElement("button");
  submitNameFormer.setAttribute("class", "btn btn-primary");
  submitNameFormer.setAttribute("type", "submit");
  submitNameFormer.setAttribute("name", "saveTraining");
  submitNameFormer.setAttribute("value", "true");
  submitNameFormer.innerText = "Ajouter la formation";

  divTitle.appendChild(labelInputNameFormer);
  divTitle.appendChild(inputNameFormer);
  divTitle.appendChild(labelInputStart);
  divTitle.appendChild(inputStart);
  divTitle.appendChild(labelInputEnd);
  divTitle.appendChild(inputEnd);

  divTitle.appendChild(labelSelectFormerTraining);
  divTitle.appendChild(SelectFormerTraining);
  divTitle.appendChild(labelSelectCityTraining);
  divTitle.appendChild(SelectCityTraining);

  form.appendChild(divTitle);
  form.appendChild(submitNameFormer);
});

//Function when clickin on addin trainer
document.querySelector("#addTrainer").addEventListener("click", function () {
  //alert(document.getElementById("addTraining").getAttribute('data-title'))
  modal.style.display = "block";
  document.querySelector("#modalTitle").innerHTML = document
    .getElementById("addTrainer")
    .getAttribute("data-title");
  let form = document.querySelector("#modalForm");
  let divTitle = document.createElement("div");
  divTitle.className = "mb-3";

  //LABEL INPUT NAME FORMER
  let labelInputNameFormer = document.createElement("label");
  labelInputNameFormer.setAttribute("for", "inputNameFormerId");
  labelInputNameFormer.setAttribute("class", "form-label");
  labelInputNameFormer.innerText = "Formateur";

  //INPUT NAME FORMER
  let inputNameFormer = document.createElement("input");
  inputNameFormer.setAttribute("type", "text");
  inputNameFormer.setAttribute("id", "inputNameFormerId");
  inputNameFormer.setAttribute("class", "form-control");
  inputNameFormer.setAttribute("name", "formerName");
  inputNameFormer.required = true;

  //INPUT NAME FORMER EXPLAINATION
  // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  let helpNameFormer = document.createElement("div");
  helpNameFormer.setAttribute("class", "form-text");
  helpNameFormer.setAttribute("id", "inputNameFormer-help");
  helpNameFormer.innerText = "Saisir le prénom et nom du formateur";

  //INPUT SUBMIT BUTTON
  let submitNameFormer = document.createElement("button");
  submitNameFormer.setAttribute("class", "btn btn-primary");
  submitNameFormer.setAttribute("type", "submit");
  submitNameFormer.setAttribute("name", "saveFormer");
  submitNameFormer.setAttribute("value", "true");
  submitNameFormer.innerText = "Soumettre le formateur";

  divTitle.appendChild(labelInputNameFormer);
  divTitle.appendChild(inputNameFormer);
  divTitle.appendChild(helpNameFormer);
  form.appendChild(divTitle);
  form.appendChild(submitNameFormer);
});

//Function when clickin on addin speaker
document.querySelector("#addSpeaker").addEventListener("click", function () {
  //alert(document.getElementById("addTraining").getAttribute('data-title'))
  modal.style.display = "block";
  document.querySelector("#modalTitle").innerHTML = document
    .getElementById("addSpeaker")
    .getAttribute("data-title");
  let form = document.querySelector("#modalForm");
  let divTitle = document.createElement("div");
  divTitle.className = "mb-3";

  //LABEL INPUT NAME FORMER
  let labelInputNameFormer = document.createElement("label");
  labelInputNameFormer.setAttribute("for", "inputNameFormerId");
  labelInputNameFormer.setAttribute("class", "form-label");
  labelInputNameFormer.innerText = "Intervenant";

  //INPUT NAME FORMER
  let inputNameFormer = document.createElement("input");
  inputNameFormer.setAttribute("type", "text");
  inputNameFormer.setAttribute("id", "inputNameFormerId");
  inputNameFormer.setAttribute("class", "form-control");
  inputNameFormer.setAttribute("name", "speakerName");
  inputNameFormer.required = true;

  //INPUT NAME FORMER EXPLAINATION
  // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  let helpNameFormer = document.createElement("div");
  helpNameFormer.setAttribute("class", "form-text");
  helpNameFormer.setAttribute("id", "inputNameFormer-help");
  helpNameFormer.innerText = "Saisir le prénom et nom de l'intervenant";

  //INPUT SUBMIT BUTTON
  let submitNameFormer = document.createElement("button");
  submitNameFormer.setAttribute("class", "btn btn-primary");
  submitNameFormer.setAttribute("type", "submit");
  submitNameFormer.setAttribute("name", "saveSpeaker");
  submitNameFormer.setAttribute("value", "true");
  submitNameFormer.innerText = "Soumettre l'intervenant";

  divTitle.appendChild(labelInputNameFormer);
  divTitle.appendChild(inputNameFormer);
  divTitle.appendChild(helpNameFormer);
  form.appendChild(divTitle);
  form.appendChild(submitNameFormer);
});



//Function when clickin on adding city
document.querySelector("#addCity").addEventListener("click", function () {
  //alert(document.getElementById("addTraining").getAttribute('data-title'))
  modal.style.display = "block";
  document.querySelector("#modalTitle").innerHTML = document
    .getElementById("addCity")
    .getAttribute("data-title");
  let form = document.querySelector("#modalForm");
  let divTitle = document.createElement("div");
  divTitle.className = "mb-3";

  //LABEL INPUT NAME CITY
  let labelInputNameFormer = document.createElement("label");
  labelInputNameFormer.setAttribute("for", "inputNameFormerId");
  labelInputNameFormer.setAttribute("class", "form-label");
  labelInputNameFormer.innerText = "Ville";

  //INPUT NAME CITY
  let inputNameFormer = document.createElement("input");
  inputNameFormer.setAttribute("type", "text");
  inputNameFormer.setAttribute("id", "inputNameFormerId");
  inputNameFormer.setAttribute("class", "form-control");
  inputNameFormer.setAttribute("name", "trainingCity");
  inputNameFormer.required = true;

  //INPUT NAME CITY EXPLAINATION
  // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  let helpNameFormer = document.createElement("div");
  helpNameFormer.setAttribute("class", "form-text");
  helpNameFormer.setAttribute("id", "inputNameFormer-help");
  helpNameFormer.innerText = "Ville de la formation";

  //INPUT SUBMIT BUTTON
  let submitNameFormer = document.createElement("button");
  submitNameFormer.setAttribute("class", "btn btn-primary");
  submitNameFormer.setAttribute("type", "submit");
  submitNameFormer.setAttribute("name", "saveCity");
  submitNameFormer.setAttribute("value", "true");
  submitNameFormer.innerText = "Créer la ville";

  divTitle.appendChild(labelInputNameFormer);
  divTitle.appendChild(inputNameFormer);
  divTitle.appendChild(helpNameFormer);
  form.appendChild(divTitle);
  form.appendChild(submitNameFormer);
});

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
  //Erase content
  document.querySelector("#modalForm").innerHTML = "";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
    //Erase content
    document.querySelector("#modalForm").innerHTML = "";
  }
};

//DELETING FORMER
let deleteBtns = document.querySelectorAll(".deleteBtn");
console.log(deleteBtns);
deleteBtns.forEach((element) => {
  element.addEventListener("click", function () {
    modal.style.display = "block";
    document.querySelector("#modalTitle").innerHTML = "Suppression";
    let form = document.querySelector("#modalForm");
    let divTitle = document.createElement("div");
    divTitle.className = "mb-3";
    let divMessage = document.createElement("div");
    divMessage.setAttribute("class", "alert alert-danger");
    divMessage.innerHTML =
      "Attention vous êtes sur le point de supprimer le formateur<br/><b> " +
      element.getAttribute("data-name_former") +
      "</b>";

    //INTERACTION BUTTON
    let interractionButtons = document.createElement("div");
    interractionButtons.className = "mb-2";
    let cancelButton = document.createElement("button");
    cancelButton.setAttribute("type", "button");
    cancelButton.setAttribute("class", "btn btn-light");
    cancelButton.textContent = "Annuler";
    cancelButton.addEventListener("click", function () {
      modal.style.display = "none";
      document.querySelector("#modalForm").innerHTML = "";
    });

    let confirmButton = document.createElement("button");
    confirmButton.setAttribute("type", "submit");
    confirmButton.setAttribute("class", "btn btn-danger ms-3");
    confirmButton.setAttribute("name", "toDelete");
    confirmButton.textContent = "Confirmer";
    confirmButton.value = element.getAttribute("data-id");

    form.appendChild(divMessage);
    interractionButtons.appendChild(cancelButton);
    interractionButtons.appendChild(confirmButton);
    form.appendChild(interractionButtons);
    form.appendChild(divTitle);
    form.appendChild(submitNameFormer);
  });
});

/*****************************
 * CREATE A NEW INTERVENTION *
 *****************************/

let allInterventions = document.getElementById("resultsAllInterventions").value;
let allSpeakers = document.getElementById("resultsAllSpeakers").value;
let allInterventionsArray = JSON.parse(allInterventions);
let allSpeakersArray = JSON.parse(allSpeakers);

// calculating number of days for positionning intervention

let date_1;
let date_2;
let difference;
let TotalDays;
let whereToInterven;
let intervention;

console.log(allInterventionsArray);
allInterventionsArray.forEach((interv) => {
  date_1 = new Date(interv[2]);
  date_2 = document
    .querySelector("#t-" + interv[4])
    .getAttribute("forming-start");
  date_3 = new Date(interv[3]);

  difference = date_1.getTime() / 1000 - date_2;
  differenceBetweenStartAndEnd =
    date_3.getTime() / 1000 - date_1.getTime() / 1000;

  TotalDays = Math.ceil(difference / (3600 * 24));
  TotalDaysBetweenStartAndEnd = Math.ceil(
    differenceBetweenStartAndEnd / (3600 * 24)
  );

  whereToInterven = document.querySelector("#t-" + interv[4]);
  intervention = document.createElement("div");
  intervention.className = "tata";
  intervention.style =
    "height: 27px;background: rgb(255, 153, 0);position: absolute;top:0; width: " +
    Math.ceil(TotalDaysBetweenStartAndEnd * 25 + 25) +
    "px; z-index: 2;border-radius: 3px; left:" +
    Math.ceil(TotalDays * 25 - 5) +
    "px";
  intervention.setAttribute("data-bs-toggle", "tooltip");
  intervention.setAttribute("data-bs-custom-class", "custom-tooltip");
  intervention.setAttribute("data-bs-placement", "top");
  intervention.setAttribute(
    "data-bs-title",
    interv[7]+" - "+ interv[1]  );

  whereToInterven.appendChild(intervention);
});

const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
