<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<!-- <div>
    <?php

      $sollicitant = $data;
      FormatTextHelper::ConvertStringToJsonFormat($sollicitant);
      ?>    
</div> -->

<div class="container container-mvckdemo">
   <div class="wrapper-mvckdemo">
      <div class="form-group">
         <h2>Details of sollicitant</h2>
         <form id="DetailsSollicitant" method="GET" action="<?= URLROOT; ?>/Sollicitant/details?id=">
            <div class="form-group row">
               <label class="col-sm-3 control-label">SollicitantNumber</label>
               <input type="number" disabled value="<?= $data->SollicitantNumber ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Gender</label>
               <input type="text" disabled value="<?= $data->Gender ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Title</label>
               <input type="text" disabled value="<?= $data->Title ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">FirstName</label>
               <input type="text" disabled value="<?= $data->FirstName ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">LastName</label>
               <input type="text" disabled value="<?= $data->LastName ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">NickName</label>
               <input type="text" disabled value="<?= $data->NickName ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">BirthDate</label>
               <input type="date" style="width:12rem" disabled value="<?= $data->BirthDate ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Street</label>
               <input type="text" disabled value="<?= $data->Street ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">HomeNumber</label>
               <input type="number" disabled value="<?= $data->HomeNumber ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">NumberExtension</label>
               <input type="text" disabled value="<?= $data->NumberExtension ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">ZipCode</label>
               <input type="text" disabled value="<?= $data->ZipCode ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Place</label>
               <input type="text" disabled value="<?= $data->Place ?>"></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Is active</label>
               <input type="checkbox" disabled <?= $data->IsActive == 1 ? 'checked="true"' : '' ?>></input>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 control-label">Note</label>
               <textarea disabled rows="4" cols="40"><?= $data->Note ?></textarea>
            </div>

            <div class="form-group row float-lg-right">
               <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Sollicitant/index">Back</a>
               <a class="btn btn-warning" href="<?php URLROOT; ?>/Sollicitant/update/<?= $data->Id ?>">Update</a>
            </div>
         </form>
      </div>
   </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>