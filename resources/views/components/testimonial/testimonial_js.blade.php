<script>
    $(document).ready(function () {

        // add gallery
        $('.add_testimonial').click(function (e) {
            e.preventDefault();


            let name = $('#name').val();
            let country = $('#country').val();
            let desp = $('#desp').val();
            let image = $('#image')[0].files[0]; // Grab the first file

            // Validate form inputs
            if (name.length === 0) {
                toastify().error(' Name is required!');
            } else if (!country) {
                toastify().error('country is required!');

            } else if (!desp) {
                toastify().error('Description is required!');
            } else if (!image) {
                toastify().error('Image is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('name', name);
                formData.append('country', country);
                formData.append('desp', desp);
                formData.append('image', image);


                // Perform AJAX request
                $.ajax({
                    url: "/testimonial-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadTest();
                            $('#add_testimonial')[0].reset();
                            $('#create_testimonial').modal('hide');
                        }
                    }
                });
            }
        });

        // get testimonial
        function loadTest() {
            $.ajax({
                url: "/get-testimonial", // Route to fetch testimonials
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');

                    tableData.DataTable().destroy(); // Destroy previous table instance
                    tableList.empty(); // Clear previous rows

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, teastimonial) {
                        let teastimonial_image = 'upload/testimonial/' + teastimonial.image;
                        let row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${teastimonial.name}</td>
                    <td>${teastimonial.country}</td>
                    <td>${teastimonial.desp.substring(0, 30)}...</td>
                    <td><img src="${teastimonial_image}" width="100"></td>
                    <td>
                        <button class="btn btn-danger btn-sm delete-testimonial" data-id="${teastimonial.id}">Delete</button>
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

        loadTest();

        $(document).on('click', '.delete-testimonial', function () {
            let testimonial_id = $(this).data('id');

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
                        url: "/delete-testimonial",
                        type: "POST",
                        data: {
                            testimonial_id: testimonial_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Testimonial Successfully deleted.",
                                    icon: "success"
                                });
                                loadTest(); // Refresh the gallery after deletion
                            }
                        }
                    });
                }
            });
        });


    });

</script>
