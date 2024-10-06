<script>
    $(document).ready(function () {

        // Add portfolio
        $('.add_portfolio').click(function (e) {
            e.preventDefault();

            let title = $('#title').val();
            let desp = $('#desp').val();
            let image = $('#image')[0].files[0]; // Grab the first file

            // Validate form inputs
            if (title.length === 0) {
                toastify().error('Title is required!');
            } else if (!desp) {
                toastify().error('Description is required!');
            } else if (!image) {
                toastify().error('Image is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('title', title);
                formData.append('desp', desp);
                formData.append('image', image);

                // Perform AJAX request
                $.ajax({
                    url: "/create-portfolio",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadPortfolio(); 
                            $('#add_portfolio')[0].reset();
                            $('#create_portfolio').modal('hide');
                        }
                    }
                });
            }
        });

        // get portfolio
        function loadPortfolio() {
            $.ajax({
                url: "/get-portfolio",
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    // Clear previous rows
                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, portfolio) {
                        let portfolio_image = 'upload/portfolio/' + portfolio.image;
                        let row = `
                                <tr>
                                <td>${index + 1}</td> 
                                <td>${portfolio.title}</td>
                                <td>${portfolio.desp.substring(0, 30)}...</td>
                                <td><img src="${portfolio_image}" width="100"></td>
                                <td>
                                <button class="btn btn-danger btn-sm delete-portfolio" data-id="${portfolio.id}">Delete</button>
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

        loadPortfolio();

        // portfolio delete
        $(document).on('click', '.delete-portfolio', function () {
            let portfolio_id = $(this).data('id');

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
                        url: "/delete-portfolio",
                        type: "POST",
                        data: {
                            portfolio_id: portfolio_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Portfolio Successfully deleted.",
                                    icon: "success"
                                });
                                loadPortfolio();
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: res.message,
                                    icon: "error"
                                });
                            }
                        }
                    });
                }
            });
        });


    });

</script>
