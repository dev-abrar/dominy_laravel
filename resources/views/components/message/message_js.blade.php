<script>
    $(document).ready(function () {

        // get message
        function loadMessage() {
            $.ajax({
                url: "/get-message", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');

                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, message) {
                        
                        let rowClass = message.sts === 0 ? "bg-light" : "bg-white";
                        let btnText = message.sts === 0 ? "Reply" : "View";
                        let row = `
                        <tr class="${rowClass}">
                            <td>${index + 1}</td>
                            <td>${message.name}</td>
                            <td>${message.email}</td>
                            <td>${message.desp}</td>
                            <td>
                                <a class="btn btn-info btn-sm edit-message text-white"
                                href="/message/${message.id}/reply"
                                >${btnText}</a>
                                <button class="btn btn-danger  btn-sm delete-message" data-id="${message.id}">Delete</button>
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
        loadMessage();


        // message delete
        $(document).on('click', '.delete-message', function () {
            let message_id = $(this).data('id');

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
                        url: "/delete-message",
                        type: "POST",
                        data: {
                            message_id: message_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Message Successfully deleted .",
                                    icon: "success"
                                });
                                loadMessage();
                            }
                        }
                    });

                }
            });
        });


        // reply message
        $('.reply_message').click(function (e) {
            e.preventDefault();

            var formData = {
                message_id: $('#message_id').val(),
                email: $('#email').val(),
                reply: $('#reply').val()
            };
            if (!formData.reply.trim()) {
                toastify().error('Reply is required!');
            } else {
                $.ajax({
                    url: "/reply-message",
                    type: "POST",
                    data: formData,
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            $('#replyForm').load(location.href + ' #replyForm');
                        }
                    }
                });
            }

        });

    });

</script>
