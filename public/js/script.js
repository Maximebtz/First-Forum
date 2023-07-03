  document.getElementById("cards").onmousemove = e => {
    for(const card of document.getElementsByClassName("card")) {
      const rect = card.getBoundingClientRect(),
            x = e.clientX - rect.left,
            y = e.clientY - rect.top;
  
      card.style.setProperty("--mouse-x", `${x}px`);
      card.style.setProperty("--mouse-y", `${y}px`);
    };
  }

  const newMsgBtn = document.querySelector('.new-msg-btn');
    const newMsgTextarea = document.querySelector('.new-msg-text');

    function convertBtnToTextarea() {
        // Rendre le bouton invisible
        newMsgBtn.style.display = 'none';
    
        // Rendre la zone de texte visible
        newMsgTextarea.style.display = 'block';
    }

    newMsgBtn.addEventListener('click', function() {
        console.log(convertBtnToTextarea())
    });
  

  