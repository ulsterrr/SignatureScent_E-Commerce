<script>
    $(document).ready(function() {
        $(function() {
            var users = {!!json_encode($User) !!};
            //khởi tạo các popup delete theo id sẵn mà không cần click 2 lần
            users.forEach(element => {
                getPopupDelete(element);
            });
        });
    });

</script>
<script>
    function getPopupDelete(data) {
        var nameAlert = "#alert-confirm-" + data['id'].toString();
        $(nameAlert).on('click', function() {
            swal({
                title: 'Bạn có chắc muốn xoá?'
                , text: "Sau khi xác nhận " + data['email'] + " sẽ bị xoá khỏi hệ thống!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Xác nhận xoá!'
                , cancelButtonText: 'Huỷ thao tác!'
                , confirmButtonClass: 'btn btn-success mr-5'
                , cancelButtonClass: 'btn btn-danger'
                , buttonsStyling: true
            }).then(function() {
                //replace route xoá vào button confirm
                window.location.replace("{{ route('xoaTK-del', ['id' => $data->id]) }}");
                swal(
                    'Đã xoá!'
                    , 'Dữ liệu đã được xoá thành công.'
                    , 'success'
                ).then(() => {
                    // Load lại trang sau khi ấn OK trong popup alert
                    window.location.replace("{{ route('quanlyTKView') }}");
                });
            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Huỷ thao tác'
                        , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                        , 'error'
                    )
                }
            })
        });
    }

</script>
