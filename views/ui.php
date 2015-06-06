<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>TingToon</title>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>

  jQuery(function () {
    jQuery('.draggable').draggable();

    jQuery('#save').on('click', onStageSave);
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
      'bubble1_text': jQuery('#bubble1').val(),
      'bubble2_text': jQuery('#bubble2').val()
    };

    jQuery.post('/cartoon/create', JSON.stringify(poss), function ( response ) {
      console.log(response);
    }).fail(function ( jqXHR, textStatus, errorThrown ) {
      console.log('POST failed')
    });
  };

</script>
<style type="text/css">

  .iting,
  .peter {
    background-color: brown;
    width: 100px;
    height: 100px;
  }

  .bubble {
    padding: 12px;
    background-color: cornflowerblue;
    width: 200px;
    height: 100px;
  }

  .stage {
    width: 800px;
    height: 600px;
    border: 10px solid coral;
    overflow: hidden;
  }

  .stage div {
    position: relative;
  }

</style>
</head>
<body>

<h1>TingToon V0.1</h1>

<?php /** @var \TingToon\Cartoon\CartoonRenderer[] $cartoons */
if (!empty($cartoons)): ?>
  <?php foreach ($cartoons as $cartoon): ?>
    <div class="stage">
      <div class="iting" style="<?php echo $cartoon->getXYCSSOf('iting') ?>">&nbsp;</div>
      <div class="peter" style="<?php echo $cartoon->getXYCSSOf('peter') ?>">&nbsp;</div>
      <div class="bubble" style="<?php echo $cartoon->getXYCSSOf('bubble1') ?>"><?php echo $cartoon->getTextOf('bubble1'); ?></div>
      <div class="bubble" style="<?php echo $cartoon->getXYCSSOf('bubble2') ?>"><?php echo $cartoon->getTextOf('bubble2'); ?></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<div id="stage" class="stage">

  <div id="iting" class="iting draggable">&nbsp;</div>
  <div id="peter" class="peter draggable">&nbsp;</div>
  <div id="bubble1" class="bubble draggable"><textarea></textarea></div>
  <div id="bubble2" class="bubble draggable"><textarea></textarea></div>

</div>

<button id="save">Save</button>

</body>
</html>