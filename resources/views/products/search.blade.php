<!DOCTYPE html>
<html>
<head>
    <title>Typehead</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
    img{
        border-radius: 3px;
    }
    p{
        color: #a1a1a1;
    }
    ul{
        width: 96%;
    }
</style>
<body>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h5><strong>Laravel 6 Typeahead Search | Laravel Autocomplete Search Example</strong></h5>
        <input type="text" class="form-control typeahead">
    </div>
</div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
                html = '<div class="row">';
            html += '<div class="col-md-2">';
            html += '<img src="/image/'+data.img+'"/ height="44px;" width="65px;">';
            html += '</div>';
            html += '<div class="col-md-10 pl-0">';
            html += '<span>'+data.name+'</span>';
            html += '<p class="m-0">'+Math.round(data.price *1.1*100)/100+'€</p>';
            html += '</div>';
            html += '</div>';

            return html;
        }
    });
</script>
</html>