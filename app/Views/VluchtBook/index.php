<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<!-- <div class="form-group">
    <a class="btn btn-success float-right mb-2 extra-mrt" href="<?= URLROOT; ?>/VluchtBook/create">Create new VluchtBook</a>
</div>
<div class="mt-4"></div> -->

<!-- <div>
    <?php
    $VluchtBooks = $data['VluchtBooks'];
    FormatTextHelper::ConvertStringToJsonFormat($VluchtBooks);
    ?>    
</div> -->

<input type="text" id="VluchtInput" onkeyup="ZoekenVlucht()" placeholder="Search for vlucht" title="Search for vlucht">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Volledige naam</th>
            <th>Geboortedatum</th>
            <th>Straat</th>
            <th>Huisnummer</th>
            <th>Toevoeging</th>
            <th>Postcode</th>
            <th>Plaats</th>
            <th>Mobiel</th>
            <th>Email</th>
            <th>Bestemming</th>
            <th>Vertrekdatum</th>
            <th>Vertrektijd</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['VluchtBooks'] as $VluchtBook) { ?>
        <tr>
            <input type="hidden" id="id" value="<?= $VluchtBook->Id ?>">
            <td> <?= $VluchtBook->Voornaam . ' ' . $VluchtBook->Achternaam ?> </td>
            <td> <?= $VluchtBook->Geboortedatum ?> </td>
            <td> <?= $VluchtBook->Straat ?> </td>
            <td> <?= $VluchtBook->Huisnummer ?> </td>
            <td> <?= $VluchtBook->Toevoeging ?> </td>
            <td> <?= $VluchtBook->Postcode ?> </td>
            <td> <?= $VluchtBook->Plaats ?> </td>
            <td> <?= $VluchtBook->Mobiel ?> </td>
            <td> <?= $VluchtBook->Email ?> </td>
            <td> <?= $VluchtBook->Bestemming ?> </td>
            <td> <?= $VluchtBook->Vertrekdatum ?> </td>
            <td> <?= $VluchtBook->Vertrektijd ?> </td>
            <td class="float-right">
                <a class="btn btn-danger" href="<?= URLROOT ?>/VluchtBook/delete/<?= $VluchtBook->Id ?>"><i
                        class="fab fa-trash" title="VluchtBook wijzigen"></i></a>
                <a class="btn btn-warning" href="<?= URLROOT ?>/VluchtBook/update/<?= $VluchtBook->Id ?>"><i
                        class="fab fa-pencil" title="VluchtBook verwijderen"></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
function ZoekenVlucht() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("VluchtInput");
    filter = input.value.toUpperCase();

    // Get all the tables inside the tbody and loop through them to find the matching rows
    var tables = document.getElementsByTagName("tbody");
    for (var i = 0; i < tables.length; i++) {
        tr = tables[i].getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

}
</script>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>