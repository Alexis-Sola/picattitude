<?php


class ViewCard
{
    public function card_image($title, $desc, $login, $date, $name){
        echo '
            <div class="card card-size"> 
            
              <!-- Card image -->
              <div class="view">
                <img class="card-img-bottom" src="/image/' . $name . '" alt="Card image cap">
                <a href="/image/' . $name . '">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
            
              <!-- Card content -->
              <div class="card-body card-body-cascade">
            
                <!-- Title -->
                <h4 class="card-title">' . $title . '</h4>
                <!-- Text -->
                <p class="card-text">' . $desc . '</p>
                
                <p class="card-text">Posté par ' . $login . ' le ' . $date . '</p>
                
                <!-- Button -->
                <a href="/image/' . $name . '" class="btn btn-dark btn-lg btn-block">Voir l\'image</a>
            
              </div>
            
            </div>
            <!-- Card -->';
    }

    public function open_carddeck(){
        echo'<div class="card-columns">';
    }

    public function close_carddeck(){
        echo '</div> ';
    }

    public function first_card(){
        echo '<!-- Card -->
<!-- Card -->
<div class="card card-image" id="first-card" style="background-image: url(https://www.businessmarches.com/wp-content/uploads/2014/01/economie-partage.jpg);">

  <!-- Content -->
  <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4"> 
    <div>
      <h5 class="darken-1-text"><i class="fas fa-chart-pie"></i>  Share pics</h5>
      <h3 class="card-title pt-2"><strong>Partager vos images !</strong></h3>
      <p>Partager vos images dans le monde entier...</p>
      <a class="btn btn-dark" data-toggle="modal" data-target="#modal-add-pic"><i class="fas fa-clone left"></i> Importer une image</a>
      <p></p>
    </div>
  </div>

</div>
<!-- Card -->
<!-- Card -->';
    }
}