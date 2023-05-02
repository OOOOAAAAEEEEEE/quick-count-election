function validateDelete() {
    let confirmDelete = document.getElementById(`confirmDelete${model}`);

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "File yang dihapus tidak bisa dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Memproses!", "Klik untuk memproses!.", "info").then(
                () => {
                    confirmDelete.click();
                }
            );
        }   
    });
}

$(window).on("load", function () {
    $("#loader").hide();
    $("#content").removeClass("hidden");
});
