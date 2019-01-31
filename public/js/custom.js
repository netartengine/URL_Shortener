$(document).ready(function(){
    $('form#shortener').off('submit').on('submit', function(e){
        e.preventDefault();
        var data = {},
            fields = $(this).serializeArray();

        fields.forEach(function(item){
            data[item.name] = item.value;
        });

        $.ajax({
            url: '/',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            data: data,
            success:function(res){
                $('form#shortener button').hide();
                $('form#shortener button.copyShorten').show();
                $('form#shortener input[name="source"]').val(res.shorten);
                $('form#shortener .shortenDetails').html('Source link: <a href="'+res.source+'" class="text-secondary">'+res.source+'</a>');
                $('form#shortener .shortenDetails').slideDown();
            }
        });
    });

    $('.copyShorten').off('click').on('click', function(){
        var copyText = $('form#shortener input[name="source"]');
        copyText.select();
        document.execCommand("copy");
        alert("The link copied to clipboard");
    });

    $('form#shortener input[name="source"]').off('keyup').on('keyup', function(){
       var val = this.value;

       if(val.indexOf(location.host) == -1){
           $('form#shortener button').hide();
           $('form#shortener button#shortenURL').show();
       }
    });
});