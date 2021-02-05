function createPieAge(idPie, data)
{
    dataArray = data;
    var ctx = document.getElementById('pie_age_' + idPie).getContext('2d');

    data = {
        datasets: [{
            data: dataArray,
            backgroundColor: [
                'rgb(086, 226, 207)',
                'rgb(086, 174, 226)',
                'rgb(086, 104, 226)',
                'rgb(138, 086, 226)',
                'rgb(207, 086, 226)',
                'rgb(226, 086, 174)',
                'rgb(226, 086, 104)',
                'rgb(226, 137, 086)',
                'rgb(226, 207, 086)',
                'rgb(174, 226, 086)',
                'rgb(104, 226, 086)',
                'rgb(086, 226, 137)',
            ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            '0 - 9 ans',
            '10 - 17 ans',
            '18 - 24 ans',
            '25 - 29 ans',
            '30 - 39 ans',
            '40 - 49 ans',
            '50 - 59 ans',
            '60 - 64 ans',
            '65 - 69 ans',
            '70 - 74 ans',
            '75 - 79 ans',
            '+ 80 ans'
        ]
    };
    
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            legend: {
                position: 'right',
            }
        }
    });
}

function createPieSexe(idPie, data)
{
    dataArray = data;
    var ctx = document.getElementById('pie_sexe_' + idPie).getContext('2d');

    data = {
        datasets: [{
            data: dataArray,
            backgroundColor: [
                'rgb(0, 20, 200)',
                'rgb(200, 20, 0)',
            ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Masculin',
            'Féminin',
        ]
    };
    
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            legend: {
                position: 'right',
            }
        }
    });
}

function createChart(regionId, data, date)
{
    data = JSON.parse(data);
    date = JSON.parse(date.replaceAll("'", '"'));
    
    var ctx = document.getElementById('chart_' + regionId).getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: regionId,
                backgroundColor: 'rgba(150, 150, 90,1)',
                borderColor: 'rgba(50, 200, 80,1)',
                fill: false,
                data: data
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                        }
                }]
            }
        }
    });	
}

function createChartFrance(data, date) 
{
	data = JSON.parse(data.replaceAll("'", '"'));
	date = JSON.parse(date.replaceAll("'", '"'));
    
    var ctx = document.getElementById('chart_fr').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: "France",
                borderColor: '#054688',
                fill: false,
                data: data
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                        }
                }]
            }
        }
    });	
}

function createChartPourcentAge(dataFirst, dataSecond) 
{    
    var ctx = document.getElementById('chart_age_fr').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                '0-24 ans',
                '25-49 ans',
                '50-64 ans',
                '65-74 ans',
                '75 ans et plus'
            ],
            datasets: [{
				label: '1ère dose',
				backgroundColor: 'rgb(65, 108, 223)',
				data: dataFirst
			}, {
				label: '2nde dose',
				backgroundColor: 'rgb(16, 140, 19)',
				data: dataSecond
			}],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 0, 
                        max: 100,
                        stepSize: 10
                    }
                }]
            }
        }
    });	
}