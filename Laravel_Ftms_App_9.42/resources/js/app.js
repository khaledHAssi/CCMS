import './bootstrap';

Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        // console.log(notification);
        let a = `<a href="/notify/${notification.id}">${notification.msg}</a>`;
        toastr.success(a)
    });