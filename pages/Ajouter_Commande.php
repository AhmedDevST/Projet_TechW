<?php
  include "../Controles/Verifier_session.php";
?>

<?php 
  require_once("../Class/Class_Cat.php");
  require_once("../Class/Class_Produit.php");
  require_once("../Class/Class_Client.php");
?>
<?php
   $list=Client::affich();
   $listPro=Produit::afficher_pro();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion Commandes</title>
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
     <?php  include "Menu.php" ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
       <?php include "header.php" ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nouveau Commande</h4>
                   <form class="forms-sample" method="post" action="../Controles/Controle.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Date</label>
                        <input type="Date" name="date" class="form-control"  required id="exampleInputName1" placeholder="Date">
                     </div>
                    
                      <div class="form-group">
                        <label for="exampleSelectGender">Client</label>
                        <select name="IdCli" class="form-control" id="exampleSelectGender"> 
                            <?php  foreach($list as $ligne){ ?>
                            <option value="<?= $ligne->id; ?> >"><?php echo $ligne->nom; ?></option>;
                            <?php }?>
                       </select>
                      </div>
                    <div class="form-group"> 
                         <label for="exampleSelectGender">Produites</label>
                        
                       <div class="row" >
                          <?php  foreach($listPro as $row){ ?>
                          <div class="col-md-6 grid-margin stretch-card" >
                               <div class="card" style="background-color:#12151e;">
                                   <div class="card-body">
                                   <a href="../imgs/<?=$row->photo ?>"><img src="../imgs/<?=$row->photo ?>" width="50PX"  alt="Photo"></a>
                                      <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox"    name="Pro[]" class="form-check-input"><?php echo $row->lib ?> </label>
                                      </div>
                                        <p class="card-description">Categorie: <?php echo $row->cat ?></p>
                                        <p class="card-description">Prix Unitaire: <?php echo $row->prixU ?></p>
                                        <div class="forms-sample">
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Quntite</label>
                                                <input type="hidden" value="<?= $row->ref ?>" name="Pro[]"   class="form-control" id="exampleInputConfirmPassword1" >
                                                <input type="number" min="1" value="1" name="Pro[]" class="form-control" id="exampleInputConfirmPassword1" placeholder="Quntite">
                                            </div>
                         </div>
                                 </div>
                             </div>
                         </div> 
                          <?php } ?>
                     </div>
                    </div>
                    <button type="submit" name="Ajouter_Commande" class="btn btn-primary mr-2"  onclick="return confirm('Etes vous sur d Ajouter ce Commande ?')" >Valider</button>
                      <button type="reset" class="btn btn-dark">Annuler</button>
                 </div>
                    </form>
                  </div>
                </div>
              </div>
       
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
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