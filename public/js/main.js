
function handleDeparmentsAndCitiesSelectors(deparmentsSelector, citiesSelector) {
	var $deparmentsSelect = $(deparmentsSelector);
	var $citiesSelect = $(citiesSelector);
	var loadedData = [];
	var jsonSourceUri = '/js/colombia.json';

	if ($deparmentsSelect.length === 0 || $citiesSelect.length === 0) return;

	function loadData() {
		$.get(jsonSourceUri, function (data) {
			if (data.length > 0) {
				console.log(data);
				// Convert department array to be an object
				loadedData = data.reduce(function(carry, value) {
					carry[value.departamento] = value;
					return carry;
				}, {});

				console.log(loadedData);

				// loadDeparments();
			}
		});
	}

	function loadDeparments() {
		if (loadedData.length === 0) return;

		var departmentKeys = Object.keys(loadedData);

		$(departmentKeys).each(function(index, key) {
			var department = loadedData[key];
			var option = $("<option>").attr('value', department.departamento).text(department.departamento);
			$deparmentsSelect.append(option);
		});

		loadCities(departmentKeys[0]); // Loads cities for the first department
	}

	function loadCities(deparment) {
		$citiesSelect.find('option').remove(); // Clean the selector

		var department = loadedData[deparment] || {}; // Load cities by department
		var cities = department.ciudades || [];

		// Fill cities select
		$(cities).each(function(index, city) {
			var option = $("<option>").attr('value', city).text(city);
			$citiesSelect.append(option);
		});
	}

	$deparmentsSelect.on('change', function () {
		loadCities(this.value);
	});

	loadData();

}
