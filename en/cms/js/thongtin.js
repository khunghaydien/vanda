$(function() {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value = 0;
}

function del(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'thongtin/del?id=' + id;
}

function edit(index) {
    var table = $('#example').DataTable();
    // alert( table.row(0).data() );
    document.getElementById("id").value = table.cell(index, 5).data();
    document.getElementById("name").value = table.cell(index, 1).data();
    document.getElementById("value").value = table.cell(index, 2).data();
    document.getElementById("kieu").value = table.cell(index, 3).data();
    document.getElementById("keyInfo").value = table.cell(index, 6).data();
}