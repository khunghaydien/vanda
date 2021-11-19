$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [
            {targets: [4], visible: false, searchable: false},
            {targets: [5], visible: false, searchable: false},
            {targets: [6], visible: false, searchable: false},
            {targets: [10], visible: false, searchable: false}]
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value = 0;
    document.getElementById("hienthi").removeAttribute('checked');
}

function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value = table.cell(index, 0).data();
    document.getElementById("name").value = table.cell(index, 1).data();
    document.getElementById("hinhanh").value = table.cell(index, 6).data();
    document.getElementById("dienthoai").value = table.cell(index, 3).data();
    document.getElementById("diachi").value = table.cell(index, 4).data();
    document.getElementById("url").value = table.cell(index, 10).data();
    var hienthi = table.cell(index, 5).data();
    if(hienthi==1)
        document.getElementById("hienthi").setAttribute('checked','checked');
}


function del(id){
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        window.location.href = 'doitac/del?id='+id;
}

function hienthi(id) {
    window.location.href = 'doitac/hienthi?id='+id;
}


// function edit(id) {
//     $.post('data/getrow',{id:id},function (result) {
//         if (result.success) {
//              document.getElementById("id").value=id;
//              document.getElementById("fname").value=result.data['name'];
//              document.getElementById("lname").value=result.data['name'];
//              document.getElementById("dob").value=result.data['ngay_sinh'];
//              document.getElementById("sex").value=result.data['gioi_tinh'];
//              document.getElementById("address").value=result.data['dia_chi'];
//              document.getElementById("postal").value=result.data['postal'];
//              document.getElementById("city").value=result.data['thanh_pho'];
//              document.getElementById("country").value=result.data['country'];
//              document.getElementById("email").value=result.data['email'];
//              document.getElementById("mobile").value=result.data['dien_thoai'];
//         } else {
//             alert(result.err);
//         }
//     },'json');
// }
