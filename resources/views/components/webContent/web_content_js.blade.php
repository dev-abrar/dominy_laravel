<script>
    // summernote
    $(document).ready(function () {
        $('#ab_content').summernote();
        $('#privacy').summernote();

        // web content update
        getWebContent();

        function getWebContent() {
            $.ajax({
                url: "/get-web-content",
                type: "GET",
                success: function (res) {
                    if (res.status === 'success') {
                        $("#id").val(res.content.id);
                        $("#home").val(res.content.home);
                        $('#ab_content').summernote('code', res.content.ab_content);
                        $("#footer").val(res.content.footer);
                        $("#number").val(res.content.number);
                        $("#email").val(res.content.email);
                        $("#web_link").val(res.content.web_link);
                        $("#facebook").val(res.content.facebook);
                        $("#twitter").val(res.content.twitter);
                        $("#linkedin").val(res.content.linkedin);
                        $("#instagram").val(res.content.instagram);
                        $("#address").val(res.content.address);
                        $('#privacy').summernote('code', res.content.privacy);
                    }
                }
            });
        }

        // web content update
        $(document).on('click', '.web_content', function () {
            let id = $("#id").val();
            let home = $("#home").val();
            let ab_content = $("#ab_content").val();
            let footer = $("#footer").val();
            let number = $("#number").val();
            let email = $("#email").val();
            let web_link = $("#web_link").val();
            let facebook = $("#facebook").val();
            let twitter = $("#twitter").val();
            let linkedin = $("#linkedin").val();
            let instagram = $("#instagram").val();
            let address = $("#address").val();
            let privacy = $("#privacy").val();
            let logo = $("#logo")[0].files[0];
            let ab_img = $("#ab_img")[0].files[0];

            let formData = new FormData();
            formData.append('id', id);
            formData.append('home', home);
            formData.append('ab_content', ab_content);
            formData.append('footer', footer);
            formData.append('number', number);
            formData.append('email', email);
            formData.append('web_link', web_link);
            formData.append('facebook', facebook);
            formData.append('twitter', twitter);
            formData.append('linkedin', linkedin);
            formData.append('instagram', instagram);
            formData.append('address', address);
            formData.append('privacy', privacy);
            if (logo) {
                formData.append('logo', logo);
            }
            if (ab_img) {
                formData.append('ab_img', ab_img);
            }

            $.ajax({
                url: "/update-web-content",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success('Website Content updated successfully!');
                    }
                },
            });
        })
    });

</script>
