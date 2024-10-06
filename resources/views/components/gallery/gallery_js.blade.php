<script>
    $(document).ready(function () {

        // add gallery
        $('.add_gallery').click(function (e) {
            e.preventDefault();

            
            let class_name = $('#class').val();
            let preview = $('#preview')[0].files[0];
            let gallery = $('#gallery')[0].files[0]; // Grab the first file

            // Validate form inputs
            if (class_name.length === 0) {
                toastify().error('Class Name is required!');
            } else if (!preview) {
                toastify().error('Preview is required!');
            } else if (!gallery) {
                toastify().error('Gallery is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('class', class_name);
                formData.append('preview', preview);
                formData.append('gallery', gallery); // Add the file to formData

                // Perform AJAX request
                $.ajax({
                    url: "/gallery-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadGallery();
                            $('#addGallery')[0].reset();
                            $('#create_gallery').modal('hide');
                        } 
                    }
                });
            }
        });


        // get gallery
        function loadGallery() {
            $.ajax({
                url: "/get-gallery", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, gal) {
                        let previewSrc = 'upload/gallery/preview/' + gal.preview;
                        let gallerySrc = 'upload/gallery/gal/' + gal.gallery;
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${gal.class}</td>
                            <td><img src="${previewSrc}"></td>
                            <td><img src="${gallerySrc}"></td>
                            <td>
                                <button class="btn btn-danger  btn-sm delete-gallery" data-id="${gal.id}">Delete</button>
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
        loadGallery();


        // gallery delete
        $(document).on('click', '.delete-gallery', function () {
            let gal_id = $(this).data('id');

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
                        url: "/gallery-delete",
                        type: "POST",
                        data: {
                            gal_id: gal_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Member Successfully deleted .",
                                    icon: "success"
                                });
                                loadGallery();
                            }
                        }
                    });

                }
            });
        });


        // edit gallery
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

        // update gallery
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

