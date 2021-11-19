$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        "processing": true,
        "serverSide": true,
        "ajax": "baiviet/getdata"
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function del(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'baiviet/del?id=' + id;
}

function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("name").value=table.cell(index,2).data();
    document.getElementById("hinhanh").value=table.cell(index,6).data();
    document.getElementById("vitri").value=table.cell(index,8).data();
    document.getElementById("url").value=table.cell(index,9).data();
    tinymce.get("mota").setContent(table.cell(index,4).data());
    tinymce.get("noidung").setContent(table.cell(index,5).data());
    var opt=table.cell(index,7).data();
    document.getElementById("opt"+opt).selected = "true";
}



