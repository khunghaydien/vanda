$(function() {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{ targets: [0], visible: false, searchable: false },
            { targets: [5], visible: false, searchable: false },
            { targets: [6], visible: false, searchable: false },
            { targets: [9], visible: false, searchable: false }
        ]
    });
});

function add() {
    document.getElementById("id").value = 0;
    document.getElementById("form-client").reset();
    $("#danhmuccha").val(0).find("option[value=" + 0 + "]").attr('selected', true);
}

function del(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'danhmucsp/del?id=' + id;
}

function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value = table.cell(index, 0).data();
    document.getElementById("name").value = table.cell(index, 1).data();
    document.getElementById("hinhanh").value = table.cell(index, 5).data();
    document.getElementById("mota").value = table.cell(index, 3).data();
    document.getElementById("url").value = table.cell(index, 4).data();
    var cha = table.cell(index, 6).data();
    $("#danhmuccha").val(cha).find("option[value=" + cha + "]").attr('selected', true);
    document.getElementById("position").value = table.cell(index, 8).data();
    var status = table.cell(index, 9).data();
    $("#status").val(status).find("option[value=" + status + "]").attr('selected', true);
}