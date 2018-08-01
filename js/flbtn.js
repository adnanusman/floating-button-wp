const floatingButton = document.querySelector('.floating-button');

    floatingButton.addEventListener('click', showHiddenContent);

    let clicked = false;

    function showHiddenContent(e) {
      const hiddenContent = document.querySelector('.content-sidebar');
      if(clicked === false) {
        hiddenContent.style.display = 'block';
        e.target.innerHTML = 'Close Form [X]'
        clicked = !clicked;
      } else {
        hiddenContent.style.display = 'none';
        e.target.innerHTML = '<?php echo $button_text ?>';
        clicked = !clicked;
      }
    }