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
                display: !isMobileDevice()
            }, 
            responsive: true,
            maintainAspectRatio : false
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
                display: !isMobileDevice()
            },
            responsive: true,
            maintainAspectRatio : false
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

const footer = (tooltipItems) => {
    let sum = 0;

    tooltipItems.forEach(function(tooltipItem) {
        sum += tooltipItem.parsed.y;
    });
    return 'Somme : ' + sum;
};

function createChartFrance(data, dataSecond, date) 
{
	data = JSON.parse(data.replaceAll("'", '"'));
    dataSecond = JSON.parse(dataSecond.replaceAll("'", '"'));
	date = JSON.parse(date.replaceAll("'", '"'));
    
    var ctx = document.getElementById('chart_fr').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: "1ère dose",
                borderColor: '#054688',
                backgroundColor: 'rgb(15, 84, 155, 0.3)',
                fill: true,
                data: data
            }, {
                label: "2nde dose",
                borderColor: '#0473e3',
                backgroundColor: 'rgb(4, 115, 227, 0.3)',
                fill: true,
                data: dataSecond
            }]
        },
        options: {
            scales: {
                y: {
                    stacked: true
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            plugins: {
                tooltip: {
                  callbacks: {
                    footer: footer,
                  }
                }
            }
        }
    });	
}


function createChartDailyFrance(data, dataSecond, dataAverage, date) 
{
    var ctx = document.getElementById('chart_daily_fr').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: date,
            datasets: [{
                label: "Moyenne sur 7 jours",
                borderColor: '#fe410e',
                fill: false,
                data: dataAverage,
                tension: 0.4,
                type: 'line'
            }, {
                label: "1ère dose",
                borderColor: '#054688',
                backgroundColor: 'rgb(15, 84, 155, 1)',
                fill: true,
                data: data
            }, {
                label: "2nde dose",
                borderColor: '#0473e3',
                backgroundColor: 'rgb(4, 115, 227, 1)',
                fill: true,
                data: dataSecond
            }]
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            },
            elements: {
                point:{
                    radius: 0
                }
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
                '0-17 ans',
                '18-29 ans',
                '30-49 ans',
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
                y: {
                    min: 0,
                    max: 100,
                    stepSize: 10
                }
            }
        }
    });	
}

function createPieFrance(idPie, data)
{
    dataArray = data;
    var ctx = document.getElementById(idPie).getContext('2d');

    data = {
        datasets: [{
            data: [
                data[0],
                0,
                100 - data[0]
            ],
            backgroundColor: [
                'rgb(0, 200, 0)',
                '#01570f',
                '#b3b3b3',
            ]
        }, {
            data: [
                0,
                data[1],
                100 - data[1]
            ],
            backgroundColor: [
                'rgb(0, 200, 0)',
                '#01570f',
                '#b3b3b3',
            ]
        }],
        labels: [
            '1ère dose - ' + data[0] + ' %',
            '2nde dose - ' + data[1] + ' %',
            'Restant'
        ]
    };
    
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            responsive: true,
            maintainAspectRatio : false
        }
    });
}


function createChartExtrapol(id, data, incidence, incidenceAll, incidence80, date) 
{    
	var canvas = document.getElementById('chart_fr_' + id);
	if(window.innerWidth <= 500) {
        canvas.height = 300; 
    } 
    var ctx = document.getElementById('chart_fr_' + id).getContext('2d');
    var legend = "Incidence";
    if(id === 'hosp') {
        legend = "Hospitalisation";
    }

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: "Pourcentage 1ère dose + 80 ans",
                borderColor: '#054688',
                backgroundColor: 'rgb(15, 84, 155, 0.3)',
                fill: true,
                data: data,
                yAxisID: "y1",
                pointRadius: 2
            }, {
                label: legend + " + 90 ans",
                borderColor: 'red',
                backgroundColor: 'rgb(216, 30, 30, 0.3)',
                fill: false,
                data: incidence,
                yAxisID: "y2",
                pointRadius: 2,
            }, {
                label: legend + " 80-89 ans",
                borderColor: 'magenta',
                backgroundColor: 'rgb(216, 30, 30, 0.3)',
                fill: false,
                data: incidence80,
                yAxisID: "y2",
                pointRadius: 2,
            }, {
                label: legend + " France",
                borderColor: 'green',
                backgroundColor: 'rgb(30, 216, 30, 0.3)',
                fill: false,
                data: incidenceAll,
                yAxisID: "y2",
                pointRadius: 2,
            }]
        },
        options: {
            scales: {
                y1: {
                    title: {
                        display: true,
                        text: '% 1ère dose + 80 ans'
                    },
                    stacked: true,
                    type: "linear",
                    display: true,
                    position: "left",
                },
                y2: {
                    title: {
                        display: true,
                        text: legend
                    },
                    type: "linear",
                    display: true,
                    position: "right",
					suggestedMin: 0,
                }
            }
        }
    });	
}


function createChartDeliveries(dataPfizer, dataModerna, dataAstra, dataJanssen, date) 
{    
    var ctx = document.getElementById('chart_deliveries').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: "Pfizer",
                backgroundColor: 'rgb(219, 87, 51, 1)',
                fill: true,
                data: dataPfizer,
                pointRadius: 0
            }, {
                label: "Moderna",
                backgroundColor: 'rgb(25, 229, 250, 1)',
                fill: true,
                data: dataModerna,
                pointRadius: 0
            }, {
                label: "AstraZeneca",
                backgroundColor: 'rgb(59, 213, 21, 1)',
                fill: true,
                data: dataAstra,
                pointRadius: 0
            }, {
                label: "Janssen",
                backgroundColor: 'rgb(118, 53, 170, 1)',
                fill: true,
                data: dataJanssen,
                pointRadius: 0
            }]
        },
        options: {
            interaction: {
                intersect: false,
                mode: 'x',
            },
            scales: {
                y: {
                    stacked: true
                }
            },
			plugins: {
                tooltip: {
                  callbacks: {
                    footer: footer,
                  }
                }
            }
        }
    });	
}

function isMobileDevice(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}