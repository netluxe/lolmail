(function($){
  $(function(){
    $('.button-collapse').sideNav();
    $('select').material_select();

  }); // end of document ready
})(jQuery); // end of jQuery name space

var options = [
    {selector: '#intro', offset: 900, callback: 'Materialize.toast("Hello", 1000 )' }
  ];
  Materialize.scrollFire(options);
