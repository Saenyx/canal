
<?php require_once 'inc/header.php';
header("Cache-Control: no-cache, must-revalidate");

$requete=executeRequete('SELECT * FROM upload WHERE id=:id', array(
  ':id'=>7
));
$upload=$requete->fetch(PDO::FETCH_ASSOC);

?>


<script src="./assets/main.js"></script>
<link rel="stylesheet" href="./css/Carouselxstyle.css">
  <link rel="stylesheet" href="./css/base.css">
  <script src="https://kit.fontawesome.com/a0043d9bc2.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?= SITE.'css/style.css'; ?>"> <!-- BALISE SCSS POUR SLIDER -->

<section class="dheader">
            <div class="overlay"></div>
            <video control muted playsinline="playsinline" autoplay="autoplay"  id="myVideo">
              <source id="video" src="<?= SITE.$upload['video'] ?>" type="video/mp4">
            </video>
            <div class="container  w-100">
              <div class="d-flex  w-100">
                    <div class="">
                            <div class="maman">
                                    <h1 class="witcherclass"><?= $upload['name'] ?></h1>
                                    <p class="fonts title">Regardez la saison 1 <button type="button"  class="btn ml-1 bt1 ">18+</button> 
                                        <span style="font-size: 2em;" data-toggle="tooltip" data-placement="top" title="Audio Description is available for some episodes" class="mt-3">
                                                <i class="fas fa-ad ml-3 "></i>
                                              </span></button> 
                                    </p> 
                                      <p class="fonts"><?=  $upload['description'] ; ?> </p>
                                             <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                  
                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                        <button id="pause" type="button" class="btn  mr-3 bt"><i class="fas fa-play ic"></i> Lecture</button>
                                                      </a>
                                                      </div>
                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                            <button type="button" class="btn y mr-3 bt"><i class="fas fa-plus ic"></i> Ajouter à ma liste</button>
                                                          </div>
                                                          <div class="btn-group" role="group" aria-label="Third group">
                                                                <button type="button" class="btn  mr-3 bt"><i class="fas fa-info-circle ic"></i> Plus d'info</button>
                                                              </div>
                                                              <div class="btn-group mt-2 " role="group" aria-label="Third group">
                                                        <button onclick="toggleMute();" type="button" onclick="enableMute()" class="btn  mr-20 bt"><i class="fas fa-volume-mute"></i></button>
                                                      </div>
                                                  </div>
                                                
                                                

                                        </div>
                                    
                          </div>
                        
              </div>
            
            </div>

            
</section>

<h1>NEW ON STREAMLABS</h1>
<!-- PREMIERE SECTION 
<div class="nowrapper">
  <section id="section1">
    <a href="#section3" class="arrow__btn">‹</a>
    <div class="item">
    <img src="<?= $upload['picture']; ?>" alt="Describe Image">
    <div class="description">
      <p class="descriptiontexte">Coming soon</p>
    </div>
  </div>
    <div class="item">
    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABZEK-7pZ1H5FD4cTyUb9qB_KeyJGz5p-kfPhCFv4GU_3mbdm8Xfsy4IBchlG9PFNdGff8cBNPaeMra72VFnot41nt0y3e8RLgaVwwh3UvyM2H2_MkmadWbQUeGuf811K7-cxJJh7gA.jpg" alt="Describe Image">
    <div class="description">
      <img src="./Upload/image/Play.png" class="descriptiontexte" width="100px"></img>
    </div>
  </section>
</div> -->

<!-- Seconde SECTION TEST -->


 <div class="tamer">
    <button type="button" id="moveLeft" class="btn-nav">
      ᐊ
    </button>
    <div class="tamer-indicators">
      <div class="indicator active" data-index=0></div>
      <div class="indicator" data-index=1></div>
      <div class="indicator" data-index=2></div>
    </div>
    <div class="slider" id="mySlider">
      <div class="movie" id="movie0">
        <img
          src="<?=  $upload['picture'] ; ?>"
          alt="" srcset="">
        <div class="letest">
          <div class="description__buttons-tamer">
            <div class="description__button"><i class="fas fa-play"></i></div>
            <div class="description__button"><i class="fas fa-plus"></i></div>
            <div class="description__button"><i class="fas fa-thumbs-up"></i></div>
            <div class="description__button"><i class="fas fa-thumbs-down"></i></div>
            <div class="description__button"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="description__text-tamer">
            <span class="description__match">97% Match</span>
            <span class="description__rating">TV-14</span>
            <span class="description__length">2h 11m</span>
            <br><br>
            <span>Explosive</span>
            <span>&middot;</span>
            <span>Exciting</span>
            <span>&middot;</span>
            <span>Family</span>
          </div>
        </div>
      </div>
    </div>
    <button type="button" id="moveRight" class="btn-nav">
      ᐅ
    </button>
  </div> 


  


  <script src="./assets/script.js"></script>



</html>

<!-- Seconde SECTION TEST FIN -->


<!-- FOOTER  -->
<?php require_once 'inc/footer.php' ?>




<!-- Pour charger des informations en get  on déclare avec ? le chargement de $_GET suivie de l'indice (le name à appelé sur $_GET) et on lui affecte sa valeur avec =savaleur. ex: ?prenom='cesaire'&nom='desaulle'; le debug de $_GET nous renvoie 'nom'=>'desaulle',-->
<!--   'prenom'=>'cesaire'. Pour y accéder on appelle $_GET['nom'] nous retourne 'desaulle'-->





