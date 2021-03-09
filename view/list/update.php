<h1>Lijst wijzigen</h1>
<form name="update" method="post" action="<?=URL?>list/update/<?=$list['id']?>">
	<input type="text" id="titel" name="titel" placeholder="Titel" value="<?=$list["titel"] ?>" required>
	<input type="submit" value="Update!">
	<!--  Bouw hier de rest van je formulier   -->
</form>