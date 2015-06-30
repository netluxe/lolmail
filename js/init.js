(function($){
  $(function(){
    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space

var options = [
    {selector: '#intro', offset: 900, callback: 'Materialize.toast("Hello", 1000 )' },
    {selector: '#intro', offset:1100, callback: 'Materialize.toast("world", 1500 )' },
    {selector: '#ourSkills', offset: 1100, callback: 'Materialize.toast("Would you like a callback?", 1500 )' }
  ];
  Materialize.scrollFire(options);
