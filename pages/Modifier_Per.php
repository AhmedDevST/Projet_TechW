<?php
  include "../Controles/Verifier_session.php";
?>

<?php
   require_once("../Class/Class_personne.php");
?>

<?php 
   $personne=Personne::get_personne($_GET['idper']);
   if($personne->role==1){ $nom1="Fournisseur"; $nom2="Client"; $val1="1"; $val2="2";}
   else{$nom1="Client"; $nom2="Fournisseur"; $val1="2"; $val2="1";}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier Personne</title>
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
                    <h4 class="card-title">Modifier <?= $nom1 ?></h4>
                    <form class="forms-sample" method="post"   enctype="multipart/form-data"  action="../Controles/Controle.php">
                    <input type="hidden" class="form-control" id="exampleInputEmail3"  name="id" value="<?=  $personne->id?>"  required>
                      <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name="nom" value="<?= $personne->nom ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Adresse</label>
                        <input type="text" class="form-control" id="exampleInputEmail3"  name="Adresse" value="<?=  $personne->adresse?>"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Telephone</label>
                        <input  class="form-control" id="exampleInputPassword4" type="tel" maxlength="10" minlength="10"  name="tel" value="<?=  $personne->tele ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword4" name="email" value="<?=  $personne->email ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Role</label>
                        <select class="form-control" id="exampleSelectGender" name="role">
                          <option value=<?= $val1 ?>><?= $nom1 ?></option>
                          <option value=<?= $val2 ?>><?= $nom2 ?></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Photo upload</label>
                        <input type="file" name="file" >
                      </div>
                      <button type="submit"  name="Modifier_Per" class="btn btn-primary mr-2" onclick="return confirm('Etes vous sur de modifier ce personne ?')">Enregister</button>
                      <button type="reset" class="btn btn-dark">Annuler</button>
                    </form>
                  </div>
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