<?php


class ViewCard
{
    public function card_image($title, $desc, $login, $date, $name, $rank){
        ?>
            <div class="card card-size">          
              <!-- Card image -->
              <div class="view">
                <img class="card-img-bottom" src="/image/<?php echo $name ?>" alt="Card image cap">
                <a href="/image/<?php echo $name ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>          
              <!-- Card content -->
              <div class="card-body card-body-cascade">          
                <!-- Title -->
                <h4 class="card-title"><?php echo $title ?></h4>
                <!-- Text -->
                <p class="indigo-text"><?php echo $desc ?></p>

                  <?php
                  if ($rank === "admin") {
                      ?>
                      <p class="card-text">Posté par [<span  class="red-text"><b><?php echo strtoupper($rank) ?></b></span>] <span class="indigo-text"><b><?php echo strtoupper($login) ?></b></span> le <?php echo $date ?></p>
                      <?php
                  }
                  else if ($rank === "modo"){
                      ?>
                  <p class="card-text">Posté par [<span  class="green-text"><b><?php echo strtoupper($rank) ?></b></span>] <span class="indigo-text"><b><?php echo strtoupper($login) ?></b></span> le <?php echo $date ?></p>
                  <?php
                  }
                  else{
                      ?>
                      <p class="card-text">Posté par [<span  class="indigo-text"><b><?php echo strtoupper($rank) ?></b></span>] <span class="indigo-text"><b><?php echo strtoupper($login) ?></b></span> le <?php echo $date ?></p>
                      <?php
                  }
                  ?>
                <!-- Button -->
                <a href="/image/<?php echo $name ?>" class="btn btn-dark btn-lg btn-block">Voir l'image</a>
              </div>         
            </div>
            <!-- Card -->
        <?php
    }

    public function open_carddeck(){
        echo'<div class="card-columns" id="cardshow">';
    }

    public function close_carddeck(){
        echo '</div> ';
    }

    public function first_card($connected){
        ?>
            <div class="card card-image" id="first-card" style="background-image: url(https://www.businessmarches.com/wp-content/uploads/2014/01/economie-partage.jpg);">    
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4"> 
                <div>
                  <h5 class="darken-1-text"><i class="fas fa-chart-pie"></i>  pic_attitude(share)</h5>
                  <h3 class="card-title pt-2"><strong>Partager vos images !</strong></h3>
                  <p>Partager vos images dans le monde entier...</p>
                    <?php
                    if($connected === true){
                        ?>
                        <a class="btn btn-dark" data-toggle="modal" data-target="#modal-add-pic"><i class="fas fa-clone left"></i> Importer une image</a>
                        <?php
                    }
                    ?>
                  <p></p>
                </div>
              </div>       
            </div>

    <?php

    }
}