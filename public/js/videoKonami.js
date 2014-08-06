$.konami({
  code:                   [83,72,72],
  interval:   100,
  complete:   function(){
  $.jumpWindow('隱藏劇情', $("#konami"), '', {pop: false});
  $('#konami').show();
}
});
