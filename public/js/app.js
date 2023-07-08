  document.getElementById("cards").onmousemove = e => {
    for(const card of document.getElementsByClassName("card")) {
      const rect = card.getBoundingClientRect(),
            x = e.clientX - rect.left,
            y = e.clientY - rect.top;
  
      card.style.setProperty("--mouse-x", `${x}px`);
      card.style.setProperty("--mouse-y", `${y}px`);
    };
  }

  function activateLightMode() {
    const ellipse = document.querySelector('.ellipse-12');
    ellipse.style.transform = 'translateX(25px)';
  
    const bodyElement = document.body;
    bodyElement.classList.add('light-mode');
  }
  
  // Appel de la fonction pour activer le mode lumière
  activateLightMode();

    
  

  