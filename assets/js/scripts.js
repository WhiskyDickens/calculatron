/**
 * Takes a form node and sends it over AJAX.
 * @param {HTMLFormElement} form - Form node to send
 */
document.querySelectorAll("form").forEach((form) => {
  form.addEventListener("submit", (e) => {
    // disable default action
    e.preventDefault();
    // Get the form's action URL
    const action = e.target.action;
    // Configure the request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", action);
    // Prepare the form data
    let data = new FormData(e.target);
    // Set request headers
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    // Send request
    xhr.send(data);
    // Listen for load event
    xhr.onload = () => {
      // Parse returned data
      const response = JSON.parse(xhr.responseText);
      console.log(response);
      // Show result on the front end
      const messageContainer = form.querySelector(".response");
      // If successful
      if (response.code === 200) {
        messageContainer.innerHTML = `<div class='alert alert-success'>${response.message}</div>`;
      } else {
        messageContainer.innerHTML = `<div class='alert alert-danger'>${response.message}</div>`;
      }
    };
  });
});

/**
 * Allows addition of more calculation fields to a form
 */
document.querySelectorAll(".add-field").forEach((addFieldButton) => {
  addFieldButton.addEventListener("click", (e) => {
    const parentForm = addFieldButton.parentElement;
    // Grab the last field in the form
    const symbol = parentForm.querySelector(".symbol");
    const allInputs = parentForm.querySelectorAll("input");
    const lastInput = allInputs[allInputs.length - 1];
    const newFieldNameID = lastInput.getAttribute("name").replace(/\D/g, "");
    const newFieldName = `num-${parseInt(newFieldNameID) + 1}`;
    let newInputField = lastInput.cloneNode();
    let newInputSymbol = symbol.cloneNode("true");
    newInputField.setAttribute("name", newFieldName);
    newInputField.setAttribute("value", "");
    newInputField.removeAttribute("required");
    parentForm.insertBefore(newInputField, lastInput.nextSibling);
    parentForm.insertBefore(newInputSymbol, lastInput.nextSibling);
  });
});
