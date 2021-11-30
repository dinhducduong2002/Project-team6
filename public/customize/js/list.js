function confrim_remove(url, name) {
    Swal.fire({
        title: `Bạn có muốn xóa tài khoản này  "${name}"?`,
        showDenyButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Hủy bỏ`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
    
}
function confrim_remove_bill(url, name) {
    Swal.fire({
        title: `Bạn có muốn xóa hóa đơn #"${name}" này không?`,
        showDenyButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Hủy bỏ`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
    
}
function confrim_back_bill(url, name) {
    Swal.fire({
        title: `Bạn có muốn hoàn lại tiền hóa đơn #"${name}" này không?`,
        showDenyButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Hủy bỏ`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
    
}

function confrim_remove_service(url, name) {
    Swal.fire({
        title: `Bạn có muốn xóa dịch vụ #"${name}" này không?`,
        showDenyButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Hủy bỏ`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
    
}
// Client
function confrim_remove_service(url, name) {
    Swal.fire({
        title: `Bạn có muốn xóa dịch vụ "${name}" này không?`,
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
    
}
