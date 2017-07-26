window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme2",
		title:{
			text: "Mixmaker Drink Percentages"
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
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