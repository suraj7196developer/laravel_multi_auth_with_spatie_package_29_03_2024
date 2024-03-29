$('#ts_date').bootstrapMaterialDatePicker({
    weekStart: 0,
    time: false
});
$('#te_date').bootstrapMaterialDatePicker({
    weekStart: 0,
    time: false
});
$('#registration_date').bootstrapMaterialDatePicker({
    weekStart: 0,
    time: false
});
(function() {
    $('.spinner').hide();
    $('.from-prevent-multiple-submits').on('submit', function() {

        $('.from-prevent-multiple-submits').attr('disabled', 'true');
        $('.spinner').show();
    })
})();
$(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
    // For select 2
    $(".select2").select2();
    $('.selectpicker').selectpicker();
    //Bootstrap-TouchSpin
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    var vspinTrue = $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    if (vspinTrue) {
        $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
    }
    $("input[name='tch1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: '%'
    });
    $("input[name='tch2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });
    $("input[name='tch3']").TouchSpin();
    $("input[name='tch3_22']").TouchSpin({
        initval: 40
    });
    $("input[name='tch5']").TouchSpin({
        prefix: "pre",
        postfix: "post"
    });
    // For multiselect
    $('#pre-selected-options').multiSelect();
    $('#optgroup').multiSelect({
        selectableOptgroup: true
    });
    $('#public-methods').multiSelect();
    $('#select-all').click(function() {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function() {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });
    $('#refresh').on('click', function() {
        $('#public-methods').multiSelect('refresh');
        return false;
    });
    $(".ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        //templateResult: formatRepo, // omitted for brevity, see the source of this page
        //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
});
$(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
});
@if(Session::has('message'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.success("{{ session('message') }}");
@endif

@if(Session::has('error'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.error("{{ session('error') }}");
@endif

@if(Session::has('info'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.info("{{ session('info') }}");
@endif

@if(Session::has('warning'))
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.warning("{{ session('warning') }}");
@endif

$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});

$(function() {
    $('#myTable').DataTable();
    var table = $('#example').DataTable({
        "columnDefs": [{
            "visible": false,
            "targets": 2
        }],
        "order": [
            [2, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;
            api.column(2, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    // responsive table
    $('#config-table').DataTable({
        responsive: true
    });
    /*$('#example23').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ]
    });*/
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
});