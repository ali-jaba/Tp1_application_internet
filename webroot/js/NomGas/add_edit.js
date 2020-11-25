$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#lieu-gas-id').change(function () {
        var LieuGasId = $(this).val();
        if (LieuGasId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'lieu_id=' + LieuGasId,
                success: function (PrixGas) {
                    $select = $('#prix-gas-id');
                    $select.find('option').remove();
                    $.each(prixGas, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.nom + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#prix-gas-id').html('<option value="">Select LieuGas first</option>');
        }
    }).change();
});


