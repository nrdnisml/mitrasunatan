const flashdata = $(".flash-data").data("flashdata");
const flashdata1 = $(".flash-data-success").data("flashdata");

const hapus = $(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Hapus Data?",
    text: "Anda yakin ingin menghapus data!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus data",
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});

if (flashdata) {
  Swal.fire({
    type: "error",
    title: "Oops...",
    text: flashdata,
    // footer:
    //   "<a href='https://wa.me/62811331167'>Butuh bantuan? hubungi admin..</a>",
  });
}

if (flashdata1) {
  Swal.fire({
    type: "success",
    title: "Yeeayy...!!",
    text: flashdata1,
  });
}
