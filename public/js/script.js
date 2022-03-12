Pusher.logToConsole = false;

let pusher = new Pusher(document.getElementById('pusher-key').value, {
    cluster: document.getElementById('pusher-cluster').value
});

let channel = pusher.subscribe('call-new-row-channel');
channel.bind('call-new-row-event', function (data) {
    callHelp(data.params.name, data.params.date);
});

function callHelp(name, inputDate) {
    let date = new Date(inputDate)
    let formatted_date = date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + (date.getDate() + 1)).slice(-2)

    Swal({
        title: `Добавлена новая запись`,
        text: '',
        type: 'success',
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonText: 'OK',
        html: `<h2 class="swal2-title" style="text-align: center;">
        Имя: ${name}<br />
        Дата: ${formatted_date}<br /></h2>`
    });
}
