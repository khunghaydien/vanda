
$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function xoa(id) {
     if (confirm("Bạn có chắc chắn muốn xóa?"))
         window.location.href = 'phanhoi/xoa?id='+id;
   }

function add() {
    document.getElementById("id").value = 0;
    document.getElementById("form-client").reset();
}
function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
     document.getElementById("nhanxet").value=table.cell(index,2).data();
     document.getElementById("hinhanh").value=table.cell(index,4).data();
}
