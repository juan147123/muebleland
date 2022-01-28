Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


$(document).ready(function () {
  $.ajax({
    url: 'ajax/ListarTablasAjax/ListadoGraficoProducto.php',
    type: 'POST',
  }).done(function (respuesta) {
    var producto = [];
    var cantidad = [];
    var data = JSON.parse(respuesta);
    for (var i = 0; i < data.length; i++) {
      producto.push(data[i][1]);
      cantidad.push(data[i][0]);
    }
    var maximovalor = Math.max.apply(null, cantidad);
    if (maximovalor % 2 == 0) {
      maximovalor = maximovalor + 6;
    } else {
      maximovalor = maximovalor + 7
    }
    var ctx = document.getElementById("lineChart");
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: producto,
        datasets: [{
          lineTension: 0.3,
          backgroundColor: [
            "rgba(47, 79, 79,0.3)",
            "rgba(255, 160, 122,0.3)",
            "rgba(154, 205, 50,0.3)",
            "rgba(220, 20, 60,0.3)",
            "rgba(205, 92, 92,0.3)",
            "rgba(75, 0, 130,0.3)",
            "rgba(255, 105, 180,0.3)",
            "rgba(255, 140, 0,0.3)",
            "rgba(199, 21, 133,0.3)",
            "rgba(139, 69, 19,0.3)",
            "rgba(173, 255, 47,0.3)",
            "rgba(255, 69, 0,0.3)",
          ],
          borderColor: [
            "rgba(47, 79, 79,0.3)",
            "rgba(255, 160, 122,0.3)",
            "rgba(154, 205, 50,0.3)",
            "rgba(220, 20, 60,0.3)",
            "rgba(205, 92, 92,0.3)",
            "rgba(75, 0, 130,0.3)",
            "rgba(255, 105, 180,0.3)",
            "rgba(255, 140, 0,0.3)",
            "rgba(199, 21, 133,0.3)",
            "rgba(139, 69, 19,0.3)",
            "rgba(173, 255, 47,0.3)",
            "rgba(255, 69, 0,0.3)",
          ],
          borderWidth: 1,
          data: cantidad,
        }],
      },
      options: {
        events: [],
        animation: {
          onComplete: function () {
            var chartInstance = this.chart;
            var ctx = chartInstance.ctx;
            console.log(chartInstance);
            var height = chartInstance.controller.boxes[0].bottom;
            ctx.textAlign = "center";
            Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
              var meta = chartInstance.controller.getDatasetMeta(i);
              Chart.helpers.each(meta.data.forEach(function (bar, index) {
                ctx.fillText("Cantidad: " + dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
              }), this)
            }), this);
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: maximovalor,
              maxTicksLimit: maximovalor
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  })/*  aa */






  /* ventaspormes */
  $.ajax({
    url: 'ajax/ListarTablasAjax/ListadoGraficosVentas.php',
    type: 'POST',
  }).done(function (respuesta) {
    var vend = [];
    var mont = [];
    var data = JSON.parse(respuesta);
    for (var i = 0; i < data.length; i++) {
      vend.push(data[i][0]);
      mont.push(data[i][1]);
    }
    let verfCantidad = mont.reduce((a, b) => Number(a) + Number(b), 0);
    if (vend.length == 12 && verfCantidad != 0) {
      var maximaven = Math.max.apply(null, mont);
      var maximaventa = (Math.round(maximaven / 10) * 10);

      if (maximaventa <= 130) {
        maximaventa = maximaventa ;
      } else {
        maximaventa = maximaventa ;
      }
      var ctx = document.getElementById("bar");
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: vend,
          datasets: [{
            lineTension: 0.3,
            backgroundColor: ["rgba(205, 92, 92,0.3)",
              "rgba(199, 21, 133,0.3)",
              "rgba(255, 140, 0,0.3)",
              "rgba(255, 140, 0,0.3)",
              "rgba(47, 79, 79,0.3)",
              "rgba(220, 20, 60,0.3)",
              "rgba(75, 0, 130,0.3)",
              "rgba(139, 69, 19,0.3)",
              "rgba(173, 255, 47,0.3)",
              "rgba(255, 105, 180,0.3)",
              "rgba(255, 160, 122,0.3)",
              "rgba(255, 69, 0,0.3)",
            ],
            borderColor: ["rgba(205, 92, 92,0.3)",
              "rgba(199, 21, 133,0.3)",
              "rgba(255, 140, 0,0.3)",
              "rgba(255, 140, 0,0.3)",
              "rgba(47, 79, 79,0.3)",
              "rgba(220, 20, 60,0.3)",
              "rgba(75, 0, 130,0.3)",
              "rgba(139, 69, 19,0.3)",
              "rgba(173, 255, 47,0.3)",
              "rgba(255, 105, 180,0.3)",
              "rgba(255, 160, 122,0.3)",
              "rgba(255, 69, 0,0.3)",
            ],
            borderWidth: 1,
            data: mont,
          }],
        },
        options: {
          events: [],
          animation: {
            onComplete: function () {
              var chartInstance = this.chart;
              var ctx = chartInstance.ctx;
              console.log(chartInstance);
              var height = chartInstance.controller.boxes[0].bottom;
              ctx.textAlign = "center";
              Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                Chart.helpers.each(meta.data.forEach(function (bar, index) {
                  if (dataset.data[index] != 0) {
                    ctx.fillText("S/." + dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
                  }
                }), this)
              }), this);
            }
          },
          scales: {
            yAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 6
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: maximaventa,
                maxTicksLimit: 10
              },
              gridLines: {
                display: true
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });
    }
  })




/* GRAFICO CLIENTES */

$.ajax({
  url: 'ajax/ListarTablasAjax/ListadoGraficosClientes.php',
  type: 'POST',
}).done(function (respuesta) {
  var titulocli = [];
  var cantidadcli = [];
  var data = JSON.parse(respuesta);
  for (var i = 0; i < data.length; i++) {
    titulocli.push(data[i][0]);
    cantidadcli.push(data[i][1]);
  }
  let verfCantid = cantidadcli.reduce((a, b) => a + b, 0);
  if (titulocli.length == 12 && verfCantid != 0) {   
    var maximovalorcli = Math.max.apply(null, cantidadcli);

    if (maximovalorcli % 2 == 0) {
      maximovalorcli = maximovalorcli + 2;
    } else {
      maximovalorcli = maximovalorcli + 3;
    }
    var ctx = document.getElementById("pie");
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: titulocli,
        datasets: [{
          lineTension: 0.3,
          backgroundColor: ["rgba(199, 21, 133,0.3)",
            "rgba(255, 140, 0,0.3)",
            "rgba(47, 79, 79,0.3)",
            "rgba(255, 69, 0,0.3)",
            "rgba((255, 140, 0,0.3)",
            "rgba(255, 105, 180,0.3)",
            "rgba(220, 20, 60,0.3)",
            "rgba(139, 69, 19,0.3)",
            "rgba(205, 92, 92,0.3)",
            "rgba(75, 0, 130,0.3)",
            "rgba(173, 255, 47,0.3)",
            "rgba(255, 160, 122,0.3)",

          ],
          borderColor: ["rgba(199, 21, 133,0.3)",
            "rgba(255, 140, 0,0.3)",
            "rgba(47, 79, 79,0.3)",
            "rgba(255, 69, 0,0.3)",
            "rgba((255, 140, 0,0.3)",
            "rgba(255, 105, 180,0.3)",
            "rgba(220, 20, 60,0.3)",
            "rgba(139, 69, 19,0.3)",
            "rgba(205, 92, 92,0.3)",
            "rgba(75, 0, 130,0.3)",
            "rgba(173, 255, 47,0.3)",
            "rgba(255, 160, 122,0.3)",

          ],
          borderWidth: 1,
          data: cantidadcli,
        }],
      },
      options: {
        events: [],
        animation: {
          onComplete: function () {
            var chartInstance = this.chart;
            var ctx = chartInstance.ctx;
            console.log(chartInstance);
            var height = chartInstance.controller.boxes[0].bottom;
            ctx.textAlign = "center";
            Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
              var meta = chartInstance.controller.getDatasetMeta(i);
              Chart.helpers.each(meta.data.forEach(function (bar, index) {
                if (dataset.data[index] != 0) {
                  ctx.fillText("Total:" + dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
                }
              }), this)
            }), this);
          }
        },
        scales: {
          yAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: maximovalorcli,
              maxTicksLimit: maximovalorcli
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  }
})


});


