import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";

const database = getDatabase();

document.getElementById('connexion-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  get(ref(database, 'utilisateurs/' + username)).then((snapshot) => {
    const user = snapshot.val();
    if (user && user.password === password) {
      window.location.href = 'https://nearoofly.github.io/Hdessawvideos';
    } else {
      console.log('Identifiants invalides');
    }
  }).catch((error) => {
    console.error('Erreur de connexion : ', error);
  });
});
