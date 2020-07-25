$(document).ready(function () {
    $('#example').DataTable();
});

function validasi() {
    swal("Rekap Data Transaksi Sekarang?", {
        buttons: {
            catch: {
                text: "Ok",
                value: "catch",
            },
            Cancel: true,
        },
    })
        .then((value) => {
            switch (value) {

                case "Cancel":
                    break;

                case "catch":
                    window.location = "http://localhost/sisfo/K_tenant/rekap";
                    swal("Rekap Data Berhasil");
            }

        });

}