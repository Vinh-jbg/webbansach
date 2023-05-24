function load(urlMain) {
    $(document).ready(function (){
        function load_data(url, page)
        {
            $.ajax({
            url: url,
            method:"POST",
            data:{
                page: page
            },
            success : function(data){     
                $('.table-responsive').html(data);
            }
    
            });
        }   
            $(document).on('click', 'a.page-link', function (e){
                e.preventDefault();
                var pageId = $(this).attr('page');  
                var url = urlMain;
                load_data(url , pageId);
            });
    });

}