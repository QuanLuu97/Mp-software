<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.multiselect-container>li>a>label {
			  padding: 4px 20px 3px 20px;
			}
	</style>
</head>
<body>
<form id="form1">

	<div style="padding:20px">

	<select id="chkveg" multiple="multiple">

	<option value="cheese">Cheese</option>

	<option value="tomatoes">Tomatoes</option>

	<option value="mozarella">Mozzarella</option>

	<option value="mushrooms">Mushrooms</option>

	<option value="pepperoni">Pepperoni</option>

	<option value="onions">Onions</option>

	</select><br /><br />

	<input type="button" id="btnget" value="Get Selected Values" />

	</div>

</form>
</body>
</html>

<script type="text/javascript">

$('#chkveg').multiselect({

includeSelectAllOption: true

});

$('#btnget').click(function() {

	alert($('#chkveg').val());

})

</script>