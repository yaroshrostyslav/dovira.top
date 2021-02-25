
<script>
    // Головна / Пошук / в шапці
    $(function(){
        //Живой поиск
        $('.who2').bind("change keyup input click", function() {
            if(this.value.length >= 2){
                $.ajax({
                    url:"{{ route('searchController.moreResult') }}",
                    method:'GET',
                    data: {'name_product':this.value},
                    response: 'text',
                    success: function(data){
                        $(".search_result2").html(data).fadeIn(); //Выводим полученые данные в списке
                    }
                })
            }
        })

        $(".search_result2").hover(function(){
            $(".who2").blur(); //Убираем фокус с input
        })

        //При выборе результата поиска, прячем список и заносим выбранный результат в input
        $(".search_result2").on("click", "li", function(){
            s_user = $(this).text();
            $(".who2").val(s_user);
            $(".search_result2").fadeOut();
        })

    })
</script>
<script>
    // Головна / Пошук / по назві категорії в формі додавання відгуку
    $(function(){

        //Живой поиск
        $('.who1').bind("change keyup input click", function() {
            if(this.value.length >= 2){
                $.ajax({
                    url:"{{ route('searchController.get_type') }}",
                    method:'GET',
                    data: {'name_type':this.value},
                    response: 'text',
                    success: function(data){
                        $(".search_result1").html(data).fadeIn(); //Выводим полученые данные в списке
                        //if (!$.trim(data)){
                        //    $(".search_result").css("display", "none");
                        //}
                    }
                })
            }
        })

        $(".search_result1").hover(function(){
            $(".who1").blur(); //Убираем фокус с input

        })

        //При выборе результата поиска, прячем список и заносим выбранный результат в input
        $(".search_result1").on("click", "li", function(){
            s_user = $(this).text();
            $(".who1").val(s_user);
            $(".search_result1").fadeOut();
        })


    })
</script>
<script>
    // Головна / Пошук / по назві товара в формі додавання відгуку
    $(function(){

        //Живой поиск
        $('.who').bind("change keyup input click", function() {
            if(this.value.length >= 2){
                $.ajax({
                    url:"{{ route('searchController.get_product') }}",
                    method:'GET',
                    data: {'name_product':this.value},
                    response: 'text',
                    success: function(data){
                        $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
                        //if (!$.trim(data)){
                        //    $(".search_result").css("display", "none");
                        //}
                    }
                })
            }
        })

        $(".search_result").hover(function(){
            $(".who").blur(); //Убираем фокус с input

        })

        //При выборе результата поиска, прячем список и заносим выбранный результат в input
        $(".search_result").on("click", "li", function(){
            s_user = $(this).text();
            $(".who").val(s_user);
            $(".search_result").fadeOut();
        })


    })
</script>