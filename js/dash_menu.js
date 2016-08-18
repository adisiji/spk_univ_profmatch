$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });

   $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });

   $.fn.editable.defaults.mode = 'popup';
   $('.kel').editable({
        defaultValue: 'core',
        source: [
              {value: 'core', text: 'Core'},
              {value: 'secondary', text: 'Secondary'}
           ]
    });

    $('.gap').editable({
         title :'Pilih Bobot Gap',
         defaultValue: 3,
         source: [
               {value: 5, text: '5'},
               {value: 4.5, text: '4.5'},
               {value: 4, text: '4'},
               {value: 3.5, text: '3.5'},
               {value: 3, text: '3'},
               {value: 2.5, text: '2.5'},
               {value: 2, text: '2'},
               {value: 1.5, text: '1.5'},
               {value: 1, text: '1'}
            ]
     });

$('.xedit').editable();

$(document).on('click','.editable-submit',function(){
var c = $(this).closest('td').children('span').attr('namacol');
var t = $(this).closest('td').children('span').attr('nam_tab');
var x = $(this).closest('td').children('span').attr('id');
var y = $('.input-sm').val();
var z = $(this).closest('td').children('span');
$.ajax({
url: "process.php?id="+x+"&data="+y+"&column="+c+"&nam_tab="+t,
type: 'GET',
success: function(s){
if(s == 'status'){
$(z).html(y);}
if(s == 'error') {
alert('Error Processing your Request!');}
},
error: function(e){
alert('Error Processing your Request!!');
}
});
});
});
