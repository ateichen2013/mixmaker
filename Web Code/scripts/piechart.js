window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme2",
		data: [
		{
			type: "pie",
			showInLegend: false,
			toolTipContent: "#percent %",
//			yValueFormatString: "#0.#",
			dataPoints: [
				{  y: 30 },
				{  y: 30 },
				{  y: 30 },
				{  y: 0 },
			]
		}
		]
	});
	chart.render();
}