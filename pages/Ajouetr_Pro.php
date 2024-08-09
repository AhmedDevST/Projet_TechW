<?php
  include "../Controles/Verifier_session.php";
?>

<?php 
  require_once("../Class/Class_Cat.php");
?>

<?php
  $list=Cat::afficher();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajouter Produite</title>
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
      <?php include "Menu.php" ?>
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
                    <h4 class="card-title">Nouveau Produite</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="../Controles/Controle.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Libelle</label>
                        <input type="text" class="form-control" name="lib" required id="exampleInputName1" placeholder="Libelle">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Prix Unitaire</label>
                        <input type="text" class="form-control"  name="prixu" required id="exampleInputEmail3" placeholder="Prix Unitaire">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Prix Achat</label>
                        <input type="text" class="form-control" name="prixa" required id="exampleInputPassword4" placeholder="Prix Achat">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Quantite</label>
                        <input type="number" class="form-control" name="Quns"  min="1" required id="exampleInputPassword4" placeholder="Quantite">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Categorie</label>
                        <select  class="form-control" name="cat" id=""> 
                          <?php  foreach($list as $ligne){ ?>
                            <option value="<?php echo $ligne->id; ?> >"><?php echo $ligne->nom; ?></option>;
                          <?php }?>
                         </select>                  

                      </div>
                      <div class="form-group">
                        <label>Photo upload</label>
                        <input type="file" name="file"  >
                      </div>
                      
                      <button type="submit" name="Ajouter_Pro" class="btn btn-primary mr-2" onclick="return confirm('Etes vous sur d Ajouter ce Produit ?')" >Enregister</button>
                      <button type="reset" class="btn btn-dark">Annuler</button>
                    </form>
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