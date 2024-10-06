<script>
    $(document).ready(function () {

        // add gallery
        $('.add_client').click(function (e) {
            e.preventDefault();

            let logo = $('#logo')[0].files[0]; // Grab the first file

            if (!logo) {
                toastify().error('Image is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('logo', logo);


                // Perform AJAX request
                $.ajax({
                    url: "/create-client", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadClient();
                            $('#addClient')[0].reset();
                            $('#create_client').modal('hide');
                        }
                    }
                });
            }
        });

        // get testimonial
        function loadClient() {
            $.ajax({
                url: "/get-client", // Route to fetch testimonials
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');

                    tableData.DataTable().destroy(); // Destroy previous table instance
                    tableList.empty(); // Clear previous rows

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, client) {
                        let client_image = 'upload/client/' + client.logo;
                        let row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td><img src="${client_image}" width="100"></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-client" data-id="${client.id}">Delete</button>
                                    </td>
                                </tr>`;
                        tableList.append(row);
                    });

                    // Re-initialize the DataTable after appending new rows
                    tableData.DataTable({
                        lengthMenu: [5, 10, 15, 20],
                    });
                }
            });
        }

        loadClient();

        $(document).on('click', '.delete-client', function () {
            let client_id = $(this).data('id');

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
                        url: "/delete-client",
                        type: "POST",
                        data: {
                            client_id: client_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Testimonial Successfully deleted.",
                                    icon: "success"
                                });
                                loadClient(); // Refresh the gallery after deletion
                            }
                        }
                    });
                }
            });
        });


    });

</script>
