require(['jquery'],function(){
        $('.uploadfront').click(function(){
            $('#frontphoto').trigger('click')
        })
        $('.uploadback').click(function(){
            $('#backphoto').trigger('click')
        })
    })