(function($) {
    /*---- Login Ajax ----*/
   $("form#login-form").submit(function (e){
       e.preventDefault();
       let url = $(this).data('url');
       let formData = new FormData(this);
       console.log(url)

       $.ajax({
           url: url,
           type: "post",
           data: formData,

           beforeSend: function (){
               $(".loader").addClass("open");
           },

           success: function (data){
               console.log(data)
                if(data.code === 200){
                    window.location = "http://127.0.0.1:8000/admin/user";
                }
           },

           error: function (error){
               let e = error.responseJSON;
               console.log(e)
               if(e.code === 500){
                   alert(e.message);
               }
           },

           complete: function (){
                $(".loader").removeClass("open");  
         },

           contentType: false,
           cache: false,
           processData: false,

       });
   })
})(jQuery);
