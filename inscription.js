import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";

const database = getDatabase();

document.getElementById('inscription-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const username = document.getElementById('username').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  set(ref(database, 'utilisateurs/' + username), {
    email: email,
    password: password
  }).then(() => {
    window.location.href = 'https://nearoofly.github.io/Hdessawvideos';
  }).catch((error) => {
    console.error('Erreur lors de l\'inscription : ', error);
  });
});
