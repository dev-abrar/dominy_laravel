<script>
    $(document).ready(function () {

        // get message
        function loadquote() {
            $.ajax({
                url: "/get-quote", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');

                    tableData.DataTable().destroy();
                    tableList.empty();


                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, quote) {

                        let rowClass = quote.sts === 0 ? "bg-light" : "bg-white";

                        let row = `
                        <tr class="${rowClass}">
                            <td>${index + 1}</td>
                            <td>${quote.time}</td>
                            <td>${quote.date}</td>
                            <td>${quote.phone}</td>
                            <td>${quote.name}</td>
                            <td>${quote.email}</td>
                            <td>${quote.desp}</td>
                            <td>
                                <a class="btn btn-info btn-sm edit-quote text-white"
                                href="/quote/${quote.id}/view"
                                >View</a>
                                <button class="btn btn-danger  btn-sm delete-quote" data-id="${quote.id}">Delete</button>
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
        loadquote();


        // message delete
        $(document).on('click', '.delete-quote', function () {
            let quote_id = $(this).data('id');

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
                        url: "/delete-quote",
                        type: "POST",
                        data: {
                            quote_id: quote_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Quotation Successfully deleted .",
                                    icon: "success"
                                });
                                loadquote();
                            }
                        }
                    });

                }
            });
        });


    });

</script>
