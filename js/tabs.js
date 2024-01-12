function changeTab(tabIndex) {
    var tabs = document.getElementsByClassName('tab');
    var tabContents = document.getElementsByClassName('tab-content')[0].children;

    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove('active');
      tabContents[i].style.display = 'none';
    }

    tabs[tabIndex].classList.add('active');
    tabContents[tabIndex].style.display = 'block';
  }
  
  function changeTab(tabIndexOrDirection) {
    var tabs = document.getElementsByClassName('tab');
    var tabContents = document.getElementsByClassName('tab-content')[0].children;
    var currentIndex = 0;
  
    // Encuentra el índice actual
    for (var i = 0; i < tabs.length; i++) {
      if (tabs[i].classList.contains('active')) {
        currentIndex = i;
        break;
      }
    }
  
    // Desactiva la pestaña actual
    tabs[currentIndex].classList.remove('active');
    tabContents[currentIndex].style.display = 'none';
  
    // Determina el nuevo índice basándote en el argumento pasado
    var newIndex;
    if (tabIndexOrDirection === 'previous') {
      newIndex = (currentIndex - 1 + tabs.length) % tabs.length; // Circular, retrocede al final si está en el primer tab
    } else if (tabIndexOrDirection === 'next') {
      newIndex = (currentIndex + 1) % tabs.length; // Circular, avanza al principio si está en el último tab
    } else {
      newIndex = parseInt(tabIndexOrDirection); // Si se proporciona un índice, úsalo directamente
    }
  
    // Activa la nueva pestaña
    tabs[newIndex].classList.add('active');
    tabContents[newIndex].style.display = 'block';
  }
  