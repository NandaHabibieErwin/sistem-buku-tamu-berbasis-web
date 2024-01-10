/*
Template Name: webadmin - Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.com/
Contact: Themesdesign@gmail.com
File: invoive list  Js File
*/

// Basic Table

var grid = new gridjs.Grid({

    columns:
        [
            {
                name: 'ID',
                formatter: (function (cell) {
                    return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                })
            },
            {
                name: 'Nama Tamu',
                formatter: (function (cell) {
                    return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                })
            },
            "Nomor Telepon", "Tanggal Kunjungan",
            {
                name: 'Tujuan',
                formatter: (function (cell, row) {
                    return gridjs.html('<div class="dropdown"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="modal" data-bs-target="#TujuanTamu_' + row.cells[0].data + '">' + '<i class="fa fa-eye"></i></button></div>');
                })
            },

            {
                name: 'Foto',
                formatter: (function (cell, row) {
                    return gridjs.html('<div class="dropdown"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="modal" data-bs-target="#FotoTamu_' + row.cells[0].data + '">' + '<i class="fa fa-camera"></i></button></div>');
                })
            },


            {
                name: 'Status',
                formatter: (function (cell, row) {

                    const idTamu = row.cells[0].data;

                     const terimaButton = '<button type="button" class="btn btn-success waves-effect btn-label waves-light" onclick="updateAndChangeStatus(' + idTamu + ',' + 1 + ')"><i class="bx bx-check-double label-icon"></i>Terima</button>';

                    const tolakButton = '<button type="button" data-bs-toggle="modal" data-bs-target=".tolak' + row.cells[0].data + '"" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-block label-icon"></i>Tolak</button>';

                    switch (cell) {
                        case 0:
                            return gridjs.html(terimaButton + ' ' + tolakButton);

                        case 1:
                            return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">Disetujui</span>');

                        case 2:
                            return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">Ditolak</span>');

                        default:
                            return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + cell + '</span>');
                    }
                })
            },
        ],
    pagination: {
        limit: 10
    },
    sort: true,
    search: true,

    data: () => {
        return new Promise(resolve => {
            setTimeout(() => {
                const transformedData = datatamu.map(row => Object.values(row));
                resolve(transformedData);
            }, 1000);
        });
    }

}).render(document.getElementById("table-invoices-list"));



// Range datepicker
flatpickr('#datepicker-range', {
    mode: "range"
});

// Invoice date

flatpickr('#datepicker-invoice');

// form step wizard
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("wizard-tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Add";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("wizard-tab");

    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        currentTab = currentTab - n;
        x[currentTab].style.display = "block";
    }
    // Otherwise, display the correct tab:
    showTab(currentTab)
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("list-item");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

function updateAndChangeStatus(idTamu, newStatus) {
    // Make an asynchronous request to update the status on the server
    // After the request is successful, update the status in the DOM

    // For example:
    // Assume you have an API endpoint for updating the status
    fetch('/updateStatus', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            idTamu: idTamu,
            newStatus: newStatus,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the status in the DOM immediately
            const statusElement = document.getElementById('status_' + idTamu);
            if (statusElement) {
                statusElement.innerHTML = '<span class="badge badge-pill badge-soft-success font-size-12">Disetujui</span>';
            }
        } else {
            console.error('Failed to update status.');
        }
    })
    .catch(error => {
        console.error('Error updating status:', error);
    });
}

function updateStatus(idTamu, newStatus) {
    var alasan = document.getElementById('productdesc'+idTamu).value;
    if (alasan){
        console.log("alasan terpanggil");
    }
    else{
        console.log("tidak terpanggil");
    }

    fetch('/whatsapp/' + idTamu + '/' + newStatus, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ alasan: alasan }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('alasan: ' + alasan);
        console.log(data);
        grid.updateConfig({
            data: datatamu.map(row => Object.values(row)),
        }).forceRender();

        // Update the grid with the new data

    })
    .catch(error => {
        console.error('Error:', error);
    });
}


