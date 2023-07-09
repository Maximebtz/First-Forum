
//   const themeBtn = document.getElementById('light-mode');
//   const body = document.body;

//   // Vérifier l'état actuel du mode et le restaurer lors du chargement de la page
//   if (localStorage.getItem('lightMode') === 'true') {
//       body.classList.add('light-mode');
//       themeBtn.checked = true;
//   }

//   // Écouter l'événement de clic sur le bouton du mode lumière
//   themeBtn.addEventListener('click', () => {
//       if (body.classList.contains('light-mode')) {
//           body.classList.remove('light-mode');
//           localStorage.setItem('lightMode', 'false');
//       } else {
//           body.classList.add('light-mode');
//           localStorage.setItem('lightMode', 'true');
//       }
//   });


// document.getElementById("cards").onmousemove = e => {
//   for(const card of document.getElementsByClassName("card")) {
//   const rect = card.getBoundingClientRect(),
//           x = e.clientX - rect.left,
//           y = e.clientY - rect.top;

//   card.style.setProperty("--mouse-x", `${x}px`);
//   card.style.setProperty("--mouse-y", `${y}px`);
//   };
// }


// const newMsgBtn = document.querySelector('.new-msg-btn');
// const newMsgTextarea = document.querySelector('.btn-convert-msg');

// function convertBtnToTextarea() {
//   // Rendre le bouton invisible
//   newMsgBtn.style.display = 'none';
//   // Rendre la zone de texte visible
//   newMsgTextarea.style.display = 'flex';
// }

// newMsgBtn.addEventListener('click', function() {
//   console.log(convertBtnToTextarea())
// });

// const deleteBtns = document.querySelectorAll('.delete-btn');
// const deleteForms = document.querySelectorAll('.delete-form');

// deleteBtns.forEach(function(deleteBtn, index) {
//   deleteBtn.addEventListener('click', function() {
//       const deleteForm = deleteForms[index];
//       const card = deleteBtn.closest('.card');
//       showDeleteForm(deleteForm, card);
//   });
// });

// function showDeleteForm(deleteForm, card) {
//   deleteForm.style.display = 'flex';
// }

    
  

  