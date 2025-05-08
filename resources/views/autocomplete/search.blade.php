@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Auto-complete Search</h3>
    <input type="text" name="country" id="country" class="form-control" placeholder="Search Country..." />
    <div id="countryList"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#country').keyup(function () {
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                url: "{{ route('autocomplete.fetch') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    let html = '<ul class="list-group">';
                    data.forEach(function (item) {
                        html += '<li class="list-group-item">' + item + '</li>';
                    });
                    html += '</ul>';
                    $('#countryList').fadeIn().html(html);
                }
            });
        } else {
            $('#countryList').fadeOut();
        }
    });

    $(document).on('click', 'li', function () {
        $('#country').val($(this).text());
        $('#countryList').fadeOut();
    });
});
</script>
@endsection
