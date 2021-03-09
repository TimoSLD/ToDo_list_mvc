<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
$list = getList($id);
?>
<h1>lijst verwijderen</h1>
<p>Weet je zeker dat je <span class="text-danger font-weight-bold"><?= $list['titel'] ?></span> wilt verwijderen</p>
<div>
    <a href="<?= URL ?>/list/index"><button>nee</button></a>
    <a href="<?= URL ?>/list/destroy/<?= $list['id'] ?>"><button class="btn-danger pl-5 pr-5 ml-5">ja</button></a>
</div>

