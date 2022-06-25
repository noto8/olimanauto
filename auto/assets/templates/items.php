<div class="items-container">
  <?php foreach($items as $i=>$item){
    $imgs = explode("\n", $item['img']) ?>
    <div class="item" data-item="<?php echo $i ?>">

      <!-- Carousel -->
      <?php require 'carousel.php' ?>
      
      <!-- Content -->
      <div class="content" data-id="<?php echo $item['id'] ?>">
        <div>
          <div class="name"><?php echo $item['item_name'] ?></div>
          <div class="desc"><?php echo $item['item_desc'] ?></div>
        </div>
        <div class="price">
          <?php
            $price = $item['price'];
            for($i=strlen($price)-1; $i>=0; $i--){
              echo $price[strlen($price)-$i-1];
              if($i%3==0 && $i>0) echo " ";
            }
            echo " ₽";
          ?>
        </div>
      </div>

      <!-- Options -->
      <?php if($edit == 1){ ?>
        <div class="options">
          <a href="/auto/edit/add/?id=<?php echo $item['id'] ?>">Изменить</a>
          <a class="delElem" style="cursor: pointer;" data-id="<?php echo $item['id'] ?>">Удалить</a>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>