$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false},
            {targets: [6], visible: false, searchable: false} ]
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
    $("#password").attr("placeholder", "Mật khẩu đăng nhập");
    $("#password").attr("required", "true");
}


function del(id){
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'users/del?id='+id;
}


function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("name").value=table.cell(index,1).data();
    document.getElementById("username").value=table.cell(index,2).data();
    var nhom = table.cell(index,6).data();
    $("#nhom").val(nhom).find("option[value=" + nhom +"]").attr('selected', true);
    $("#password").attr("placeholder", "Để trống nếu không muốn reset");
    $("#password").removeAttr("required");

}


