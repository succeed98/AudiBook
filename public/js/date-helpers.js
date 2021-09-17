function getWeekDay(date) {
	var days = ['Sunday', 'Monday', 'Tuesday', 'Wednessday',
		'Thursday', 'Friday', 'Saturday'];

	return days[date.getDay()];
}

