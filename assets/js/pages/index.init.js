var options = {
    chart: {
      height: 290,
      type: "area",
      width: "100%",
      stacked: false,
      toolbar: { show: false, autoSelected: "zoom" },
    },
    colors: ["#2a77f4", "rgba(42, 118, 244, .4)"],
    dataLabels: { enabled: false },
    stroke: {
      curve: "straight",
      width: 2,
      dashArray: 0,
      lineCap: "round",
    },
    grid: { padding: { left: 0, right: 0 }, strokeDashArray: 3 },
    markers: { size: 0, hover: { size: 0 } },
    series: [
      {
        name: "Peminjam",
        data: [], // kosong dulu, nanti diisi dari AJAX
      },
    ],
    xaxis: {
      type: "month",
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      axisBorder: { show: true },
      axisTicks: { show: true },
    },
    yaxis: {
       
    },
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [100],
      },
    },
    tooltip: { x: { format: "dd/MM/yy HH:mm" } },
    legend: { position: "top", horizontalAlign: "right" },
  };

  var chart = new ApexCharts(document.querySelector("#monthly_income"), options);
  chart.render();

  // AJAX ambil data dari controller CI
$.ajax({
  url: base_url + "dashboard/grafik_peminjaman_bulanan",
  method: "GET",
  dataType: "json",
  success: function(data) {
    const max = Math.max(...data); // ambil nilai tertinggi
    const roundedMax = Math.ceil(max); // bulatkan ke atas
    const tickAmount = roundedMax; // pakai jumlah ticks sama dgn max (0..max)

    chart.updateOptions({
      yaxis: {
        min: 0,
        max: roundedMax,
        tickAmount: tickAmount,
        decimalsInFloat: 0,
      },
    });

    chart.updateSeries([
      { name: "Peminjam", data: data }
    ]);
  },
  error: function(xhr, status, error) {
    console.error("Gagal load data grafik:", error);
  }
});

