const bar1 = document.getElementById('barChartExample1');
const bar2 = document.getElementById('barChartExample2');
const lineCahrt = document.getElementById('lineCahrt');
const lineCahrt1 = document.getElementById('lineCahrt1');
const sales = document.getElementById('sales');
const sales1 = document.getElementById('sales1');
const visit = document.getElementById('visit');
const credit = document.getElementById('credit');
const channel = document.getElementById('channel');
const direct = document.getElementById('direct');

if(bar1){
    new Chart(bar1, {
      type: 'bar',
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [
          {
            label: 'Data Set 1',
            data: [65, 59, 80, 81, 56, 55 , 40],
            backgroundColor: '#9a39f5',
          },
          {
            label: 'Data Set 2',
            data: [35, 40, 60, 47, 88, 27, 30],
            backgroundColor: '#424345',
          },
        ]
      },
      options: {
        scales:{
            y:{
                ticks:{
                    display : false,
                }
            },
            x:{
                ticks:{
                    display : false,
                }
            },
        },
        responsive: true,
      }
    });
}

if(bar2){
    new Chart(bar2, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [
          {
            label: 'Data Set 1',
            data: [65, 59, 80, 81, 56, 55 , 40],
            backgroundColor: '#424345',
          },
          {
            label: 'Data Set 2',
            data: [35, 40, 60, 47, 88, 27, 30],
            backgroundColor: '#b4707b',
          },
        ]
      },
      options: {
        scales:{
            y:{
                ticks:{
                    display : false,
                }
            },
            x:{
                ticks:{
                    display : false,
                }
            },
        },
        responsive: true,
      }
    });
}

if(lineCahrt){
    new Chart(lineCahrt, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
          datasets: [
          {
            label: 'Page Visitors',
            data: [20, 27, 20, 35, 30, 40 , 33 , 25 , 39],
            borderColor: '#9a39f5',
            tension: 0.3,
          },
          {
            label: 'Page Views',
            data: [25, 17, 28, 25, 33, 27, 30 , 33, 27],
            borderColor: '#b4707b',
            tension: 0.3,
          },
        ]
      },
      options: {
        scales:{
            y:{
                min: 10,
                max: 60,
            },
        },
        responsive: true,
      }
    });
}

if(lineCahrt1){
    new Chart(lineCahrt1, {
      type: 'line',
      data: {
        labels: ['A', 'B', 'c', 'D', 'E', 'F', 'G', 'H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T'],
          datasets: [
          {
            label: 'Team Drills',
            data: [20, 21, 25, 21, 24, 18, 20 , 23, 19 , 22, 25, 19, 24, 27, 22, 18 , 20, 17, 20, 26],
            borderColor: '#cba3a9',
            tension: 0.3,
          },
          {
            label: 'Team Drills',
            data: [25, 20, 23, 19, 22, 20, 25 , 21, 23 , 19, 21, 23, 19, 24, 19, 22 , 21, 24, 21, 20],
            borderColor: '#b4707b',
            tension: 0.5,
          },
        ]
      },
      options: {
        scales:{
            y:{
                min: 0,
                max: 50,
                ticks:{
                    display: false,
                }
            },
        },
        responsive: true,
      }
    });
}

if(sales){
    new Chart(sales, {
        type: 'bar',
        data: {
          labels: ['A', 'B', 'c', 'D', 'E', 'F', 'G', 'H', 'I','J'],
            datasets: [
            {
              label: 'Data Set 1',
              data: [35, 55, 65, 85, 40, 30 , 18, 35, 20, 70],
              backgroundColor: '#cd36dd',
              barPercentage: 0.2,
            },
          ]
        },
        options: {
          scales:{
              y:{
                  ticks:{
                      display : false,
                  }
              },
              x:{
                  ticks:{
                      display : false,
                  }
              },
          },
          plugins: {
            legend: {
              display: false,
            },
          },
          responsive: true,
        }
      });
}

if(sales1){
    new Chart(sales1, {
      type: 'bar',
      data: {
        labels: ['A', 'B', 'c', 'D', 'E', 'F', 'G', 'H', 'I','J'],
          datasets: [
          {
            label: 'Data Set 1',
            data: [44, 75, 65, 34, 60, 45 , 22, 35, 30, 63],
            backgroundColor: '#8934dd',
            barPercentage: 0.2,
          },
        ]
      },
      options: {
        scales:{
            y:{
                ticks:{
                    display : false,
                }
            },
            x:{
                ticks:{
                    display : false,
                }
            },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
        responsive: true,
      }
    });
}

if(visit){
    new Chart(visit, {
      type: 'pie',
      data: {
        labels: ['A', 'B', 'c', 'D'],
          datasets: [
          {
            label: 'Data Set 1',
            data: [300, 50, 100, 80],
            backgroundColor:['#de305e','#9c3048','#c25d5a','#e39898'],
            borderColor: 'transparent',
          },
        ]
      },
      options: {
        scales:{
            y:{
                ticks:{
                    display : false,
                }
            },
            x:{
                ticks:{
                    display : false,
                }
            },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
        responsive: true,
      }
    });
}

if(credit){
    new Chart(credit, {
      type: 'doughnut',
      data: {
          labels: [
              "First",
              "Second",
              "Third",
              "Fourth"
          ],
          datasets: [
              {
                  data: [80, 70, 100, 60],
                  borderWidth: [0, 0, 0, 0],
                  backgroundColor: [
                      '#9528b9',
                      "#b046d4",
                      "#c767e7",
                      "#e394fe"
                  ],
                  cutout: '90%',
              }]
      },
      options: {
          scales:{
              y:{
                  ticks:{
                      display : false,
                  }
              },
              x:{
                  ticks:{
                      display : false,
                  }
              },
          },
          plugins: {
            legend: {
              display: false,
            },
          },
          responsive: true,
        }
    });
}

if(channel){
    new Chart(channel, {
      type: 'doughnut',
      data: {
          labels: [
              "First",
              "Second",
              "Third",
              "Fourth"
          ],
          datasets: [
              {
                  data: [120, 90, 77, 95],
                  borderWidth: [0, 0, 0, 0],
                  backgroundColor: [
                      '#da4d60',
                      "#e96577",
                      "#f28695",
                      "#ffb6c1"
                  ],
                  cutout: '90%',
              }]
      },
      options: {
          scales:{
              y:{
                  ticks:{
                      display : false,
                  }
              },
              x:{
                  ticks:{
                      display : false,
                  }
              },
          },
          plugins: {
            legend: {
              display: false,
            },
          },
          responsive: true,
        }
    });
}

if(direct){
    new Chart(direct, {
      type: 'doughnut',
      data: {
          labels: [
              "First",
              "Second",
              "Third",
              "Fourth"
          ],
          datasets: [
              {
                  data: [300, 50, 100, 60],
                  borderWidth: [0, 0, 0, 0],
                  backgroundColor: [
                      '#6933b9',
                      "#8553d1",
                      "#a372ec",
                      "#be9df1"
                  ],
                  cutout: '90%',
              }]
      },
      options: {
          scales:{
              y:{
                  ticks:{
                      display : false,
                  }
              },
              x:{
                  ticks:{
                      display : false,
                  }
              },
          },
          plugins: {
            legend: {
              display: false,
            },
          },
          responsive: true,
        }
    });
}


if(document.querySelector('.form-check-input') && document.querySelector('.form-check')){
    var checkboxes = document.querySelectorAll('.form-check-input');
    checkboxes.forEach(function(checkbox) {
        var parentDiv = checkbox.closest('.form-check');
        var label = parentDiv.querySelector('.form-check-label');
        checkbox.addEventListener('change', function(){
            if (checkbox.checked) {
                    label.classList.add('text-decoration-line-through');
                    parentDiv.style='background-color:rgb(60 59 59 / 45%)';
                    checkbox.style='background:inhirit; border:inhirit';
            } else {
                label.classList.remove('text-decoration-line-through');
                parentDiv.style='background:unset';
                checkbox.style='background:#6c757d; border:none';
            }
        });
        if (checkbox.checked) {
            label.classList.add('text-decoration-line-through');
            parentDiv.style='background-color:rgb(60 59 59 / 45%)';
        }else{
            checkbox.style='background:#6c757d; border:none';
        }
    });
}

if($('.status')){
    $('.status').each(function(index, element) {
        switch($(this).text()){
            case "in progress":
                $(this).css('color','red');
            break;
            case "on the way":
                $(this).css('color','skyblue');
            break;
            case "delivered":
                $(this).css('color','lightgreen');
        }
    });
}
