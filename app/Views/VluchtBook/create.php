<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Create new Sollicitant</h2>
            <form id="CreateSollicitant" method="POST" action="<?= URLROOT; ?>/Sollicitant/create" autocomplete="on">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Sollicitant number *</label>
                    <input type="number" class="input-field-error-message" name="SollicitantNumber" required="true"">
                        <span class=" invalidFeedback"><?= $data->SollicitantNumberError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Gender *</label>
                    <select id="ddlGender" name="Genders" style="width:11.7rem;">
                        <option value="" disabled selected>Choose gender</option>
                        <option value="Male" <?= ($data->Gender == "Male") ? "selected" : "" ?>>Male</option>
                        <option value="Female" <?= ($data->Gender == "Female") ? "selected" : "" ?>>Female</option>
                        <option value="Transgender" <?= ($data->Gender == "Transgender") ? "selected" : "" ?>>Transgender</option>
                        <span class="invalidFeedback"><?= $data->GenderError ?></span>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Title</label>
                    <select id="ddlTitle" name="Titles" style="width:11.7rem;">
                        <option value="" disabled selected>Choose title</option>
                        <option value="Mr" <?= ($data->Title == "Mr") ? "selected" : "" ?>>Mr</option>
                        <option value="Mrs" <?= ($data->Title == "Mrs") ? "selected" : "" ?>>Mrs</option>
                        <option value="Miss" <?= ($data->Title == "Miss") ? "selected" : "" ?>>Miss</option>
                        <span class="invalidFeedback"><?= $data->TitleError ?></span>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">FirstName *</label>
                    <input type="text" class="input-field-error-message" name="FirstName" required="true" maxlength="50">
                    <span class="invalidFeedback"><?= $data->FirstNameError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">LastName *</label>
                    <input type="text" class="input-field-error-message" name="LastName" required="true" maxlength="50">
                    <span class="invalidFeedback"><?= $data->LastNameError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">NickName</label>
                    <input type="text" class="input-field-error-message" name="NickName" maxlength="50">
                    <span class="invalidFeedback"><?= $data->NickNameError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">BirthDate *</label>
                    <input type="date" style="width:11.7rem;" class="input-field-error-message" name="BirthDate" required="true">
                    <span class="invalidFeedback"><?= $data->BirthDateError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Street *</label>
                    <input type="text" class="input-field-error-message" name="Street" required="true" maxlength="50">
                    <span class="invalidFeedback"><?= $data->StreetError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">HomeNumber *</label>
                    <input type="number" class="input-field-error-message" name="HomeNumber" required="true">
                    <span class="invalidFeedback"><?= $data->HomeNumberError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">NumberExtension</label>
                    <input type="text" class="input-field-error-message" name="NumberExtension" maxlength="10">
                    <span class="invalidFeedback"><?= $data->NumberExtensionError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">ZipCode *</label>
                    <input type="text" class="input-field-error-message" name="ZipCode" required="true" maxlength="10">
                    <span class="invalidFeedback"><?= $data->ZipCodeError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Place *</label>
                    <input type="text" class="input-field-error-message" name="Place" required="true" maxlength="50">
                    <span class="invalidFeedback"><?= $data->PlaceError ?></span>
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Is active </label>
                    <input type="checkbox" name="IsActive" <?= $data->IsActive == 1 ? 'checked="true"' : '' ?>></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Note</label>
                    <textarea name="Note" rows="4" cols="40" maxlength="200"></textarea>
                    <span class="invalidFeedback"><?= $data->NoteError ?></span>
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Sollicitant/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>