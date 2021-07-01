function submitFormAjax() {
  // получаем объект формы
  const form = document.getElementById('form');

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
        form.classList.add('_sending');
        nameError.textContent = "";
        emailError.textContent = "";
        messageError.textContent = "";
        sendOk.style.display = 'block';
        form.reset();
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
  input.classList.add('_error');
}
function formRemoveError(input) {
  input.classList.remove('_error');
}
window.onload = submitFormAjax();
