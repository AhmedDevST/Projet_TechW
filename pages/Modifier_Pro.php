<?php
  include "../Controles/Verifier_session.php";
?>

<?php 
  require_once("../Class/Class_Cat.php");
  require_once("../Class/Class_Produit.php");
?>

<?php     
   $produit=Produit::get_produit( $_GET['id']);
   $list=Cat::select($produit->cat);
   $cat=Cat::getCat($produit->cat);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier Produite</title>
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
                    <h4 class="card-title">Modifier Produite</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="../Controles/Controle.php">
                    <input type="hidden" class="form-control" id="exampleInputName1" name="ref"  value="<?= $produit->ref ?>" required>  
                      <div class="form-group">
                        <label for="exampleInputName1">Libelle</label>
                        <input type="text" class="form-control" id="exampleInputName1"name="lib"  value="<?= $produit->lib ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Prix Unitaire</label>
                        <input type="text" class="form-control" id="exampleInputEmail3"  name="prixu"  value="<?= $produit->prixU ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Prix Achat</label>
                        <input type="text" class="form-control" id="exampleInputPassword4"  name="prixa"  value="<?=  $produit->prixA ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Quantite</label>
                        <input type="number" class="form-control" id="exampleInputPassword4"  name="Quns" min="1"   value="<?= $produit->Quns ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Categorie</label>
                        <select  class="form-control" name="cat" id=""> 
                        <option value="<?php echo $cat->id; ?> >"><?php echo $cat->nom; ?></option>;
                          <?php  foreach($list as $ligne){ ?>
                            <option value="<?php echo $ligne->id; ?> >"><?php echo $ligne->nom; ?></option>;
                          <?php }?>
                         </select>   
                      </div>
                      <div class="form-group">
                        <label>Photo upload</label>
                        <input type="file" name="file" >
                      </div>
                      <button type="submit" name="Modifer_Pro" class="btn btn-primary mr-2"onclick="return confirm('Etes vous sur de modifier ce produit ?')" >Enregister</button>
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