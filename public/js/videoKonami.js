$.konami({
  code:                   [115,104,104,046,046,046],
  interval:   100,
  complete:   function(){
  $.jumpWindow('隱藏劇情', $("#konami"), '', {pop: false});
  $('#konami').show();
}
});
