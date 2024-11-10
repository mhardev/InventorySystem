import './bootstrap';

window.addEventListener('alert', (event)=> {
    let data = event.details;

    console.log(data);

    Swal.fire({
        icon: data.type,
        title: data.title,
        position: 'data.position',
        showConfirmButton: false,
        timer: data.timer,
    })
});
