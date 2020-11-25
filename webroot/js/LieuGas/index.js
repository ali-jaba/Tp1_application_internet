
// Update the lieuGas data list
function getLieuGas() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var lieuGaTable = $('#lieuGaData');
                    lieuGaTable.empty();
                    $.each(data.lieuGas, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalLieuGaAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'lieuGaAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        lieuGaTable.append('<tr><td>' + value.id + '</td><td>' + value.lieu + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function lieuGaAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var lieuGaData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalLieuGaAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        lieuGaData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        lieuGaData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(lieuGaData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">LieuGa data has been ' + statusArr[type] + ' successfully.</p>');
                getLieuGas();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the lieuGa's data in the edit form
function editLieuGa(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
        
        success: function (data) {
            $('#id').val(data.lieuGa.id);
            $('#lieu').val(data.lieuGa.lieu);
           
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalLieuGaAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var lieuGaFunc = "lieuGaAction('add');";
        $('.modal-title').html('Add new location (lieu)');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowID');
            lieuGaFunc = "lieuGaAction('edit'," + rowId + ");";
            $('.modal-title').html('Edit location (lieu)');
            
            editLieuGa(rowId);
        }
        $('#lieuGaSubmit').attr("onclick", lieuGaFunc);
    });

    $('#modalLieuGaAddEdit').on('hidden.bs.modal', function () {
        $('#lieuGaSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



