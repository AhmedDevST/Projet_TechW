<?php
  include "../Controles/Verifier_session.php";
?>

<?php   
  require_once("../Class/Class_commande.php");
  require_once("../Class/Class_LnCommande.php");
?>
<?php //message
     if(isset($_GET['mess'])){
      if($_GET['mess']==2){
        echo "<script>alert('l opration  est echoue')</script>";
      } else  echo "<script>alert('l operation  est fait avec seccus')</script>";
      ?>
      <meta http-equiv="refresh" content="0; url=http://localhost/Projet_TechW/pages/Gestion_Commande.php "/>; 
   <?php } ?>
<?php  
  $list_Commande=Commande::afficher();
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de Commandes</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Numero</th>
                          <th>Date</th>
                          <th>Client</th>
                          <th >Produites</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php foreach($list_Commande as $row) {?>
                      <tr>
                          <td><?php echo $row->idCom ?></td>
                          <td><?php echo $row->date ?></td>
                          <td><?php echo $row->cli ?></td>
                          <td> <a href="Produits_Commande.php?id=<?= $row->idCom ?>">  <button type="button" class="btn btn-inverse-info btn-fw">Info</button></a>
                          </td>
                          <td>  
                            <a href="Modifier_Commande.php?id=<?=$row->idCom ?> "><button type="button" class="btn btn-inverse-warning btn-fw">Modifier</button></a>
                            <a href="../Controles/Controle.php?idCom=<?=$row->idCom ?> "> <button type="button" class="btn btn-inverse-danger btn-fw"  onclick="return confirm('Etes vous sur de supprimer ce Commande ?')" >Supprimer</button></a>
                          </td>
                      </tr>
                      <?php  } ?>
                      </tbody>
                    </table>
                  </div>
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