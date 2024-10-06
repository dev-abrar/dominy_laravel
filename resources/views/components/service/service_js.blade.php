<script>
    $(document).ready(function () {


        // get icon
        $('#create_service').on('show.bs.modal', function () {
            $.ajax({
                url: "/getIcon",
                type: "GET",
                success: function (icons) {
                    $('#icon-container').empty();

                    // Loop through each icon and append it to the container
                    icons.forEach(function (icon) {
                        var iconHtml =
                            '<i style="font-size: 24px; margin-right: 10px; color: red; cursor: pointer;" class="' +
                            icon + ' fa"></i>';
                        $('#icon-container').append(iconHtml);
                    });

                    // Click event for selecting the icon
                    $('.fa').click(function () {
                        var icon = $(this).attr('class');
                        $('#icon').val(icon); // Set the value of the input field
                    });
                }
            });
        });

        // add service
        $('.add_service').click(function (e) {
            e.preventDefault();

            var formData = {
                icon: $('#icon').val(),
                title: $('#title').val(),
                desp: $('#desp').val(),
            };

            $.ajax({
                url: "/service-create",
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadServices();
                        $('#addService')[0].reset();
                        $('#create_service').modal('hide');
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        toastify().error(value);
                    });
                }
            });
        });

        // get service
        function loadServices() {
            $.ajax({
                url: "/get-services", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, service) {
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td><i class="${service.icon}" style="font-size: 24px;"></i></td>
                            <td>${service.title}</td>
                            <td>${service.desp.substring(0, 30)}...</td>
                            <td>
                                <button class="btn btn-info btn-sm edit-service text-white"
                                data-toggle="modal" data-target="#update_service"
                                data-id="${service.id}"
                                data-icon="${service.icon}"
                                data-title="${service.title}"
                                data-desp="${service.desp}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-service" data-id="${service.id}">Delete</button>
                            </td>
                        </tr>
                       `;
                        tableList.append(row);
                    })
                    tableData.DataTable({
                        lengthMenu: [5, 10, 15, 20],
                    });

                }
            });
        }

        // Call the function to load services when the page is ready
        loadServices();


        // service delete
        $(document).on('click', '.delete-service', function () {
            let service_id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/service-delete",
                        type: "POST",
                        data: {
                            service_id: service_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "User Successfully deleted .",
                                    icon: "success"
                                });
                                loadServices();
                            }
                        }
                    });

                }
            });
        });

        // update icon
        $('#update_service').on('show.bs.modal', function () {
            $.ajax({
                url: "/getIcon",
                type: "GET",
                success: function (icons) {
                    $('#up_icon-container').empty();

                    // Loop through each icon and append it to the container
                    icons.forEach(function (icon) {
                        var iconHtml =
                            '<i style="font-size: 24px; margin-right: 10px; color: red; cursor: pointer;" class="' +
                            icon + ' fa"></i>';
                        $('#up_icon-container').append(iconHtml);
                    });

                    // Click event for selecting the icon
                    $('.fa').click(function () {
                        var icon = $(this).attr('class');
                        $('#up_icon').val(icon); // Set the value of the input field
                    });
                }
            });
        });
        // edit service
        $(document).on('click', '.edit-service', function () {
            let service_id = $(this).data('id');
            let icon = $(this).data('icon');
            let title = $(this).data('title');
            let desp = $(this).data('desp');

            $('#service_id').val(service_id);
            $('#up_icon').val(icon);
            $('#up_title').val(title);
            $('#up_desp').val(desp);
        })

        // update service
        $('.up_service').click(function (e) {
            e.preventDefault();

            var formData = {
                service_id: $('#service_id').val(),
                icon: $('#up_icon').val(),
                title: $('#up_title').val(),
                desp: $('#up_desp').val(),
            };

            $.ajax({
                url: "/service-update",
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadServices();
                        $('#updateService')[0].reset();
                        $('#update_service').modal('hide');
                    }
                }
            });
        });

    });

</script>
