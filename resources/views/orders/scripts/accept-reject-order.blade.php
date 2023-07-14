<script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', '.acceptOrder', function (e) {
           e.preventDefault();
           $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
            var order_id = $(this).attr('order-id');
            var url = "{{ route('orders.accept', ":id") }}";
               url = url.replace(':id', order_id);    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                success: function(data){
                  console.log(data)
                  if(data.status==1){
               $(`#orderStatus${order_id}`).empty()
               $(`#orderStatus${order_id}`).append('<span class="badge badge-success">{{__("Accepted")}}</span>')
               $(`button#accept${order_id}`).remove()
               $(`button#reject${order_id}`).remove()
                  }
                }
            });
        })
    
        $(document).on('click', '.rejectOrder', function (e) {
           e.preventDefault();
           $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
            var order_id = $(this).attr('order-id');
            var url = "{{ route('orders.reject', ":id") }}";
               url = url.replace(':id', order_id);    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                success: function(data){
                  console.log(data)
                  if(data.status==1){
                    $(`#rejectModal${order_id}`).modal('hide')
               $(`#orderStatus${order_id}`).empty()
               $(`#orderStatus${order_id}`).append('<span class="badge badge-danger">{{__("Cancelled")}}</span>')
               $(`button#reject${order_id}`).remove()
               $(`button#accept${order_id}`).remove()
                  }
                }
            });
        })
    });
    </script>
    