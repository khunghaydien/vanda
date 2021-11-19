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


function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value = table.cell(index, 0).data();
    document.getElementById("name").value = table.cell(index, 1).data();
    document.getElementById("address").value = table.cell(index, 2).data();
    document.getElementById("phone").value = table.cell(index, 3).data();
    document.getElementById("email").value = table.cell(index, 4).data();
    document.getElementById("product").value = table.cell(index, 5).data() + ' - ' + table.cell(index, 7).data();
    document.getElementById("note").value = table.cell(index, 8).data();
    var status = table.cell(index, 10).data();
    $("#status").val(status).find("option[value=" + status + "]").attr('selected', true);
}