// tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
}
);

// chart_dashboard cek di malasngoding.com
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Mei", "Juni", "Juli", "Agustus", "September", "Oktober"],
        datasets: [{
            label: 'Jumlah Buku Yang Terunduh',
            data: [120, 190, 130, 230, 220, 330],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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

// confirm hapus member
function hapusMember() {
    var deleteAkun = confirm("Apakah Anda yakin menghapus akun ini ?");
}

// confirm hapus buku
function hapusBuku() {
    var deleteBuku = confirm("Apakah Anda yakin menghapus buku ini ?");
}

// preview gambar di add buku
function previewImageUpdate() {
    // document.getElementById("preview-update").style.display="block";
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("source-update").files[0]);
    reader.onload = function (revent) {
        document.getElementById("preview-update").src = revent.target.result;
    }
}