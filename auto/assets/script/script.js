//items
  ///links
  document.querySelectorAll('.item .content').forEach(content => {
    content.addEventListener("click", ()=>{
      window.location.href = "/auto/details/?id="+content.dataset.id+"";
    });
  });
  document.querySelectorAll('.item .img-bg').forEach(img => {
    img.addEventListener("click", ()=>{
      window.location.href = "/auto/details/?id="+img.dataset.id+"";
    });
  });
  ///navigation
  document.querySelectorAll('.navigation input[type=radio]').forEach(radio => {
    radio.addEventListener("click", ()=>{
      document.querySelector('[data-item="'+radio.dataset.item+'"] .img-viewport').style.left = -radio.dataset.pos+"00%";
    });
  });
  document.querySelectorAll('.arrow-container').forEach(arrow => {
    arrow.addEventListener("click", ()=>{
      let width = document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.width
      let position = document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.left;
      let radio = document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .navigation input[type=radio]:checked');
      radio.checked = false;
      if(arrow.classList.contains('left')){
        if(radio.dataset.pos == 0){
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .navigation input[type=radio]#img-'+radio.dataset.item+'-'+(parseInt(width)/100-1)).checked = true;
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.left = - parseInt(width) + 100 + "%";
        } else {
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .navigation input[type=radio]#img-'+radio.dataset.item+'-'+(parseInt(radio.dataset.pos) - 1)).checked = true;
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.left = -(parseInt(radio.dataset.pos) - 1)+"00" + "%";
        }
      } else {
        if((parseInt(radio.dataset.pos) + 1) * 100 + "%" === width){
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .navigation input[type=radio]#img-'+radio.dataset.item+'-0').checked = true;
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.left = 0;
        } else {
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .navigation input[type=radio]#img-'+radio.dataset.item+'-'+(parseInt(radio.dataset.pos) + 1)).checked = true;
          document.querySelector('[data-item="'+arrow.parentElement.dataset.item+'"] .img-viewport').style.left = -radio.dataset.pos+"00" - 100 + "%";
        }
      }
    });
  });

//delete
document.querySelectorAll('.delElem').forEach(item => {
  item.addEventListener("click", ()=>{
    if(confirm('Удалить элемент?') == true) window.location.href = "/auto/edit/delete/?id="+item.dataset.id+"";
  });
});

//details
  ///navigation
  document.querySelectorAll('.details .carousel .navigation input[type=radio]').forEach(radio => {
    radio.addEventListener("click", ()=>{
      document.querySelector('.details .carousel .img-viewport').style.transform = "translateX(-"+radio.dataset.pos/radio.dataset.imgs+"%)";
    });
  });