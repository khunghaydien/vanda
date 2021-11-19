$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function xoa(id) {
  if (confirm("Bạn có chắc chắn muốn xóa?"))
      window.location.href = 'dangky/xoa?id='+id;
}


// function edit(index) {
//      var table = $('#example').DataTable();
//      document.getElementById("name").value=table.cell(index,1).data();
//      document.getElementById("thoigian").value=table.cell(index,2).data();
//      document.getElementById("soluong").value=table.cell(index,3).data();
//      document.getElementById("sdt").value=table.cell(index,4).data();
//      document.getElementById("email").value=table.cell(index,5).data();
//      document.getElementById("noidung").value=table.cell(index,6).data();
// }
