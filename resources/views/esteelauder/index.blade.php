<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8"> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="<?=Storage::url('slick/slick.css')?>"/>
      <link rel="stylesheet" type="text/css" href="<?=Storage::url('slick/slick-theme.css')?>"/>
      <link rel="stylesheet" href="<?=Storage::url('/css/styles.css')?>" />
      <title>Estee Lauder</title>
      <link rel="shortcut icon" href="#">
    </head>
    <body>


        <header class="header-wrapper">
          <div class="header-content">
            <img src="<?=Storage::url('/img/logo.png')?>" alt="logo" class="logo">
          </div>
        </header>

        <main>
            
          <div class="slider-container">
            <div class="slider">
              <?php                 
                foreach($banners as $banner) {?>
                  <div><img class="slides" src="<?=Storage::url("./img/".$banner->img);?>"></div>
                  <?php
              }
              ?>
            </div>
          </div>

          <div class="products media">

            <?php foreach($categories as $item){ ?>
              <a class="list-group-item list-group-item-action product media" href="category/<?= $item->id; ?>">
                <img class="product-img align-self-center mr-3" src="<?=Storage::url('./img/'.$item->img)?>" alt="Category img">
                <div class="media-body align-self-center">
                  <h5 class="product-name mt-0"><?= $item->name_en; ?></h5>
                  <p class="product-series mb-0"><?= $item->name_cn; ?></p>
                </div>
                <object class="arrow align-self-center" type="image/svg+xml" data="./img/Arrow.svg" class="logo"></object>
              </a>
            <?php } ?>

          </div>



        </main>

        <footer class="footer">
          <a href="https://www.esteelauder.com.hk/privacy" target="_blank">私隱政策和私隱聲明</a> <br>
          <a href="https://www.esteelauder.com.hk/terms-conditions" target="_blank">條款及細則</a>
          <p>© Estée Lauder Inc </p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?=Storage::url('./slick/slick.min.js')?>"></script>

        <script type="text/javascript">
          $('.slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false
          });
        </script>

    </body>
</html>