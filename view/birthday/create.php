<div class="container">

<h1>instructies</h1>
<p>Vul de naam en de geboortedatum in en klik op "verzenden" om het op te slaan in de database.</p>

	<form action="<?= URL ?>birthday/createSave" method="post">
	
		<input type="text" name="name" placeholder="voor- en achternaam">
		<input type="text" name="day" placeholder="geboortedag 1">
		<input type="text" name="month" placeholder="geboortemaand 7">
		<input type="text" name="year" placeholder="geboortejaar 1977">

		<input type="submit" value="Verzenden">
	
	</form>

</div>