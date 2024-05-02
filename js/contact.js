//
const form = document.querySelector('form');

Email.send({
    Host : "smtp.elasticemail.com",
    Username : "username",
    Password : "password",
    To : 'them@website.com',
    From : "you@isp.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);

let cadena = "hola mundo";
let resultado = cadena.split(" ");
console.log(resultado.length);