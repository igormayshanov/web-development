function initAjaxForm() {
  // получаем объект формы
  const form = document.getElementById('form');
  sendOk.style.display = 'none';

  form.addEventListener('submit', formSend);

  async function formSend(e) {
    e.preventDefault();
    //let error = formValidate(form);
    let formData = new FormData(form);
    form.classList.add('_sending');
    let response = await fetch('index.php', {
      method: 'post',
      credentials: 'same-origin',
      body: formData,
    });
    if (response.ok) {
      let result = await response.json();
      let sendOk = document.getElementById('sendOk');
      let nameError = document.getElementById('nameError');
      let emailError = document.getElementById('emailError');
      let messageError = document.getElementById('messageError');

      let name = document.getElementById('name');
      let email = document.getElementById('email');
      let message = document.getElementById('message');
      formRemoveError(name);
      formRemoveError(email);
      formRemoveError(message);
      if (result.send != false) {
        sendOk.style.display = 'block';
      }
      else {
        sendOk.style.display = 'none';
        if (result.errors.name) {
          nameError.textContent = result.errors.name;
          formAddError(name);
        }
        if (result.errors.email) {
          emailError.textContent = result.errors.email;
          formAddError(email);
        }
        if (result.errors.message) {
          messageError.textContent = result.errors.message;
          formAddError(message);
        }
      }
      //form.reset();
    } else {
        alert('Ошибка');
    }

  }
}

function formAddError(input) {
  //input.parentElement.classList.add('_error');
  input.classList.add('_error');
}
function formRemoveError(input) {
  //input.parentElement.classList.remove('_error');
  input.classList.remove('_error');
}
window.onload = initAjaxForm();


/*
  form.onsubmit = async (event) => {
    event.preventDefault();
    let sendOk = document.getElementById('sendOk');
    let nameError = document.getElementById('nameError');
    let emailError = document.getElementById('emailError');
    let messageError = document.getElementById('messageError');

    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let message = document.getElementById('message');

    let response = await fetch(form.action, {
      method: 'POST',
      body: new FormData(form)
    });

    if (response.ok) {
      let json = await response.json();
    } else {
      alert("Ошибка HTTP: " + response.status);
    }

    name.classList.remove("form__input_text__error");
    email.classList.remove("form__input_email__error");
    message.classList.remove("form__textarea__error");
    if (json.errors) {
      sendOk.style.display = 'block';
    }
    else {
      sendOk.style.display = 'none';
      if (json.errors.name != '') {
        nameError.textContent = json.errors.name;
        name.classList.add("form__input_text__error");
      }
      if (json.errors.email != '') {
        email.classList.add("form__input_email__error");
        emailError.textContent = json.errors.email;
      }
      if (json.errors.message != '') {
        messageError.textContent = json.errors.message;
        message.classList.add("form__textarea__error");
      }
    }
  }
  */


