<?php
  include "../Controles/Verifier_session.php";
?>
<?php
   require_once("../Class/Class_Cat.php");
   require_once("../Class/Class_Produit.php");
?>
<?php  
   $listCat=Cat::afficher();
   if(isset($_GET['idcat'])) $ListPro=Produit::ListPCat($_GET['idcat']);
   $listTicket=Ticket:: afficher();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion Caisse</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php  include "menu.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <?php include "header.php";?>
        <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">
            <div class="row" >
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card" >
                        <div class="card-body">
                                <h4 class="card-title">Categorie</h4>
                                <div class="row" > 
                                <?php  foreach($listCat as $ligne){ ?>
                                   <div class="col-md-12 grid-margin stretch-card">
                                      <div class="card" style="background-color:#000 ;" > 
                                         <div class="card-body">
                                             <h5 class="card-title"><?php echo $ligne->nom ?></h5>
                                             <div class="icon icon-box-success">
                                              <a href="Gestion_Caisse.php?idcat=<?=$ligne->id ?>"><span class="mdi mdi-apps text-primary"></span></a> 
                                            </div>
                                         </div>
                                     </div>
                                  </div>
                                 <?php } ?>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card" >
                        <div class="card-body">
                                <h4 class="card-title">Produites</h4>
                                <form class="forms-sample" method="post" action="../Controles/Controle.php">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                            <th></th>
                                            <th>Libelle</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                  if(isset($ListPro)){
                                                      foreach($ListPro as $row){ ?>
                                                <tr>
                                                    <td>
                                                       <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                            <input type="radio" name="pro"  value="<?= $row->ref ?>" class="form-check-input">
                                                            </label>
                                                       </div>
                                                    </td>
                                                    <td><?php echo $row->lib ?></td>  
                                                </tr>
                                                <?php  } } ?>
                                            </tbody>
                                      </table>
                                   </div>
                                   <div class="form-group" style="margin-top:10px;">
                                        <label for="exampleInputUsername1">Quntite</label>
                                        <input type="number"  name="Qun" min="1" value="1" class="form-control" id="exampleInputUsername1" placeholder="Quntite">
                                   </div>
                                   <button type="submit" name="Ajouter_Ticket" class="btn btn-primary mr-2">Ajouter</button>
                                   <button  type="reset" class="btn btn-dark">Annuler</button>
                             </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                  <div class="card" >
                        <div class="card-body">
                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Moyenne Caisse</h6>
                        <!-- <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p> -->
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">Dh<?= Ticket::Calcl_Moy() ?></h6>
                      </div>
                    </div>
                                <h4 class="card-title" style="margin-top:10px;">Tiket</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                            <th>Libelle</th>
                                            <th>Quntite</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                             <?php foreach($listTicket as $row){ ?>
                                                <tr>
                                                    <td><?php echo $row->idPro ?></td>
                                                    <td><?php echo $row->Qun ?></td>  
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                      </table>
                                   </div>         
                        </div>
                    </div>
                </div>
         </div>
   </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
        <?php include  "footer.php" ?>
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>