<div class="img-carousel">
  <?php if(sizeof($imgs)>1){ ?>
    <!-- Arrows -->
    <div class="arrows-container" data-item="<?php echo $i ?>">
      <div class="arrow-container left">
        <div class="arrow-cont">
          <div class="arrow"></div>
          <div class="arrow"></div>
        </div>
      </div>
      <div class="arrow-container right">
        <div class="arrow-cont">
          <div class="arrow"></div>
          <div class="arrow"></div>
        </div>
      </div>
    </div>
    <!-- Navigation -->
    <div class="navigation">
      <?php foreach($imgs as $j=>$img){ ?>
        <input
          type="radio"
          name="img-<?php echo $i ?>"
          id="img-<?php echo $i."-".$j ?>"
          data-item="<?php echo $i ?>"
          data-pos="<?php echo $j ?>"
          autocomplete="off"
          <?php if($j==0) echo "checked" ?>
        >
        <label for="img-<?php echo $i."-".$j ?>"></label>
      <?php } ?>
    </div>
  <?php } ?>
  <!-- Viewport -->
  <div class="img-viewport" style="width: <?php echo sizeof($imgs) ?>00%;">
    <?php foreach($imgs as $j=>$img){ ?>
      <div class="img-cont" style="background: url('../assets/style/images/items/<?php echo $img ?>'); width: <?php echo 100/sizeof($imgs) ?>%;">
        <div class="img-bg" style="background: url('../assets/style/images/items/<?php echo $img ?>');" data-id="<?php echo $item['id'] ?>"></div>
      </div>
    <?php } ?>
  </div>
</div>