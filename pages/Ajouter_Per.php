<?php
  include "../Controles/Verifier_session.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajouter Personne</title>
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
                    <h4 class="card-title">Nouveau Clinet/Fournisseur</h4>
                    <form class="forms-sample"method="post"  enctype="multipart/form-data" action="../Controles/Controle.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control"  name="nom"  required id="exampleInputName1" placeholder="Nom">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Adresse</label>
                        <input type="text" class="form-control"  name="Adresse" required id="exampleInputEmail3" placeholder="Adresse">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Telephone</label>
                        <input type="text" class="form-control" type="tel"maxlength="10" minlength="10"  name="tel" required id="exampleInputPassword4" placeholder="Telephone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="text" class="form-control" type="email"  name="email" required id="exampleInputPassword4" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Role</label>
                        <select class="form-control" name="role"  id="exampleSelectGender">
                          <option value="2">Client</option>
                          <option value="1" >Fourinsseur</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>photo upload</label>
                        <input type="file" name="file" >
                      </div>
                      <button type="submit"  name="Ajouter_Per" class="btn btn-primary mr-2" onclick="return confirm('Etes vous sur d Ajouter ce Personne ?')">Enregister</button>
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