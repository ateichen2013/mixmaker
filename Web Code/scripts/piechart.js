window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Pie Chart"
		},
		data: [
		{
			type: "pie",
			dataPoints: [
				{ y: 4181563},
				{ y: 2175498},
				{ y: 3125844},
				{ y: 1176121},
				{ y: 1727161},
				{ y: 4303364},
				{ y: 1717786}
			]
		}
		]
	});
	chart.render();
}