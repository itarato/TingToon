<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>TingToon</title>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="/assets/main.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="/assets/main.js"></script>

</head>
<body>

  <h1>TingToon V0.2</h1>

  <?php /** @var \TingToon\Cartoon\CartoonRenderer[] $cartoons */
  if (!empty($cartoons)): ?>
    <?php foreach ($cartoons as $cartoon): ?>

      <div class="stage">
        <div class="iting" style="<?php echo $cartoon->getXYCSSOf('iting') ?>">&nbsp;</div>
        <div class="peter" style="<?php echo $cartoon->getXYCSSOf('peter') ?>">&nbsp;</div>
        <div class="bubble" style="<?php echo $cartoon->getXYCSSOf('bubble1') ?>"><?php echo $cartoon->getTextOf('bubble1'); ?></div>
        <div class="bubble" style="<?php echo $cartoon->getXYCSSOf('bubble2') ?>"><?php echo $cartoon->getTextOf('bubble2'); ?></div>
      </div>
      <div class="delete" id="<?php echo $cartoon->getId(); ?>">[delete]</div>
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