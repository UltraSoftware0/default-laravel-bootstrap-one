
<script>
    $("#users-modal" ).on('show.bs.modal', function(){
        var form = ($(this).find('form'))
        form.attr('action','{{ route('users.store') }}');
        form.attr('method','POST');
        $('#users-modal-able').html('Create User');
        $.get('{{ route('get.all.roles') }}',function (data){
            fillSelectWithOptions(data.roles,'roles-select')
        })


    });

    function fillSelectWithOptions(options, selectId){
        let select = $('#'+selectId)
        console.log(options)
        options.forEach((option, index, array)=>{
            select.append($("<option></option>").attr("value",option.id).text(option.name))
        })
    }
</script>
