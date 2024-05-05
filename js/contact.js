const btn = document.getElementById('button');
const form = document.getElementById('contactForm');
const nameInput = document.getElementById('from_name');
const emailInput = document.getElementById('email_id');
const phoneInput = document.getElementById('phone');
const messageInput = document.getElementById('message');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Validación del nombre
  const name = nameInput.value;
  if (name === '') {
    swal('Por favor, ingresa tu nombre.');
    return;
  }

  // Validación del email
  const email = emailInput.value;
  if (email === '') {
    swal('Por favor, ingresa tu correo electrónico.');
    return;
  }

  // Validación del mensaje
  const message = messageInput.value;
  if (message === '' || message.trim() === '' || message.length <= 20) {
    swal('Por favor, ingresa un mensaje mayor a 20 caracteres.');
    return;
  }

  // Si todos los campos requeridos están completos, proceder con el envío
  btn.value = 'enviando...';

  const serviceID = 'default_service';
  const templateID = 'template_v4sj38e';

  emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'enviar';
      swal('Gracias por contactarnos. En breve nos pondremos en contacto contigo.', '', 'success');

      // Limpia los campos
      nameInput.value = '';
      emailInput.value = '';
      messageInput.value = '';
      phoneInput.value = '';
    }, (err) => {
      btn.value = 'enviar';
      alert(JSON.stringify(err));
    });
});