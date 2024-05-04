//

const btn = document.getElementById('button');

document.getElementById('contactForm')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'enviando...';

   const serviceID = 'default_service';
   const templateID = 'template_v4sj38e';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'enviar';
      swal('Gracias por contactarnos. En breve nos pondremos en contacto contigo.', '', 'success');
    }, (err) => {
      btn.value = 'enviar';
      alert(JSON.stringify(err));
    });
});