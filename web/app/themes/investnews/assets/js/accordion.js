//Funcionamento do Accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = jQuery(this.nextElementSibling);
    if(panel.hasClass('open')){
      panel.removeClass('open');
      panel.slideUp(300,"swing", null);
    }else{
      panel.addClass('open');
      panel.slideDown(300,"swing", null);
    }
  });
}
