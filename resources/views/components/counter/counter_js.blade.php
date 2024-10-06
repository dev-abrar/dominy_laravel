<script>
    $(document).ready(function () {

        // add counter
        $('.add_counter').click(function (e) {
            e.preventDefault();
            let title = $('#title').val();
            let number = $('#number').val();

            if (title.length === 0) {
                toastify().error('Title is required!');
            } else if (number.length === 0) {
                toastify().error('Number is required!');
            } else {

                $.ajax({
                    url: "/counter-create",
                    type: "POST",
                    data: {
                        title: title,
                        number: number
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadCounter();
                            $('#addCounter')[0].reset();
                            $('#create_counter').modal('hide');
                        }
                    }
                });
            }
        });

        // get counter
        function loadCounter() {
            $.ajax({
                url: "/get-counter", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, counter) {
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${counter.title}</td>
                            <td>${counter.number}</td>
                            <td>
                                <button class="btn btn-info btn-sm edit-counter text-white"
                                data-toggle="modal" data-target="#update_counter"
                                data-id="${counter.id}"
                                data-title="${counter.title}"
                                data-number="${counter.number}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-counter" data-id="${counter.id}">Delete</button>
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
        loadCounter();


        // counter delete
        $(document).on('click', '.delete-counter', function () {
            let counter_id = $(this).data('id');

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
                        url: "/counter-delete",
                        type: "POST",
                        data: {
                            counter_id: counter_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Counter Successfully deleted .",
                                    icon: "success"
                                });
                                loadCounter();
                            }
                        }
                    });

                }
            });
        });


        // edit counter
        $(document).on('click', '.edit-counter', function () {
            let counter_id = $(this).data('id');
            let title = $(this).data('title');
            let number = $(this).data('number');

            $('#counter_id').val(counter_id);
            $('#up_title').val(title);
            $('#up_number').val(number);
        })

        // update counter
        $('.up_counter').click(function (e) {
            e.preventDefault();

            var formData = {
                counter_id: $('#counter_id').val(),
                title: $('#up_title').val(),
                number: $('#up_number').val(),
            };

            $.ajax({
                url: "/counter-update",
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadCounter();
                        $('#updateCounter')[0].reset();
                        $('#update_counter').modal('hide');
                    }
                }
            });
        });

    });

</script>
