$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        "processing": true,
        "serverSide": true,
        "ajax": "sanpham/getdata"
    });
    
});


function del(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'sanpham/xoa?id=' + id;
}


function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("masp").value=table.cell(index,1).data();
    document.getElementById("name").value=table.cell(index,2).data();
    document.getElementById("name_en").value=table.cell(index,17).data();
    document.getElementById("hinhanh").value=table.cell(index,10).data();
    document.getElementById("linkanh1").value=table.cell(index,14).data();
    document.getElementById("linkanh2").value=table.cell(index,15).data();
    document.getElementById("linkanh3").value=table.cell(index,16).data();
    document.getElementById("gianiemyet").value=Comma(table.cell(index,4).data());
    document.getElementById("giaban").value=Comma(table.cell(index,5).data());
    document.getElementById("vitri").value=table.cell(index,12).data();
    document.getElementById("url").value=table.cell(index,13).data();
    tinymce.get("mota").setContent(table.cell(index,6).data());
    tinymce.get("mota_en").setContent(table.cell(index,18).data());
    tinymce.get("thanhphan").setContent(table.cell(index,7).data());
    tinymce.get("thanhphan_en").setContent(table.cell(index,19).data());
    // tinymce.get("huongdan").setContent(table.cell(index,8).data());
    // tinymce.get("khuyencao").setContent(table.cell(index,9).data());
    var opt=table.cell(index,11).data();
    document.getElementById("opt"+opt).selected = "true";
}
