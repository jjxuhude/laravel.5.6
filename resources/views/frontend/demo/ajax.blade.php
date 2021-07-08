<script src="{{ asset('js/jquery.js') }}" ></script>

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <button id="ajax">ajax</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $("#ajax").click(function(){
        var url = 'http://work.org/gift/frontend_api/special_internal_save';
        var data={
            "is_draft":0,
            "cm_code":"22100000000004",
            "cm_name":"麻子",
            "cm_level":"VVIG",
            "cm_sale_total":"1127230",
            "gift_id":"64",
            "gift_qty":"2",
            "gift_date":"2020-10-30",
            "gift_special_reason":"赠礼理由"
        };

        $.ajax({
            type: "POST",
            url: url,
            data:data,
            success: function(result) {
                console.log(result);
            }
        });
    });
</script>



