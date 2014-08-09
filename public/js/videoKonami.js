$.konami({
  code:                   [83,72,72],
  interval:   100,
  complete:   function(){
  $.jumpWindow('幕後花絮', $("#konami"), '', {pop: false});
  $('#konami').show();
}
});
