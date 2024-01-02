<div id="user-datatable">
    <div class="input-group mb-3">
        <input id="search-user" type="text" class="form-control" placeholder="Search" value="">
        <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Birthday</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody id="data-table-body">
        </tbody>
    </table>
    <div id="pagination-links">
    </div>
</div>

<script>
$(document).ready(function() {
    loadDataUser();
});
let keyword = '';
function loadDataUser(page = 1) {
    var url = `{{ route('user.search') }}?page=${page}`;
    if (keyword !== '') {
        url = `{{ route('user.search') }}?page=${page}&keyword=${keyword}`;
    }
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
    }).done(function(data) {
        var dataTable = $('#user-datatable #data-table-body').empty();
        $.each(data.data, function(index, item) {
            var row = `<tr id="tr-${item.id}">
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>${item.email}</td>
                <td>${item.gender}</td>
                <td>${item.age}</td>
                <td>${item.address ?? ''}</td>
                <td>${item.birthday}</td>
                <td>${item.status}</td>
            </tr>`;
            dataTable.append(row);
        });
        $('#user-datatable #pagination-links').html(pagination(data.pagination, 'loadDataUser'));
    }).fail(function(err) {
        console.error(err);
    }).always(function(_) {
        
    });
}

$('#user-datatable #search-user').keyup(debounce(function(event){
    keyword = event?.target?.value ?? '';
    loadDataUser();
}, 500));
</script>