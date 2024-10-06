<script>
    $(document).ready(function () {

        // add team
        $('.add_team').click(function (e) {
            e.preventDefault();

            let name = $('#name').val();
            let role = $('#role').val();
            let img = $('#img')[0].files[0]; // Grab the first file

            // Validate form inputs
            if (name.length === 0) {
                toastify().error('Name is required!');
            } else if (role.length === 0) {
                toastify().error('Role is required!');
            } else if (!img) {
                toastify().error('Image is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('name', name);
                formData.append('role', role);
                formData.append('img', img); // Add the file to formData

                // Perform AJAX request
                $.ajax({
                    url: "/team-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadTeam();
                            $('#addTeam')[0].reset();
                            $('#create_team').modal('hide');
                        } 
                    }
                });
            }
        });


        // get team
        function loadTeam() {
            $.ajax({
                url: "/get-team", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    $.each(res, function (index, team) {
                        let imgSrc = 'upload/team/' + team.img;
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${team.name}</td>
                            <td>${team.role}</td>
                            <td><img src="${imgSrc}"></td>
                            <td>
                                <a class="btn btn-success  btn-sm skill" href="/team/${team.id}/add-skills">Add Skills</a>
                                <button class="btn btn-info btn-sm edit-team text-white"
                                data-toggle="modal" data-target="#update_team"
                                data-id="${team.id}"
                                data-name="${team.name}"
                                data-role="${team.role}"
                                data-img="${team.img}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-team" data-id="${team.id}">Delete</button>
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
        loadTeam();


        // team delete
        $(document).on('click', '.delete-team', function () {
            let team_id = $(this).data('id');

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
                        url: "/team-delete",
                        type: "POST",
                        data: {
                            team_id: team_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Member Successfully deleted .",
                                    icon: "success"
                                });
                                loadTeam();
                            }
                        }
                    });

                }
            });
        });


        // edit team
        $(document).on('click', '.edit-team', function () {
            let team_id = $(this).data('id');
            let name = $(this).data('name');
            let role = $(this).data('role');
            let img = $(this).data('img');

            $('#team_id').val(team_id);
            $('#up_name').val(name);
            $('#up_role').val(role);
            
            let imgSrc = 'upload/team/' + img; // Construct the image source path
            $("#imgblah").attr('src', imgSrc); 
        })

        // update team
        $('.up_team').click(function (e) {
            e.preventDefault();

            var formData = new FormData();
    
            // Append regular form fields
            formData.append('team_id', $('#team_id').val());
            formData.append('name', $('#up_name').val());
            formData.append('role', $('#up_role').val());

            // Check if image exists and append it to the formData
            var img = $('#up_img')[0].files[0]; // Assuming your image input has id="up_image"
            if (img) {
                formData.append('img', img); // 'image' is the key that will hold the file
            }

            $.ajax({
                url: "/team-update",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadTeam();
                        $('#updateTeam')[0].reset();
                        $('#update_team').modal('hide');
                    }
                }
            });
        });

        

    });

</script>
