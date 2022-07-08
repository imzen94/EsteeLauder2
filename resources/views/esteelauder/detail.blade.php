<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8"> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="<?=Storage::url('/css/styles.css')?>" />
      <title>Estee Lauder</title>
      <link rel="shortcut icon" href="#">
    </head>
    <body>


        <header class="products header-wrapper">
          <div class="products header-content">
            <a href="{{ route('home') }}" class="header-arrow-wrapper"><object class="header arrow" type="image/svg+xml" data="<?=Storage::url('/img/Arrow.svg')?>" class="logo"></object></a>
            <a href="{{ route('home') }}"><img src="<?=Storage::url('/img/logo.png')?>" alt="logo" class="logo"></a>

          </div>
        </header>

        <main class="products-main">
          <img src="<?=Storage::url('/img/RN.jpg')?>" class="description img">

          <!-- 皇牌產品 -->
          
          <img src="<?=Storage::url('/img/hightlight.png')?>" class="description tag">

          <?php 
          $featuredProducts = $category->products->where('star', 1);
          foreach($featuredProducts as $item){ ?>
                <div class="product-info">
                  <img src="<?=Storage::url("./img/".$item->img);?>" class="product-info-img">
                  <div class="product-text">
                    <h2 class="product-title">
                      <?= $item->name_en; ?>
                      <?= $item->name_cn; ?>
                    </h2>
                    <div class="product-description">
                      <?= $item->description; ?>
                    </div>
                  </div>
                  
                </div>
          <?php } ?>

          

          <!-- 其他產品 -->

          <img src="<?=Storage::url('/img/other.png')?>" class="description tag">

          <?php 
          $normalProducts = $category->products->where('star', 0);
          foreach($normalProducts as $item){ ?>
                <div class="product-info">
                  <img src="<?=Storage::url("./img/".$item->img);?>" class="product-info-img">
                  <div class="product-text">
                    <h2 class="product-title">
                      <?= $item->name_en; ?>
                      <?= $item->name_cn; ?>
                    </h2>
                    <div class="product-description">
                      <?= $item->description; ?>
                    </div>
                  </div>
                  
                </div>
          <?php } ?>


          <button onclick="topFunction()" id="top-btn" title="Go to top">
            <object class="top-arrow align-self-center" type="image/svg+xml" data="<?=Storage::url("./img/Arrow.svg");?>" class="logo"></object>
            TOP
          </button>

          

        </main>

   



        <footer class="products-footer">
          <div>
            <span class="contact">跟蹤 Estee Lauder 的最新動態</span>
            <?php 
              foreach($social as $item){
            ?>
            <a class="social-link" target="_blank" href="<?=$item->link;?>">
              <object class="contact-logo"  data="<?=Storage::url("./img/".$item->img);?>" type="image/svg+xml"></object>
            </a>
            <?php 
              }
            ?>
            
          </div>
          <div class="footer-info">
            <a href="https://www.esteelauder.com.hk/privacy" target="_blank">私隱政策和私隱聲明</a> 
            <a href="https://www.esteelauder.com.hk/terms-conditions" target="_blank">條款及細則</a>
            <p>© Estée Lauder Inc </p>
          </div>
          
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script>
          //Get the button:
          mybutton = document.getElementById("top-btn");

          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function() {scrollFunction()};

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              mybutton.style.display = "block";
            } else {
              mybutton.style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
          }
        </script>


    </body>
</html>