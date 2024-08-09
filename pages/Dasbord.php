<?php
  include "../Controles/Verifier_session.php";
?>

<?php 
   require_once("../Class/Class_Dasbord.php");

?>
<?php
  $topProduct=Dasbord::TopProductVent();
  $cat=Dasbord::TopCat();
  $listPhoto=Dasbord::PhotoCat($cat->id);
  $topCli=Dasbord::TopClient();
  $topCommande=Dasbord::TopCommande();
  $topAch=Dasbord::TopAch();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     <?php  include "menu.php" ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       <?php include  "header.php" ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::NbComday(0) ?></h3>
                             <?php if(Dasbord::NbComday(0)-Dasbord::NbComday(-1)>0 ) {?>
                           <p class="text-success ml-2 mb-0 font-weight-medium">+<?=Dasbord::NbComday(0)-Dasbord::NbComday(1)?> </p>
                              <?php }else{?>
                           <p class="text-danger ml-2 mb-0 font-weight-medium"><?=Dasbord::NbComday(0)-Dasbord::NbComday(-1)?></p>
                               <?php } ?>
                          </div>
                      </div>
                    
                      <div class="col-3">
                        <?php if(Dasbord::NbComday(0)-Dasbord::NbComday(-1)>0 ) {?>
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div><?php }else{?>
                          <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>     <?php }?>
                      </div> 
                      
                    </div>
                    <h6 class="text-muted font-weight-normal">Commande Today</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::NbProduitDay(0)?> </h3>
                          <?php if(Dasbord::NbProduitDay(0)-Dasbord::NbProduitDay(-1)>0 ) {?>
                           <p class="text-success ml-2 mb-0 font-weight-medium">+<?=Dasbord::NbProduitDay(0)-Dasbord::NbProduitDay(-1)?> </p>
                              <?php }else{?>
                           <p class="text-danger ml-2 mb-0 font-weight-medium"><?=Dasbord::NbProduitDay(0)-Dasbord::NbProduitDay(-1)?></p>
                               <?php } ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <?php if(Dasbord::NbProduitDay(0)-Dasbord::NbProduitDay(-1)>0 ) {?>
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div><?php }else{?>
                          <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>     <?php }?>
                      </div> 
                    </div>
                    <h6 class="text-muted font-weight-normal">Produites Vents Today</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord:: NbAchatDay(0)?> </h3>
                          <?php if(Dasbord::NbAchatDay(0)-Dasbord:: NbAchatDay(-1)>0 ) {?>
                           <p class="text-success ml-2 mb-0 font-weight-medium">+<?=Dasbord::NbAchatDay(0)-Dasbord::NbAchatDay(-1)?> </p>
                              <?php }else{?>
                           <p class="text-danger ml-2 mb-0 font-weight-medium"><?=Dasbord::NbAchatDay(0)-Dasbord::NbAchatDay(-1)?></p>
                               <?php } ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <?php if(Dasbord::NbAchatDay(0)-Dasbord::NbAchatDay(-1)>0 ) {?>
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div><?php }else{?>
                          <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>     <?php }?>
                      </div> 
                    </div>
                    <h6 class="text-muted font-weight-normal">Achats Today</h6>
                  </div>
                </div>
              </div>
             
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord:: ProduitAchatDay(0)?> </h3>
                          <?php if(Dasbord:: ProduitAchatDay(0)-Dasbord:: ProduitAchatDay(-1)>0 ) {?>
                           <p class="text-success ml-2 mb-0 font-weight-medium">+<?=Dasbord:: ProduitAchatDay(0)-Dasbord:: ProduitAchatDay(-1)?> </p>
                              <?php }else{?>
                           <p class="text-danger ml-2 mb-0 font-weight-medium"><?=Dasbord:: ProduitAchatDay(0)-Dasbord:: ProduitAchatDay(-1)?></p>
                               <?php } ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <?php if(Dasbord:: ProduitAchatDay(0)-Dasbord:: ProduitAchatDay(-1)>0 ) {?>
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div><?php }else{?>
                          <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>     <?php }?>
                      </div> 
                    </div>
                    <h6 class="text-muted font-weight-normal">Produites Achats Today</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Top Categorie</h4>
                        <h1><?=$cat->nom ?></h1>
                        <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                        <?php foreach($listPhoto as $val){?>
                        <div class="item">
                        <img src="../imgs/<?= $val->photo ?>" alt="">
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Top 5 Produites</h4>
                      <p class="text-muted mb-1">info</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <?php foreach($topProduct as $row){?>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject"><?= $row->pro ?></h6>
                                <p class="text-muted mb-0"><?= $row->com ?> fois</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">Quntite</p>
                                <p class="text-muted mb-0"><?= $row->Qun ?></p>
                              </div>
                            </div>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::NbCommande() ?></h3>
                          </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary ">
                            <span class="menu-icon">
                              <i class="mdi mdi-cart"></i>
                            </span>
                        </div>
                      </div> 
                      
                    </div>
                    <h6 class="text-muted font-weight-normal">Nombres Commande</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::CountStock() ?></h3>
                          </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-info ">
                            <span class="menu-icon">
                              <i class="mdi mdi-laptop"></i>
                            </span>
                        </div>
                      </div> 
                      
                    </div>
                    <h6 class="text-muted font-weight-normal">Stock</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::CountAch() ?></h3>
                          </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger ">
                            <span class="menu-icon">
                            <i class="mdi mdi-basket"></i>
                            </span>
                        </div>
                      </div> 
                      
                    </div>
                    <h6 class="text-muted font-weight-normal">Nombres Achats</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?= Dasbord::NbCli() ?></h3>
                          </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-warning ">
                            <span class="menu-icon">
                            <i class="mdi mdi-account-switch"></i>
                            </span>
                        </div>
                      </div> 
                      
                    </div>
                    <h6 class="text-muted font-weight-normal">Nombres Clients</h6>
                  </div>
                </div>
              </div>
             
            </div>
            <div class="row">
              <div class="col-md-6 col-xl-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Top 5 Clinets</h4>
                     <a href="List_Cli.php"><p class="text-muted mb-1 small">View all</p></a> 
                    </div>
                    <div class="preview-list">
                      <?php foreach($topCli as $row){?>
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                         <a href="../imgs/<?= $row->photo ?>" ><img src="../imgs/<?= $row->photo ?>" alt="image" class="rounded-circle" /></a> 
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject"><?=$row->nom ?></h6>
                              <p class="text-muted text-small"><?= $row->adresse ?>C</p>
                            </div>
                            <p class="text-muted"><?=$row->email ?></p>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tops</h4>
                
                          <div class="preview-item border-bottom">
                           
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Top Commande</h6>
                                <p class="text-muted mb-0">Num:<?= $topCommande->idCom ?> de date <?= $topCommande->date?> </p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">Quntite</p>
                                <p class="text-muted mb-0"><?= $topCommande->cli ?></p>
                              </div>
                            </div>
                          </div>

                          <div class="preview-item border-bottom">
                           
                           <div class="preview-item-content d-sm-flex flex-grow" style="margin-top:10px;">
                             <div class="flex-grow">
                               <h6 class="preview-subject">Top Achat</h6>
                               <p class="text-muted mb-0">Num: <?= $topAch->id ?> de date <?= $topAch->Date ?></p>
                             </div>
                             <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                               <p class="text-muted">Quntite</p>
                               <p class="text-muted mb-0"><?= $topAch->idfour ?></p>
                             </div>
                           </div>
                         </div>
                         
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Countries</h4>
                    <div class="row">
                    
                      <div class="col-md-12">
                        <div id="audience-map" class="vector-map"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include "footer.php" ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>