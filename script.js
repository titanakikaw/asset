$(document).ready(() => {
    let dataTables_lengths = $('.dataTables_length')
    let dataTables_infos = $('.dataTables_info')
    let dataTables_paginates  = $('.dataTables_paginate a')
    dataTables_paginates.map((index, element) => {
        dataTables_paginates[index].style.fontSize = "10px"
    })
    //  console.log($('.dataTables_length'))
    dataTables_lengths.map((index,element) => {
        element.style.display = "none"
        dataTables_infos[index].style.fontSize = "10px"
        
        // dataTables_infos[index].style.textTransform = "Uppercase"
    });
})

function DoughnutGraph(id, labels, data, title) {
    let backgroundColor = [];
    let borderColor = []
    data.forEach(element => {
        let color = getRandomColor();
        backgroundColor.push(color)
        borderColor.push(color.replace('75%', '100%'))
    });

    var ctx = document.getElementById(`${id}`);
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: `# of ${title}`,
                data: data,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                zoom: {
                    zoom: {
                      wheel: {
                        enabled: true,
                      },
                      pinch: {
                        enabled: true
                      },
                      mode: 'xy',
                    }
                  }
            }

        }
    });
}


function Barchart(id, labels, data, title) {
    let backgroundColor = [];
    let borderColor = []
    data.forEach(element => {
        let color = getRandomColor();
        backgroundColor.push(color)
        borderColor.push(color.replace('75%', '100%'))
    });
    var ctx = document.getElementById(`${id}`);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label:title,
                data: data,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                  beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false,
                    position: 'right',
                },
            }

        }
    });
}

function getRandomColor() {
    color = "hsl(" + Math.random() * 360 + ", 70%, 75%)";
    return color;
}