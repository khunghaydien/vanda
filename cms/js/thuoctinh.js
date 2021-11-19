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


function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
}
function del(id){
    if (confirm("Bạn có chắc chắn muốn xóa?"))
            window.location.href = 'thuoctinh/del?id='+id;
}