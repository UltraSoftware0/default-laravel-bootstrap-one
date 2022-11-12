<script>
    $("#users-modal").on('show.bs.modal', function () {
        var form = ($(this).find('form'))
        form.attr('action', '{{ route('users.store') }}');
        form.attr('method', 'POST');
        $('#users-modal-able').html('Create User');
        $.get('{{ route('get.all.roles') }}', function (data) {
            fillSelectWithOptions(data.roles, 'roles-select')
        })
    });

    $('.toggle-status').click(function () {
        let tag = $(this).children()
        let id = ($(this).closest('tr').data('id'));

        $.ajax({
            url: '{{ route('users.toggle.status',":id") }}'.replace(':id', id),
            type: "GET",
            success: function(data) {
                console.log($(tag[0]).css('badge bg-gradient-faded-error').change())
            },
            error: function (){
                alert('no')
            },

        })

    })

    function fillSelectWithOptions(options, selectId) {
        let select = $('#' + selectId)
        options.forEach((option, index, array) => {
            select.append($("<option></option>").attr("value", option.id).text(option.name))
        })
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('#user-img').attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(e) {
        e.preventDefault();
        $('#user-img').attr('src', '');
    }
</script>
