<?php
  include "../Controles/Verifier_session.php";
?>

<?php 
  require_once("../Class/Class_Cat.php");
  require_once("../Class/Class_Produit.php");
  require_once("../Class/Class_Four.php");
?>

<?php
   $list=Four::affich();
   $listPro=Produit::afficher_pro();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajouter Achat</title>
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
        <?php  include "header.php" ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nouveau Achat</h4>
                    <form class="forms-sample" method="post" action="../Controles/Controle.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Date</label>
                        <input type="date" class="form-control" name="date"  required id="exampleInputName1" placeholder="date">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">forunisseur</label>
                        <select name="IdFour" class="form-control" id="exampleSelectGender"> 
                             <?php  foreach($list as $ligne){ ?>
                            <option value="<?= $ligne->id; ?> >"><?php echo $ligne->nom; ?></option>;
                            <?php }?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Produites</label>
                            <div class="col-lg-12 grid-margin stretch-card" >
                               <div class="card" style="background-color:#12151e;">
                                  <div class="card-body">
                                    <div class="table-responsive">
                                       <table class="table">
                                         <thead>
                                           <tr>
                                            <th></th>
                                            <th>Libelle</th>
                                            <th>Quntite</th>
                                          </tr>
                                         </thead>
                                         <tbody>
                                            <?php  foreach($listPro as $ligne){ ?>
                                           <tr>
                                                <td>      <div class="form-check form-check-primary">
                                                      <input type="checkbox"   name="Ach[]" class="form-check-input">  </div>
                                                     <input type="hidden" value="<?= $ligne->ref ?>" name="Ach[]"   class="form-control" id="exampleInputConfirmPassword1" >
                                                </td>
                                                <td><?php echo $ligne->lib ?></td>
                                                <td> <input type="number" min="1" value="1" name="Ach[]" class="form-control" id="exampleInputConfirmPassword1" placeholder="Quntite"></td>
                                           </tr>
                                          <?php } ?>
                                        </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                     
                      <button type="submit"name="Ajouter_Achat" class="btn btn-primary mr-2"  onclick="return confirm('Etes vous sur d Ajouter cette Achat ?')" >Enregister</button>
                      <button type="reset" class="btn btn-dark">Annuler</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php  include "footer.php" ?>
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