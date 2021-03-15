$(function () {
    $("#sortable").sortable({
        start: function (event, ui) {
            console.log(event.type)
           
        },
        change: function (event, ui) {
            console.log(event.type)
           
        },
        update: function (event, ui) {
         
            var tasklist=[]
          
            $('#sortable').each(function(){
                var li = $(this).find('.taskname')
                li.each(function(){
                    tasklist.push( $(this).text() )
                 })
            
              })
              console.log(tasklist)
              $.ajax({
                url: "tasks/order",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    tasklist:tasklist
                },
                success:function(response){
                    location.reload();
                  
                },
               });
              console.log($('meta[name="csrf-token"]').attr('content'));
          
        }
    });
    $("#sortable").disableSelection();
});


