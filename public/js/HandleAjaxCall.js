





function handleFormCall(form, callback) {

    $(form).submit(function (e) {

        e.preventDefault();


        context=$(this);


        data = {};
        fields=$(this).serializeArray();
        $.each(fields, function(i, field){
            data[field.name] = field.value;
       });



        $.ajax({
            type:   context.attr("method"),
            url:   context.attr("action"),
            data: data,
            success: function () {

                callback(true,context);

            },
            error:function(){

                callback(false,"warning you may delete all employess that belong to this company");

            }
            ,  beforeSend: function() { $('#wait').show(); },
            complete: function() { $('#wait').hide(); }
        });

    });





}


