$(document).ready(function() {
  $(".menu-collapse").sideNav();
  $(".dropdown-button").dropdown();
  // $('.comment_content').pushpin({ top: 150 });
  $('input#input_text, textarea#textarea1').characterCounter();

  $('.post_content').scrollSpy();

});
