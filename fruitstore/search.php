<!DOCTYPE html>
<html>
 <head>
  <title>Поиск</title>
   <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
   
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">Фрукты</div>



                <div class="search"> 
                    <form action="search.php"> 
                      
                        <button> 
                            <i class="fas fa-search" style="font-size: 18px;"> </i> 
                        </button> 
                     </form> 
                </div> 
            <nav class="nav">  
                <a class="nav__link " href="index.html">Каталог</a>
                <a class="nav__link" href="cont.html">Как пользоваться магазином</a>
                <a class="nav__link" href="cart.html">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a class="nav__link" href="sign.html">Регистрация</a>
                <a class="nav__link" href="log.html">Вход</a>
            </nav>
        </div>
    </div>
</header>
  
<div class="intro">
  <br /><br />
  <div class="container" style="width:900px;">
    <h2 align="center">Поиск</h2>
    <h3 align="center">Например : яблоко, апельсин, гранат, арбуз ...</h3>
    <br /><br />
    <div align="center">
      <input type="text" name="search" id="search" placeholder="Поиск" class="form-control" />
    </div>
   <ul class="list-group" id="result"></ul>
   <br />
  </div>


</div>
<main>

</main>

<footer class="footer">
    <div class="container">
  <footer class="footer">
    <div class="container">

        <div class="footer__inner">
            <div class="  footer_first">
               <h4>"Фрукты" - магазин продуктов.</h4>
               <h5><p>+7 (495) 660-38-72, 8 800 550-53-21 </p> г. Москва, ул. Новозаводская, д.2</h5>
            </div>

            <div class="  footer_sec">
                <h4>Помощь</h4>
                <h5><p>+7 (495) 660-38-72, 8 800 550-53-21 </p> г. Москва, ул. Новозаводская, д.2</h5>
            </div>

            <div class="  footer_third">
                <h4>Прочее</h4>
               <h5><p>+7 (495) 660-38-72, 8 800 550-53-21 </p> г. Москва, ул. Новозаводская, д.2</h5>
            </div>
        </div>

        <div class="copyright">
            © 2020 Fruit
        </div>

    </div>
</footer>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#search').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#search').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('g.json', function(data) {
   $.each(data, function(key, value){
    if (value.name.search(expression) != -1 || value.cost.search(expression) != -1)
    {
     $('#result').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.cost+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#search').val($.trim(click_text[0]));
  $("#result").html('');
 });
});
</script>