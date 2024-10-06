<script>
    $(document).ready(function () {

        // add skill
        $('.add_skill').click(function (e) {
            e.preventDefault();
            let team_id = $('#team_id').val();
            let skill = $('#skill').val();

            if (skill.length === 0) {
                toastify().error('skill is required!');
            } else {

                $.ajax({
                    url: "/skill-create",
                    type: "POST",
                    data: {
                        team_id: team_id,
                        skill: skill
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadSkill();
                            $('#addSkill')[0].reset();
                            $('#create_skill').modal('hide');
                        }
                    }
                });
            }
        });

        function loadSkill() {
            // Get the team_id from the hidden input field or another source
            let teamId = $('#team_id').val();

            $.ajax({
                url: "/get-skill", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    // Filter skills by team_id
                    let filteredSkills = res.filter(skill => skill.team_id == teamId);


                    // Loop through the filtered skills and display them
                    $.each(filteredSkills, function (index, skill) {
                        let row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${skill.team_name}</td>
                    <td>${skill.skill}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete-skill" data-id="${skill.id}">Delete</button>
                    </td>
                </tr>
               `;
                        tableList.append(row);
                    });

                    // Reinitialize the DataTable
                    tableData.DataTable({
                        lengthMenu: [5, 10, 15, 20],
                    });
                }
            });
        }

        // Call the function to load services when the page is ready
        loadSkill();



        // counter delete
        $(document).on('click', '.delete-skill', function () {
            let skill_id = $(this).data('id');

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
                        url: "/skill-delete",
                        type: "POST",
                        data: {
                            skill_id: skill_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Skill Successfully deleted .",
                                    icon: "success"
                                });
                                loadSkill();
                            }
                        }
                    });

                }
            });
        });

    });

</script>
