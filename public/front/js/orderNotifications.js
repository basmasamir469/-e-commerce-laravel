 var notifications_count=parseInt($('.notify-count').data('count'))
 var notifications=$('#notify-container')
 var user_id=notifications.attr('user_id')
 var channel=pusher.subscribe(`order-notification${user_id}`)
 channel.bind('App\\Events\\OrderNotification', function (data) {
    if(notifications_count==0){
        notifications.empty()
    }
   notifications.append(`<a href="${data.user_id}" class="dropdown-item">
   <i class="fas fa-envelope mr-2"></i> ${data.status==2?'your order is accepted':'sorry! your order is rejected'}
   <span class="float-right text-muted text-sm">${data.time}</span>
  </a>
  <div class="dropdown-divider"></div>
`)
 notifications_count+=1
 $('.notify-count').attr('data-count',notifications_count)
 $('.notify-count').text(notifications_count)
 });

