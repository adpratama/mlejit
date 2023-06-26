
const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title: 'Success!! ',
        text: flashdata,
        type: 'success',
        icon: 'success',
    });
}

const flashdata_error = $('<?= $this->session->flashdata("message_error") ?>').data('flashdata');
if (flashdata_error) {
    Swal.fire({
        title: 'Error!! ',
        text: flashdata_error,
        type: 'error',
        icon: 'error',
    });
}

// jquery tolong carikan btn-delete yang ketika diklik jalankan fungsi berikut ini
$('.btn-delete').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});


// sweetalert logout
$('.btn-logout').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sign me out!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});