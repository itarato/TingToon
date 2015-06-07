jQuery(function () {
  jQuery('.draggable').draggable();
  jQuery('#save').on('click', onStageSave);
  jQuery('.delete').on('click', onDeleteClick);
});

var onStageSave = function () {
  var calcPos = function ( selector ) {
    var $elem = jQuery(selector);
    var x = parseInt($elem.css('left')) || 0;
    var y = parseInt($elem.css('top')) || 0;
    return {x: x, y: y};
  };

  var poss = {
    'iting': calcPos('#iting'),
    'peter': calcPos('#peter'),
    'bubble1': calcPos('#bubble1'),
    'bubble2': calcPos('#bubble2'),
    'bubble1_text': jQuery('#bubble1 textarea').val(),
    'bubble2_text': jQuery('#bubble2 textarea').val()
  };

  jQuery.post('/cartoon/create', JSON.stringify(poss), function ( response ) {
    window.location.reload();
  }).fail(function ( jqXHR, textStatus, errorThrown ) {
    console.log('POST failed')
  });
};

var onDeleteClick = function () {
  var $self = jQuery(this);
  var id = $self.attr('id');
  jQuery.post('/cartoon/' + id.toString() + '/delete', function () {
    window.location.reload();
  }).fail(function () {
    console.log('Cannot delete scene.');
  });
};
