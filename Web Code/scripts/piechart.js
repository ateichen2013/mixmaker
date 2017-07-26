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
			legendText: "{indexLabel}",
			dataPoints: [
				{  y: 30, indexLabel: "apple" },
				{  y: 30, indexLabel: "Fruitpunch" },
				{  y: 30, indexLabel: "Grape" },
				{  y: 0, indexLabel: "Lemonade"},
			]
		}
		]
	});
	chart.render();
}