/**
 * Theme: Ubold Admin Template
 * Author: Coderthemes
 * Module/App: Flot-Chart
 */

! function($) {
	"use strict";

	var FlotChart = function() {
		this.$body = $("body")
		this.$realData = []
	};

	

	//creates Pie Chart
	FlotChart.prototype.createPieGraph = function(selector, labels, datas, colors) {
		var data = [{
			label : labels[0],
			data : datas[0]
		}, {
			label : labels[1],
			data : datas[1]
		}, {
			label : labels[2],
			data : datas[2]
		}];
		var options = {
			series : {
				pie : {
					show : true
				}
			},
			title: 'My Daily Activities',
			legend : {
				show : false
			},
			grid : {
				hoverable : true,
				clickable : true
			},
			colors : colors,
			tooltip : true,
			tooltipOpts : {
				content : "%s, %d.0% "
			}
		};

		$.plot($(selector), data, options);
	},

	
	
	
	//initializing various charts and components
	FlotChart.prototype.init = function() {
		//plot graph data
		var uploads = [[0, 9], [1, 8], [2, 5], [3, 8], [4, 5], [5, 14], [6, 10]];
		var downloads = [[0, 5], [1, 12], [2, 4], [3, 3], [4, 12], [5, 11], [6, 14]];
		var plabels = ["Visits", "Pages/Visit"];
		var pcolors = ['#7e57c2', '#34d3eb'];
		var borderColor = '#f5f5f5';
		var bgColor = '#fff';
		//this.createPlotGraph("#website-stats", uploads, downloads, plabels, pcolors, borderColor, bgColor);

		//Pie graph data
		var pielabels = ["Series 1", "Series 2", "Series 3"];
		var datas = [20, 30, 15];
		var colors = ['#7e57c2', '#34d3eb', "#ebeff2"];
		this.createPieGraph("#pie-chart #pie-chart-container", pielabels, datas, colors);

	},

	//init flotchart
	$.FlotChart = new FlotChart, $.FlotChart.Constructor =
	FlotChart

}(window.jQuery),

//initializing flotchart
function($) {
	"use strict";
	$.FlotChart.init()
}(window.jQuery);



