$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function add() {
    document.getElementById("id").value=0;
    document.getElementById("form-client").reset();
}

function xoa(id) {
	if (confirm("Bạn có chắc chắn muốn xóa?"))
			window.location.href = 'media/xoa?id='+id;
}

